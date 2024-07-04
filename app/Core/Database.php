<?php
namespace App\Core;
use mysqli;
use Exception;

class Database{
    private static $instance = null;
    protected $conn;

    private function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            throw new Exception('Database connection failed: ' . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    public static function insert_query(string $table, array $data): bool {
        $conn = self::getInstance()->getConnection();

        if (isset($data[0]) && is_array($data[0])) {
            $columns = implode(", ", array_keys($data[0]));
            $placeholders = implode(", ", array_fill(0, count($data[0]), '?'));

            $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = $conn->prepare($query);

            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            $types = str_repeat('s', count($data[0]));

            foreach ($data as $row) {
                $stmt->bind_param($types, ...array_values($row));
                if (!$stmt->execute()) {
                    throw new Exception('Insert query failed: ' . $stmt->error);
                }
            }

            return true;
        } else {
            $columns = implode(", ", array_keys($data));
            $placeholders = implode(", ", array_fill(0, count($data), '?'));

            $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = $conn->prepare($query);

            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            $types = str_repeat('s', count($data));
            $stmt->bind_param($types, ...array_values($data));

            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception('Insert query failed: ' . $stmt->error);
            }
        }
    }

    public static function update_query(string $table, array $data, array $where): bool {
        $conn = self::getInstance()->getConnection();
        $set = implode(", ", array_map(function($key) { return "$key = ?"; }, array_keys($data)));
        $conditions = implode(" AND ", array_map(function($key) { return "$key = ?"; }, array_keys($where)));

        $query = "UPDATE $table SET $set WHERE $conditions";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }

        $types = str_repeat('s', count($data) + count($where));
        $params = array_merge(array_values($data), array_values($where));
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception('Update query failed: ' . $stmt->error);
        }
    }

    public static function delete_query(string $table, array $where): bool {
        $conn = self::getInstance()->getConnection();
        $conditions = implode(" AND ", array_map(function($key) { return "$key = ?"; }, array_keys($where)));

        $query = "DELETE FROM $table WHERE $conditions";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }

        $types = str_repeat('s', count($where));
        $stmt->bind_param($types, ...array_values($where));

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception('Delete query failed: ' . $stmt->error);
        }
    }

    public static function run_query(string $query, array $params = []) {
        $conn = self::getInstance()->getConnection();
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        if ($stmt->execute()) {
            return $stmt->get_result();
        } else {
            throw new Exception('Query failed: ' . $stmt->error);
        }
    }
}

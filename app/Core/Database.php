<?php
namespace App\Core;
use mysqli;

class Database{
    private static $instance = null;
    protected $conn;

    private function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die('Database connection failed: ' . $this->connection->connect_error);
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

    public static function insert_query(string $table, array $columns = []):boolean
    {
        return true;
    }

    public static function update_query(string $table, $data = [], $whereColumns):boolean 
    {
        return true;
    }

    public static function delete_query(string $table, $data = [], $whereColumns):boolean
    {
        return true;
    }

    public static function run_query($query){
        return true;
    }
}
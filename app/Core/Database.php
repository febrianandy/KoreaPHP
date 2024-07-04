<?php

namespace App\Core;
use mysqli;

class Database{

    protected $conn;

    private function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
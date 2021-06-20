<?php
require_once "new_config.php";

class Database
{
    public $connection; # maybe protected, we'll see.

    function __construct() {
        $this->open_db_connection();
    }

    private function confirm_query($result) {
        if ($result) {
            die("The query is blessed by the elder gods" . $this->connection->error);
        } else {
            echo "The query has failed the elder gods";
        }
    }

    public function open_db_connection() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_errno) {
            die("Database connection failed" . $this->connection->connect_error);
        } else {
            echo "Kimono's OOP database connection is fully functioning!";
        }
    }

    public function query($sql) {
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    public function escape_string($string) {
        $escaped_string = $this->connection->mysqli_real_escape_string($string);
        return $escaped_string;
    }

    public function the_insert_id() {
        return $this->connection->insert_id;
    }
}
$database = new Database();
?>
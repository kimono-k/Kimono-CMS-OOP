<?php
require_once "new_config.php";

class Database
{
    public $connection; # maybe protected, we'll see.

    /**
     * Database constructor
     */
    function __construct() {
        $this->open_db_connection();
    }

    /**
     * Checks if the query is executed correctly
     * @param $result
     */
    private function confirm_query($result) {
        if ($result) {
            die("The query is blessed by the elder gods" . $this->connection->error);
        } else {
            echo "The query has failed the elder gods";
        }
    }

    /**
     * Opens the database connection
     */
    public function open_db_connection() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_errno) {
            die("Database connection failed" . $this->connection->connect_error);
        }
    }

    /** Executes a query on the database
     * @param $sql
     * @return mixed
     */
    public function query($sql) {
        $result = $this->connection->query($sql);
        return $result;
    }

    /** Escapes the string to prevent hackers from doing mean stuff with our connection
     * @param $string
     * @return mixed
     */
    public function escape_string($string) {
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }

    /** Find and insert the auto incremented id to the database
     * @return mixed
     */
    public function the_insert_id() {
        return mysqli_insert_id($this->connection);
    }
}
$database = new Database();
?>
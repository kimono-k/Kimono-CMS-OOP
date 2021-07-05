<?php
class User extends DbObject
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    protected static $db_table = "users"; # change this to the db table name to make it work
    protected static $db_table_fields = ['username', 'password', 'first_name', 'last_name'];

   public static function verify_user($username, $password) {
       global $database;
       $username = $database->escape_string($username);
       $password = $database->escape_string($password);

       $sql  = "SELECT * FROM " . static::$db_table . " WHERE ";
       $sql .= "username = '{$username}' ";
       $sql .= "AND password = '{$password}' ";
       $sql .= "LIMIT 1";
       $the_result_array = static::find_this_query($sql);

       return !empty($the_result_array) ? $the_result_array[0] : false;
   }

    /**
     * CRUD System - Create
     * Inserts new data into the database
     */
    public function create() {
       global $database;
       $properties = $this->clean_properties();

       $sql  = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
       $sql .= "VALUES ('". implode("','", array_values($properties)) ."')";

       if ($database->query($sql)) {
           $this->id = $database->the_insert_id();
           return true;
       } else {
           return false;
       }
    }

    /**
     * CRUD System - Update
     * Modifies a specific record from the database
     * @return bool
     */
    public function update() {
        global $database;
        $properties = $this->properties();
        $properties_pairs = [];

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key} = '{$value}' ";
        }

        $sql  = "UPDATE " .static::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id = " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    /**
     * Checks if the id already exists, if it does than update the record, if not create a new record
     * @return bool
     */
    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    /**
     * CRUD System - Delete
     * Deletes a specific record from the database
     */
    public function delete() {
        global $database;
        $sql  = "DELETE FROM " .static::$db_table . " ";
        $sql .= "WHERE id =" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    protected function properties() {
        $properties = [];

        foreach (static::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    /**
     * Makes sure that the submitted data will be escaped to prevent SQL injections
     * @return array
     */
    protected function clean_properties() {
        global $database;
        $clean_properties = [];

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }
}
?>
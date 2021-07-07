<?php
class DbObject
{
    /**
     * Returns a all the users from the database
     * @return mixed
     */
    public static function find_all() {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " "); # static:: refers to child
    }

    /**
     * Returns an array with specific user by its id
     * @param $id
     * @return mixed
     */
    public static function find_by_id($id) {
        global $database;
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");

        return !empty($the_result_array) ? $the_result_array[0] : false;
    }

    /**
     * An easy method to use in other functions to execute a SQL statement by passing in an argument
     * Warning! - Returns SQL as a string make sure you convert this to an array then you can iterate through the data
     * @param $sql
     * @return mixed
     */
    public static function find_by_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = [];

        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantation($row);
        }

        return $the_object_array;
    }

    public static function instantation($the_record) {
        $calling_class = get_called_class(); # Gets the name of the class the static method is called in.
        $the_object = new $calling_class;

        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    private function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties); # Does the value exists within the array?
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
}
?>
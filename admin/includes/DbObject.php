<?php
class DbObject
{
    /**
     * Returns a all the users from the database
     * @return mixed
     */
    public static function find_all() {
        return static::find_this_query("SELECT * FROM " . static::$db_table . " "); # static:: refers to child
    }

    /**
     * Returns an array with specific user by its id
     * @param $user_id
     * @return mixed
     */
    public static function find_by_id($user_id) {
        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " . static::$db_table . " WHERE id = $user_id LIMIT 1");

        return !empty($the_result_array) ? $the_result_array[0] : false;
    }

    /**
     * An easy method to use in other functions to execute a SQL statement by passing in an argument
     * Warning! - Returns SQL as a string make sure you convert this to an array then you can iterate through the data
     * @param $sql
     * @return mixed
     */
    public static function find_this_query($sql) {
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
}
?>
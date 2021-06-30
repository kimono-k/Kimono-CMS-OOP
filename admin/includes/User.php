<?php
class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    private function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties); # Does the value exists within the array?
    }

    /**
    * Returns a all the users from the database
    * @return mixed
    */
   public static function find_all_users() {
       return self::find_this_query("SELECT * FROM users");

   }

    /**
     * Returns an array with specific user by its id
     * @param $user_id
     * @return mixed
     */
   public static function find_user_by_id($user_id) {
       global $database;
       $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");

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
            $the_object_array[] = self::instantation($row);
        }

        return $the_object_array;
   }

    public static function instantation($the_record) {
        $the_object = new self;

        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }
}
?>
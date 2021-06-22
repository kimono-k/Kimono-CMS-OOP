<?php
class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

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
       $result_set = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");
       $found_user = mysqli_fetch_array($result_set);
       return $found_user;
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
        return $result_set;
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
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
       $the_result_array = static::find_by_query($sql);

       return !empty($the_result_array) ? $the_result_array[0] : false;
   }
}
?>
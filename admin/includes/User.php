<?php

class User extends DbObject
{
    public $id;
    public $username;
    public $user_image;
    public $password;
    public $first_name;
    public $last_name;
    public $upload_directory = "images";
    public $image_placeholder = "http://placehold.it/200x200&text=image";

    protected static $db_table = "users"; # change this to the db table name to make it work
    protected static $db_table_fields = ['username', 'user_image', 'password', 'first_name', 'last_name'];

    public function image_path_and_placeholder()
    {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }

    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . static::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $the_result_array = static::find_by_query($sql);

        return !empty($the_result_array) ? $the_result_array[0] : false;
    }
}

?>
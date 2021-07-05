<?php
class Photo extends DbObject
{
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    protected static $db_table = "photos"; # change this to the db table name to make it work
    protected static $db_table_fields = ['photo_id', 'title', 'description', 'filename', 'type', 'size'];
}
?>
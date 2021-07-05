<?php
class Photo extends DbObject
{
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
    public $custom_errors = [];
    public $upload_errors_array = [
    UPLOAD_ERR_OK           => "There is no error",
    UPLOAD_ERR_INI_SIZE     => "The uploaded file exceeds the upload_max_filesize directive",
    UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive",
    UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
    UPLOAD_ERR_NO_FILE      => "No file was uploaded.",
    UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder.",
    UPLOAD_ERR_CANT_WRITE   => "A PHP extension stopped the file upload."
];


    protected static $db_table = "photos"; # change this to the db table name to make it work
    protected static $db_table_fields = ['photo_id', 'title', 'description', 'filename', 'type', 'size'];
}
?>
<?php
# Database connection
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','gallery_db');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connection) {
    echo "The database is successfully connected by Kimono";
} else {
    echo "The database has failed to connected. Please check if the data is correctly filled in";
}
?>
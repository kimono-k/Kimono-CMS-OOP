<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', __DIR__ . DS . '..' . DS . '..');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

require_once("functions.php");
require_once("new_config.php");
require_once("Database.php");
require_once("DbObject.php");
require_once("Photo.php");
require_once("User.php");
require_once("Session.php");
require_once("Comment.php");
?>
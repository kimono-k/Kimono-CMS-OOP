<?php
require_once("init.php");

if (isset($_POST['imageName'])) {
    $user->ajax_save_user_image($_POST['imageName'], $_POST['userId']);
}

?>

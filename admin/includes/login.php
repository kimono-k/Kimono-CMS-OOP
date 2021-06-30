<?php require_once("init.php"); ?>

<?php
if ($session->is_signed_in()) {
    redirect("index.php");
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Method to check the db user
    $user_found = User::verify_user($username, $password);

    if ($user_found) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $the_message = "Your password or username are incorrect";
        $username = "";
        $password = "";
    }

// Kinda shitty else statement here, if the program doesn't work then use this ugly line of code again -_-
//    } else {
//    $username = "";
//    $password = "";
}
?>
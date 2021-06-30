<?php
class Session
{
    private $signed_in = false;
    public $user_id;

    function __construct() {
        session_start(); # session variabelen tot mijn beschikking
        $this->check_the_login();
    }

    # getter
    public function is_signed_in() {
        return $this->signed_in;
    }

    # param comes from db
    public function login($user) {
        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id; # id from user class
            $this->signed_in = true;
        }
    }

    private function check_the_login() {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
}
$session = new Session();
?>
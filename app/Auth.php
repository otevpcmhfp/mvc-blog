<?php

class Auth
{

    public function __construct() {
        session_start();
        if(!isset($_SESSION['currentUser'])) {
            $_SESSION['currentUser'] = false;
        }
    }

    public function isLoggedIn():bool {
        return !!$_SESSION['currentUser'];
    }

    public function currentUser():?string {
        return $_SESSION['currentUser'];
    }
}
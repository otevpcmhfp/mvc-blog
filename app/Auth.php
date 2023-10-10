<?php

class Auth
{

    private static function configure(): void
    {
        if(!isset($_SESSION['currentUser'])) {
            $_SESSION['currentUser'] = false;
        }
    }

    public static function isLoggedIn():bool {
        self::configure();
        return !!$_SESSION['currentUser'];
    }

    public static function currentUser():?string {
        self::configure();
        return $_SESSION['currentUser'];
    }
}
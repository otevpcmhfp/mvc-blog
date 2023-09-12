<?php
session_start();
if(!isset($_SESSION['currentUser'])) {
    $_SESSION['currentUser'] = false;
}
$isLoggedIn = !!$_SESSION['currentUser'];
require 'Database.php';
Database::connect();
require 'routes.php';
<?php
require('models/UserModel.php');


//$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];
$action = $_POST['action'] ?? $_GET['action'] ?? null;

// POST
// /sign-in?action=add
if($action === 'sign-in' && $method === 'POST') {
    if(UserModel::signIn($_POST['email'] ?? '', $_POST['password'] ?? '')) {
        header("Location: $webRoot/");
    } else {
        header("Location: $webRoot/sign-in");
    }
    exit();
}

if($action === 'sign-out' && $method === 'GET') {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header("Location: $webRoot/");
    exit();
}

require "views/user/index";
exit();

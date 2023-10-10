<?php
$pageTitle = "Home";
$method = $_SERVER["REQUEST_METHOD"];
$action = $_POST['action'] ?? $_GET['action'] ?? null;

if($action === 'populate' && $method === 'POST') {
    $_SESSION['firstName'] = "Kyle";
    $_SESSION['lastName'] = "Murphy";
}

if($action === 'destroy' && $method === 'POST') {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header("Location: $webRoot/session");
}

require "views/session/index";
exit();


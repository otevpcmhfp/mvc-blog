<?php
$user = new UserRepository();
$method = $_SERVER["REQUEST_METHOD"];

if($method === 'GET') {
    view("user/index", [
        'pageTitle' => 'Sign In'
    ]);
    exit();
}

if($method === 'POST') {
    if($user->signIn($_POST['email'] ?? '', $_POST['password'] ?? '')) {
        header("Location: " . href("/"));
    } else {
        header("Location: " . href("/sign-in"));
    }
    exit();
}

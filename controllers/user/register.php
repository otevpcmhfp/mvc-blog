<?php

$user = new UserRepository();
$method = $_SERVER["REQUEST_METHOD"];

if ($method === 'GET') {
    view("user/register", [
        'pageTitle' => 'Register'
    ]);
    exit();
}

if ($method === 'POST') {
    $user->create(new UserModel(
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['password'],
    ));
    header("Location: " . href("/sign-in"));
    exit();
}
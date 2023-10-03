<?php
require model('UserModel.php');
$method = $_SERVER["REQUEST_METHOD"];

if($method === 'GET') {
    require view("user/index.view.php");
    exit();
}

if($method === 'POST') {
    if(UserModel::signIn($_POST['email'] ?? '', $_POST['password'] ?? '')) {
        header("Location: $webRoot/");
    } else {
        header("Location: $webRoot/sign-in");
    }
    exit();
}

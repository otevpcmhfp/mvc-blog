<?php
require model('BlogModel.php');
$method = $_SERVER["REQUEST_METHOD"];

if($method === 'GET') {
    require view('blog/add.view.php');
    exit();
}


if ($method === 'POST') {
    $blog = new BlogModel(
        $_POST['title'] ?? '',
        $_POST['author'] ?? '',
        $_POST['excerpt'] ?? '',
        $_POST['contents'] ?? ''
    );

    $blog->save();
    header("Location: $webRoot/blog");
    exit();
}

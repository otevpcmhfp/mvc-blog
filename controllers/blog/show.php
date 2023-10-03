<?php
require model('BlogModel.php');
$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];

if(isset($id) && $method === 'GET') {
    $post = BlogModel::getPost($id);
    require view("blog/add.view.php");
    exit();
}

if (isset($id) && $method === 'POST') {
    $blog = new BlogModel(
        $_POST['title'] ?? '',
        $_POST['author'] ?? '',
        $_POST['excerpt'] ?? '',
        $_POST['contents'] ?? '',
        $id
    );

    $blog->update();

    header("Location: $webRoot/blog");
    exit();
}
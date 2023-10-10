<?php
$blog = new BlogRepository();

$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];

if(isset($id) && $method === 'GET') {
    view("blog/add", [
        'pageTitle' => "Blog Entry $id",
        'post' => $blog->read($id)
    ]);
    exit();
}

if (isset($id) && $method === 'POST') {
    $blog->update(new BlogModel(
        $_POST['title'] ?? '',
        $_POST['author'] ?? '',
        $_POST['excerpt'] ?? '',
        $_POST['contents'] ?? '',
        $id
    ));
    header("Location: " . href('/blog'));
    exit();
}
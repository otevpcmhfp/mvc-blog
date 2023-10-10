<?php
$blog = new BlogRepository();
$method = $_SERVER["REQUEST_METHOD"];

if($method === 'GET') {
    view('blog/add', [
        'pageTitle' => 'New Blog Post'
    ]);
    exit();
}

if ($method === 'POST') {
    $newBlogEntry = new BlogModel(
        $_POST['title'] ?? '',
        $_POST['author'] ?? '',
        $_POST['excerpt'] ?? '',
        $_POST['contents'] ?? ''
    );

    $blog->create($newBlogEntry);
    header("Location: " . href("/blog"));
    exit();
}

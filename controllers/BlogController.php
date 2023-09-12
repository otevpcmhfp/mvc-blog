<?php
require('models/BlogModel.php');

$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];
$action = $_POST['action'] ?? $_GET['action'] ?? null;

// die("$id - $method - $action");

// GET
// /blog
if(!isset($action) && !isset($id) && $method === 'GET') {
    $posts = BlogModel::allPosts();
    require 'views/blog/index.view.php';
    exit();
}

// GET
// /blog?action=add
if($action === 'add' && $method === 'GET') {
    require 'views/blog/add.view.php';
    exit();
}

// POST
// /blog?action=add
if(!isset($id) && $action === 'add' && $method === 'POST') {
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


// GET
// /blog/id=[id]
if(!isset($action) && isset($id) && $method === 'GET') {
    $post = BlogModel::getPost($id);
    require "views/blog/details.view.php";
    exit();
}

// GET
// /blog/id=[id]&action=edit
if(isset($id) && $method === 'GET' && $action === 'edit') {
    $post = BlogModel::getPost($id);
    require "views/blog/add.view.php";
    exit();
}

// POST
// /blog/id=[id]&action=edit
if(isset($id) && $method === 'POST' && $action === 'edit') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $excerpt = $_POST['excerpt'] ?? '';
    $contents = $_POST['contents'] ?? '';


    $blog = new BlogModel(
        $_POST['title'] ?? '',
        $_POST['author'] ?? '',
        $_POST['excerpt'] ?? '',
        $_POST['contents'] ?? '',
        $id
    );

    $blog->update();

    header("Location: $webRoot/blog?id=$id&action=edit");
    exit();
}

// DELETE
// /blog/id=[id]
if(isset($id) && $method === 'POST' && $action === 'delete') {
    BlogModel::delete($id);
    header("Location: $webRoot/blog");
}
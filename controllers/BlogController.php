<?php
require('models/BlogModel.php');

$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];
$action = $_POST['action'] ?? $_GET['action'] ?? null;

// die("$id - $method - $action");

// GET
// /blog
if(!isset($action) && !isset($id) && $method === 'GET') {
    $posts = allPosts();
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
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $excerpt = $_POST['excerpt'] ?? '';
    $contents = $_POST['contents'] ?? '';
    addPost($title,$author,$excerpt,$contents);
    header("Location: /blog");
    exit();
}


// GET
// /blog/id=[id]
if(!isset($action) && isset($id) && $method === 'GET') {
    $post = getPost($id);
    require "views/blog/details.view.php";
    exit();
}

// GET
// /blog/id=[id]&action=edit
if(isset($id) && $method === 'GET' && $action === 'edit') {
    $post = getPost($id);
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
    updatePost($id,$title,$author,$excerpt,$contents);
    header("Location: /blog?id=$id&action=edit");
    exit();
}

// DELETE
// /blog/id=[id]
if(isset($id) && $method === 'POST' && $action === 'delete') {
    deletePost($id);
    header("Location: /blog");
}






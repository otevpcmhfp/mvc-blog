<?php
$blog = new BlogRepository();
$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];

if(isset($id) && $method === 'POST') {
    $blog->delete($id);
    header("Location: " . href("/blog"));
}
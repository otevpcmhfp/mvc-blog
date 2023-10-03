<?php
require model('BlogModel.php');
$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];

if(isset($id) && $method === 'DELETE') {
    BlogModel::delete($id);
    header("Location: $webRoot/blog");
}
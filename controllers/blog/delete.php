<?php
require model('BlogModel.php');
$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];

if(isset($id) && $method === 'POST') {
    $query = 'DELETE FROM myblog.posts
                  WHERE id = :id';

    $db->execute($query, [
        ':id' => $id
    ]);

    header("Location: $webRoot/blog");
}
<?php
require model('BlogModel.php');
$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];

if(isset($id) && $method === 'GET') {
    $query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts WHERE id = :id";
    $result = $db->querySingle($query, [
        ':id' => $id
    ]);
    $post = new BlogModel(
        $result['title'],
        $result['author'],
        $result['excerpt'],
        $result['contents'],
        $result['id'],
        $result['created_at'],
    );

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

    $query = 'UPDATE myblog.posts
                  SET title = :title, author = :author, excerpt = :excerpt, contents = :contents
                  WHERE id = :id';

    $db->execute($query, [
        ':id' => $blog->id,
        ':title' => $blog->title,
        ':author' => $blog->author,
        ':excerpt' => $blog->excerpt,
        ':contents' => $blog->contents,
    ]);

    header("Location: $webRoot/blog");
    exit();
}
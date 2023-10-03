<?php
require model('BlogModel.php');

$query = "SELECT id,title,author,excerpt,contents,created_at FROM myblog.posts";
$results = $db->queryAll($query);
$posts = [];
foreach ($results as $result) {
    $posts[] = new BlogModel(
        $result['title'],
        $result['author'],
        $result['excerpt'],
        $result['contents'],
        $result['id'],
        $result['created_at']
    );
}

//$posts = BlogModel::allPosts();
require view('blog/index.view.php');
exit();
<?php
require model('BlogModel.php');
$posts = BlogModel::allPosts();
require view('blog/index.view.php');
exit();
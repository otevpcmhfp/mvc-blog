<?php
require(model('BlogModel.php'));
$recentPosts = BlogModel::recentPosts();
require view("home/index.view.php");
exit();
<?php
require('models/BlogModel.php');
$blog = new BlogModel();
$pageTitle = "Home";

$recentPosts = $blog->recentPosts();
require "views/home/index.view.php";
exit();


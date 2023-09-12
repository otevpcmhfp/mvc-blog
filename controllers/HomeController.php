<?php
require('models/BlogModel.php');
$pageTitle = "Home";

$recentPosts = BlogModel::recentPosts();
require "views/home/index.view.php";
exit();


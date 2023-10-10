<?php
require('models/BlogModel.php');
$pageTitle = "Home";

$recentPosts = BlogModel::recentPosts();
require "views/home/index";
exit();


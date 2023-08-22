<?php
require('models/BlogModel.php');
$pageTitle = "Home";

$recentPosts = recentPosts();
require "views/home/index.view.php";
exit();


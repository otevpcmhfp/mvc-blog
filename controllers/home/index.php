<?php
$blog = new BlogRepository();
$recentPosts = $blog->recent();

view("home/index", [
    'pageTitle' => "Home",
    'recentPosts' => $recentPosts
]);
exit();
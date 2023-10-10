<?php
$blog = new BlogRepository();

view("blog/index", [
    'pageTitle' => "Blog",
    'posts' => $blog->all()
]);

exit();
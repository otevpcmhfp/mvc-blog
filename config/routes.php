<?php

// Update this to match your path: e.g. /mvc-blog
// Leave empty if you're in the root htdocs directory
$webRoot = '';

// Get the requested path
$route = parse_url($_SERVER['REQUEST_URI'])['path'];

// Our list of routes
$routes = [
    "$webRoot/" => controller('home/index.php'),
    "$webRoot/blog" => controller('blog/index.php'),
    "$webRoot/blog/create" => controller('blog/create.php'),
    "$webRoot/blog/show" => controller('blog/show.php'),
    "$webRoot/blog/delete" => controller('blog/delete.php'),
    "$webRoot/sign-in" => controller('user/sign-in.php'),
    "$webRoot/sign-out" => controller('user/sign-out.php'),
    "$webRoot/register" => controller('user/register.php'),
];

// Check our routes map to see if we have a place to go
if(array_key_exists($route, $routes)) {
    require($routes[$route]);
} else {
    http_response_code(404);
    view('404.php');
}
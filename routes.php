<?php

// Update this to match your path: e.g. /mvc-blog
// Leave empty if you're in the root htdocs directory
$webRoot = '';

// Get the requested path
$route = parse_url($_SERVER['REQUEST_URI'])['path'];

// Our list of routes
$routes = [
    "$webRoot/" => 'controllers/HomeController.php',
    "$webRoot/blog" => 'controllers/BlogController.php',
    "$webRoot/session" => 'controllers/SessionController.php',
    "$webRoot/sign-in" => 'controllers/UserController.php',
];

// Check our routes map to see if we have a place to go
if(array_key_exists($route, $routes)) {
    require($routes[$route]);
} else {
    http_response_code(404);
    require('views/404.php');
}
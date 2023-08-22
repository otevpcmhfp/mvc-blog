<?php
require 'models/db.php';

// Get the requested path
$route = parse_url($_SERVER['REQUEST_URI'])['path'];

// Our list of routes
$routes = [
    '/' => 'controllers/HomeController.php',
    '/blog' => 'controllers/BlogController.php',
];

// Check our routes map to see if we have a place to go
if(array_key_exists($route, $routes)) {
    require($routes[$route]);
} else {
    http_response_code(404);
    require('404.php');
}
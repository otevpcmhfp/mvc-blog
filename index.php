<?php
require 'Database.php';
//require 'models/db.php';

//$db = new Database();

// Get the requested path
$route = parse_url($_SERVER['REQUEST_URI'])['path'];

//die($route);

// Our list of routes
$routes = [
    '/' => 'controllers/HomeController.php',
    '/blog' => 'controllers/BlogController.php',
];

//die(var_dump("hello"));

// Check our routes map to see if we have a place to go
if(array_key_exists($route, $routes)) {
    require($routes[$route]);
} else {
    http_response_code(404);
    require('views/404.php');
}
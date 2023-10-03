<?php
CONST BASE_DIR = __DIR__.'/../';
require BASE_DIR . 'helpers/paths.php';

// AUTH
require app('Auth.php');
$auth = new Auth();

// DB
require app('Database.php');
$db = new Database();
//die(var_dump($db));

// ROUTING
require app('Router.php');
require config('routes.php');
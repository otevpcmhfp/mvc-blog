<?php
session_start();

CONST BASE_DIR = __DIR__.'/../';
CONST WEB_ROOT = '';
require BASE_DIR . 'helpers/paths.php';
require BASE_DIR . 'helpers/links.php';

// AUTH
app('Auth.php');

// DB
app('Database.php');

// MODELS
addModel("Blog");
addModel("User");

// REPOSITORIES
addRepository('Base');
addRepository('Blog');
addRepository('User');

// ROUTING
app('Router.php');
config('routes.php');
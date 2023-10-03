<?php
CONST BASE_DIR = __DIR__.'/../';
require BASE_DIR . 'helpers/paths.php';

require app('Auth.php');
require app('Database.php');
require app('Router.php');
Database::connect();
$auth = new Auth();
require config('routes.php');
<?php

use Core\Router\Router;

define('ROOT', dirname(__DIR__));
define('RACINE', "/templatePoo/");

require ROOT . '/vendor/autoload.php';
require ROOT . '/app/App.php';

App::load();

$router = new Router($_GET['url']);

$router->get('/', 'index.index');
$router->post('/', 'index.post');
$router->run();
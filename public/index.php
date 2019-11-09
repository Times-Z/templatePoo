<?php

use Core\Router\Router;

if (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = '/';
}

define('ROOT', dirname(__DIR__));

if (php_sapi_name() === 'cli-server') {
    define('RACINE', '/');
    define('ROUTE', '/');
    $url = $_SERVER['REQUEST_URI'];
} else {
    define('RACINE', '/templatePoo/public/');
    $route = explode('/', dirname(__DIR__));
    define('ROUTE', '/' . end($route) . '/');
}

require ROOT . '/vendor/autoload.php';
require ROOT . '/app/App.php';

App::load();

$router = new Router($url);

$router->get('/', 'index.index');
$router->get('/other', 'index.other');
$router->post('/', 'index.post');
$router->run();
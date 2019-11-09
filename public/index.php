<?php

use Core\Router\Router;

define('ROOT', dirname(__DIR__));

if (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = '/';
}

if (php_sapi_name() === 'cli-server') {
    define('RACINE', '/');
    define('ROUTE', '/');
    $url = $_SERVER['REQUEST_URI'];
} else {
    define('RACINE', '/templatePoo/public/');
    define('ROUTE', '/templatePoo/');
}

require ROOT . '/vendor/autoload.php';
require ROOT . '/app/App.php';

App::load();

$router = new Router($url);

$router->get('/', 'index.index');
$router->post('/', 'index.post');
$router->run();
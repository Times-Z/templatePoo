<?php

use Core\Router\Router;

define('ROOT', dirname(__DIR__));

if (php_sapi_name() === 'cli-server') {
    define('RACINE', "/");
} else {
    define('RACINE', "/templatePoo/public/");
}

require ROOT . '/vendor/autoload.php';
require ROOT . '/app/App.php';

App::load();

if (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = '/';
}

$router = new Router($url);

$router->get('/', 'index.index');
$router->post('/', 'index.post');
$router->run();
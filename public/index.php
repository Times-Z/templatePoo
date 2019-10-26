<?php

use Core\Router\Router;

define('ROOT', dirname(__DIR__));
define('RACINE', "/templatePoo/");

require ROOT . '/vendor/autoload.php';
require ROOT . '/app/App.php';

/**
 * Instanciation du router
 */
$router = new Router($_GET['url']);

/**
 * Exemple d'appel de page en GET
 * Page d'acceuil
 */
$router->get('/', 'index.index');

/**
 * Exemple d'appel en POST
 * Formulaire exemple
 */
$router->post('/', 'index.post');


$router->run();
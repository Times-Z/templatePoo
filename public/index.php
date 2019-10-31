<?php

use Core\Router\Router;

define('ROOT', dirname(__DIR__));
define('RACINE', "/templatePoo/");

require ROOT . '/vendor/autoload.php';
require ROOT . '/app/App.php';

App::load();

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
 * Avec param
 */
$router->get('/:id', 'index.index');

/**
 * Avec param modifier
 */
$router->get('/:id', 'index.post')->with('id', '[A-Za-z]+');

/**
 * Exemple d'appel en POST
 * Formulaire exemple
 */
$router->post('/', 'index.post');


/**
 * Exemple d'appel de page en GET avec paramètre id (int)
 */
$router->get('/posts/:id', function($id) { echo $id;});

/**
 * Exemple d'appel en GET avec paramètre nom (string)
 */
$router->get('/profile/:nom', function($nom) { echo $nom; });

/**
 * Exemple d'appel en GET avec paramètre nom (string) + id (int)
 */
$router->get('/settings/:nom-:id', function ($nom, $id) { echo $nom . '&nbsp;' . $id; });


/**
 * Run router
 */
$router->run();
<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

/**
 * Class AppController extends de Core\Controller\Controller
 */
class AppController extends Controller {

    /**
     * Template par défaut
     *
     * @var string
     */
    protected $_template = 'default';

    /**
     * Conserve le model name de la table en variable
     *
     * @var string
     */
    protected $_model_name;

    /**
     * Définis le path par défaut des vues
     */
    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';
    }

    /**
     * Charge le fichier controller correspondant a la table charger
     *
     * @param string $model_name
     * @return void
     */
    protected function _loadModel($model_name) {
        return App::getInstance()->getTable($model_name);
    }

}
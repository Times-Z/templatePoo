<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller {

    /**
     * Default template for views
     *
     * @var string
     */
    protected $_template = 'default';
    protected $_model_name;

    /**
     * Define the default path for views
     */
    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';
    }

    /**
     * Load the Table of what you want
     *
     * @param string $model_name
     * @return void
     */
    protected function _loadModel(string $model_name) {
        return App::getInstance()->getTable($model_name);
    }

}
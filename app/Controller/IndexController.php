<?php

namespace App\Controller;

use Core\HTML\BootstrapForm;

class IndexController extends AppController {

    public function __construct() {
        parent::__construct();
    }

    public function index() :void {
        $form = new BootstrapForm($_POST);
        $this->render('index', compact('form'));
    }

    public function post() :void{
        \App::getInstance()->title = "NEVER TRUST USER INPUT";
        $this->render('template');
    }
}

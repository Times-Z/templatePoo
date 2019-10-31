<?php

namespace App\Controller;

use Core\HTML\BootstrapForm;

class IndexController extends AppController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Charge la page index avec l'action index
     *
     * @return void
     */
    public function index() :void {
        $form = new BootstrapForm($_POST);
        $this->render('index', compact('form'));
    }

    /**
     * Charge la page template a l'action post
     *
     * @return void
     */
    public function post() :void{
        \App::getInstance()->title = "NEVER TRUST USER INPUT";
        $this->render('template');
    }
}

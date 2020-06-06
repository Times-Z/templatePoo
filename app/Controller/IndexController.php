<?php

namespace App\Controller;

use App;
use Core\HTML\BootstrapForm;

class IndexController extends AppController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Function rendering index page with form var
     *
     * @return void
     */
    public function index() :void {
        $form = new BootstrapForm($_POST);
        $this->render('index', compact('form'));
    }

    /**
     * Function redering other page
     *
     * @return void
     */
    public function other() :void {
        $this->render('other');
    }

    /**
     * Function rendering post page with new title
     *
     * @return void
     */
    public function post() :void{
        App::getInstance()->title = "NEVER TRUST USER INPUT";
        $this->render('template');
    }
}

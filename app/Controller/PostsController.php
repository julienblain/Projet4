<?php

namespace App\Controller;
use Core\Controller\Controller;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct(); //sinon redefinition de construct qui donne le viewPath
    }

    public function index() {
        echo 'ici';
        //render est dans core\controller\controller
        $this->render();
    }


}

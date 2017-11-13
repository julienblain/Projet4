<?php

namespace App\Controller;
use Core\Controller\Controller;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct(); //sinon redefinition de construct qui donne le viewPath
        //appel loadModel du parent
        $this->loadModel('Posts');

    }

    public function index() {
        $posts = $this->Posts->last();
        //render est dans core\controller\controller
        
        $this->render($posts);
    }


}

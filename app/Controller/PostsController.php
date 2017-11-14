<?php

namespace App\Controller;
use Core\Controller\Controller;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct(); //sinon redefinition de construct qui donne le viewPath
        //appel loadModel du parent
        $this->loadModel('Posts');
        $this->loadModel('Comments');


    }

    public function index() {
        $posts = $this->Posts->queryIndex();
        //render est dans core\controller\controller
        $comments = $this->Comments->queryAll();
        $this->render('posts.index', compact('posts', 'comments'));
    }


}

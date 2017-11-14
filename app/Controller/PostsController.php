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

    /*public function index() {
        $posts = $this->Posts->queryIndex();
        //render est dans core\controller\controller
        //TODO a changer on recupere pas tout a l'index
        $comments = $this->Comments->queryAll();
        $this->render('posts.index', compact('posts', 'comments'));
    }*/

    public function comments() {
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];

        $comments = $this->Comments->queryCommentsById($postId);
        var_dump($comments);
        $this->render('posts.comments', compact('comments'));
    }

    public function index() {
        $postAndComments = $this->Posts->queryIndex();
        $this->render('posts.index', compact('postAndComments'));
    }


}

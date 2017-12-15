<?php
namespace App\Controller;

use Core\Controller\Controller;

class PostsController extends AppController {

    public function __construct() {
        //parent gives viewPath and loadModel
        parent::__construct();
        $this->loadModel('Posts');
        $this->loadModel('Comments');
    }

    public function postsSelected() {
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $post = $this->Posts->queryPostSelected($postId);

        //if post doesn t exist
        if(empty($post)) {
            return $this->error();
        }

        $comments = $this->Comments->queryCommentsById($postId);
        $postsTitle = $this->Posts->queryTitles();
        return $this->render('posts.index', compact('post', 'comments', 'postsTitle'));
    }


    public function index() {
        $post = $this->Posts->queryIndex();
        $postId = $post[0]->id;
        $comments = $this->Comments->queryCommentsById($postId);
        $postsTitle = $this->Posts->queryTitles();
        $this->render('posts.index', compact('post', 'comments', 'postsTitle'));
    }

    public function error() {
        include_once($this->viewPath.'posts/error.php');
        $this->index();
    }

    public function legalNotice() {
        $this->render('templates.legalNotice');
    }
}

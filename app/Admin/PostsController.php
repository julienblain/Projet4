<?php
namespace App\Admin;
use \App;
use App\Controller\AppController;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct(); //sinon redefinition de construct qui donne le viewPath
        //appel loadModel du parent
        $this->loadModel('Posts');
        $this->loadModel('Comments');
    }

    public function postsSelected() {
        //TODO a factoriser
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
         $postsTitle = $this->Posts->queryTitles();
        $post = $this->Posts->queryPostSelected($postId);
        $comments = $this->Comments->queryCommentsById($postId);
        $this->render('admin.read', compact('postsTitle', 'post', 'comments'));
    }

    public function postsDelete() {
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $this->Posts->deletePostById($postId);
        $this->Comments->deleteCommentsByIdPost($postId);
        $this->render('admin.delete');

    }

    public function postsUpdate() {
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $post = $this->Posts->queryPostSelected($postId);
        $comments = $this->Comments->queryCommentsById($postId);
        $this->render('admin.update', compact('post'));
    }

    public function postsUpdated() {
        //TODO a verifier les accents
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];

        $postTitle = $_POST['postTitle'];
        $postContent = $_POST['postContent'];
        $post = $this->Posts->updatedPost($postId, $postTitle, $postContent);
        $this->render('admin.updated');

    }

    public function postsCreate() {

        $this->render('admin.create');
    }

    public function postsCreated() {
        $app = App::getInstance();
        $postTitle = $_POST['postTitle'];
        $postContent = $_POST['postContent'];
        $this->Posts->insert($postTitle, $postContent);
        $this->render('admin.created');
    }




}

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
        $post = $this->Posts->queryPostSelected($postId);
        $comments = $this->Comments->queryCommentsById($postId);
        $this->render('admin.read', compact('post', 'comments'), 'admin.index');
    }

    public function postsDelete() {
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $this->Posts->deletePostById($postId);
        $this->Comments->deleteCommentsByIdPost($postId);
        $this->render('admin.delete', $variables=[], 'admin.index');

    }


}

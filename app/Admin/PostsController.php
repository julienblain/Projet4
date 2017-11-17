<?php
namespace App\Admin;
use \App;
use App\Controller\AppController;

class PostsController extends AppController {

    public function postsSelected() {
        //TODO a factoriser
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $this->loadModel('Comments');
        $postAndComments = $this->Comments->queryCommentsById($postId);
        $this->render('admin.read', compact('postAndComments'), 'admin.index');
    }

    public function postsDelete() {
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $this->loadModel('Posts');
        $this->Posts->deletePostById($postId);
        $this->loadModel('Comments');
        $this->Comments->deleteCommentsByIdPost($postId);
        $this->render('admin.delete', $variables=[], 'admin.index');

    }


}

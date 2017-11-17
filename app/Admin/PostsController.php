<?php
namespace App\Admin;
use \App;
use App\Controller\AppController;

class PostsController extends AppController {

    public function postsSelected() {
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $this->loadModel('Comments');
        $postAndComments = $this->Comments->queryCommentsById($postId);
        $this->render('admin.read', compact('postAndComments'), 'admin.index');
    }


}

<?php

namespace App\Controller;


class CommentsController extends AppController {

    public function __construct() {
        parent::__construct(); //sinon redefinition de construct qui donne le viewPath
        //appel loadModel du parent
        //$this->loadModel('Posts');
        $this->loadModel('Comments');

    }

    public function commentsComment() {
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $email = $_POST['email'];
        $this->Comments->insert($postId, $author, $email, $content);
        $this->render('posts.addComment');
    }
}

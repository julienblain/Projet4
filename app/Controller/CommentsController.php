<?php

namespace App\Controller;


class CommentsController extends AppController {

    public function __construct() {
        parent::__construct(); //sinon redefinition de construct qui donne le viewPath
        //appel loadModel du parent
        //$this->loadModel('Posts');
        $this->loadModel('Comments');
        $this->loadModel('Reported');

    }

    public function commentsComment() {
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $email = $_POST['email'];
        $addressIp = $_SERVER['REMOTE_ADDR'];
        $this->Comments->insert($postId, $author, $email, $content, $addressIp);
        $this->render('posts.addComment');
    }

    public function commentsReported() {
        $id = \explode('.', $_GET['p']);
        $postId = $id[1];
        $commentId = $id[3];
        $email = $_POST['email'];

        //controle du mail du signaleur
        $reported = $this->Reported->count($email);

        if ($reported[0] == 1 ) {
            return $this->render('posts.reported');
        } else {
         $this->Reported->addEmail($email);

            //QUESTION peut on faire une re
            //incrementation du nb de signalement du comment en bdd²
            $nbReported = $this->Comments->queryReported($commentId);
            $nbReported = $nbReported->reportedComment +1;
            $this->Comments->updateComment($commentId, $nbReported);


            return $this->render('posts.reporting');
        }

    }
}
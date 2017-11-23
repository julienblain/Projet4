<?php
namespace App\Admin;
use App\Controller\AppController;
use \App;

class CommentsController extends AppController {

    public function __construct() {
        parent::__construct(); //sinon redefinition de construct qui donne le viewPath
        //appel loadModel du parent
        $this->loadModel('Posts');
        $this->loadModel('Comments');
        $this->loadModel('Reported');
    }

    public function commentsIgnore() {
        $app = App::getInstance();
        $commentId = \explode('.', $_GET['p']);
        var_dump($commentId);
        $commentId = $commentId[1];
        $nbReported = 0;
        $this->Comments->updateComment($commentId, $nbReported);
        //$this->Reported->
        $this->render('admin.ignore');
    }

    public function commentsDelete() {
        $app = App::getInstance();
        $comment = \explode('.', $_GET['p']);
        $commentId = $comment[1];
        $mail = $comment[3].'.'.$comment[4];
        //on eleve les parentheses
        $mail = str_replace('(', '',$mail);
        $mail = str_replace(')', '',$mail);
        $addressIp = $comment[5];
        $this->Reported->addReporting($mail, $addressIp);
        $this->Comments->deleteComment($commentId);
        $this->render('admin.deleteComment');

    }


}

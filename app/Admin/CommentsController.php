<?php
namespace App\Admin;
use App\Controller\AppController;
use \App;
use App\Admin\LoggedController;

class CommentsController extends AppController {
//TODO factoriser
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
        $commentId = $commentId[1];
        $nbReported = 0;
        $this->Comments->updateComment($commentId, $nbReported);

        include_once($this->viewPath."admin/ignore.php");
        $index = new LoggedController;
        return $index->adminIndex();

    }

    public function commentsDelete() {
        $app = App::getInstance();
        $comment = \explode('.', $_GET['p']);
        $commentId = $comment[1];
        $addressIp =$comment[3];
        //recuperation du count reported
        $controlIpReported = $this->Reported->countIpReported($addressIp);
        if($controlIpReported == false) {
            $countReported = 1;
            $this->Reported->addUserReporting($addressIp, $countReported);
        }
        else {
            $countReported = $controlIpReported[0] + 1;
            echo $countReported;
            $this->Reported->addReporting($addressIp, $countReported);
        }

        $this->Comments->deleteComment($commentId);

        include_once($this->viewPath."admin/deleteComment.php");
        $index = new LoggedController;
        return $index->adminIndex();

    }


}

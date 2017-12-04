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
        $mail = $comment[3].'.'.$comment[4];
        //on eleve les parentheses
        $mail = str_replace('(', '',$mail);
        $mail = str_replace(')', '',$mail);
        //TODO ajouter le mail et le pseudo, si pseudo mettre dans la vue le nom qui pose pb
        $this->Reported->addReporting($mail);
        $this->Comments->deleteComment($commentId);

        include_once($this->viewPath."admin/deleteComment.php");
        $index = new LoggedController;
        return $index->adminIndex();

    }


}

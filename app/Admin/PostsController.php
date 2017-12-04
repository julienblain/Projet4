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
        //TODO a factoriser dans AppController ?
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
         $postsTitle = $this->Posts->queryTitles();
        $post = $this->Posts->queryPostSelected($postId);
        $comments = $this->Comments->queryCommentsById($postId);
        return $this->render('admin.read', compact('postsTitle', 'post', 'comments'));
    }

    public function postsDelete() {
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $this->Posts->deletePostById($postId);
        $this->Comments->deleteCommentsByIdPost($postId);
        include_once($this->viewPath.'/admin/delete.php');
        $index = new LoggedController;
        return $index->adminIndex();

    }

    public function postsUpdate() {
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $post = $this->Posts->queryPostSelected($postId);
        $comments = $this->Comments->queryCommentsById($postId);
        return $this->render('admin.update', compact('post'));
    }

    public function postsUpdated() {
        //TODO a verifier les accents
        $app = App::getInstance();
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];

        /* for the layout*/
        $postTitle = htmlspecialchars($_POST['postTitle']);
        $postTitle = '<div>'.$postTitle. '</div>';
        
        $postContent = $_POST['postContent'];
        $post = $this->Posts->updatedPost($postId, $postTitle, $postContent);

        include_once($this->viewPath.'/admin/updated.php');
        $index = new LoggedController;
        return $index->adminIndex();

    }

    public function postsCreate() {
        //TODO verifier les elements de mise en page de tinymce

        return $this->render('admin.create');
    }

    public function postsCreated() {
        $app = App::getInstance();
        $postTitle = $_POST['postTitle'];
        $postContent = $_POST['postContent'];
        $this->Posts->insert($postTitle, $postContent);

        include_once($this->viewPath.'/admin/created.php');
        $index = new LoggedController;
        return $index->adminIndex();
    }




}

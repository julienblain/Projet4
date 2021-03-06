<?php
namespace App\Admin;

use \App;
use App\Controller\AppController;

class PostsController extends AppController {
    
    protected $postId;

    public function __construct() {
        //viewPath is in parent class
        parent::__construct();

        //call the function loadModel of parent
        $this->loadModel('Posts');
        $this->loadModel('Comments');
    }

    public function setPost() {
        $app = App::getInstance();
        $this->postId = \explode('.', $_GET['p']);
        $this->postId = $this->postId[1];
    }

    public function postsSelected() {
        $this->setPost();
        $postsTitle = $this->Posts->queryTitles();
        $post = $this->Posts->queryPostSelected($this->postId);

        //if the selected post don't exist
        if(empty($post)) {
             return $this->error();
        }

        $comments = $this->Comments->queryCommentsById($this->postId);
        return $this->render('admin.read', compact('postsTitle', 'post', 'comments'));
    }

    public function postsDelete() {
        $this->setPost();
        $this->Posts->deletePostById($this->postId);
        $this->Comments->deleteCommentsByIdPost($this->postId);
        include_once($this->viewPath.'/admin/delete.php');

        // home view
        $index = new LoggedController;
        return $index->adminIndex();
    }

    public function postsUpdate() {
        $this->setPost();
        $post = $this->Posts->queryPostSelected($this->postId);
        $comments = $this->Comments->queryCommentsById($this->postId);
        return $this->render('admin.update', compact('post'));
    }

    public function postsUpdated() {
        $this->setPost();

        //validity control by tinyMCE
        $postTitle = $_POST['postTitle'];
        $postContent = $_POST['postContent'];
        $post = $this->Posts->updatedPost($this->postId, $postTitle, $postContent);

        include_once($this->viewPath.'/admin/updated.php');
        $index = new LoggedController;
        return $index->adminIndex();
    }

    public function postsCreate() {
         $postsTitle = $this->Posts->queryTitles();
         return $this->render('admin.create', compact('postsTitle'));
    }

    public function postsCreated() {
        $app = App::getInstance();

        //validity control by tinyMCE
        $postTitle = $_POST['postTitle'];
        $postContent = $_POST['postContent'];
        $this->Posts->insert($postTitle, $postContent);

        include_once($this->viewPath.'/admin/created.php');
        $index = new LoggedController;
        return $index->adminIndex();
    }
}

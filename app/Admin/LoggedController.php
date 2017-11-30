<?php
namespace App\Admin;

use App\Controller\AppController;
use \App;
use Core\Auth\DBAuth;

 class LoggedController  extends AppController {

     public function loggedConnection() {

         $app = App::getInstance();

         $auth = new DBAuth($app->getDb());

         //verif login
         if(isset($_SESSION['auth'])) {
              return $this->adminIndex();
         }
         elseif (isset($_POST['login']) && isset($_POST['password'])) {
            
             $login = htmlspecialchars($_POST['login']);
             $password = htmlspecialchars($_POST['password']);

             if($auth->login($login, $password, true) === true) {
                 $_SESSION['auth'] = $login;
                  return $this->adminIndex();
             }
              else {
                 //envoie vers la forbidden du controller;
                 include_once($this->viewPath."admin/errors.php");
             return $this->connectionPage();
             }
         }
         else {
             $this->connectionPage();
         }
     }

     public function connectionPage() {
         $this->render('admin.connection');
     }

     public function adminIndex() {
         $this->loadModel('Posts');
         $this->loadModel('Comments');
         $postsTitle = $this->Posts->queryTitles();
         $commentsReported = $this->Comments->queryAllReported();
        $variables = compact('postsTitle', 'commentsReported');
        $this->render('admin.posts', $variables);
     }

 }

<?php
namespace App\Admin;

use App\Controller\AppController;
use \App;
use Core\Auth\DBAuth;

 class LoggedController  extends AppController {

     public function connection() {

         $app = App::getInstance();

         $auth = new DBAuth($app->getDb());

         //verif login
         if(isset($_POST['login']) && isset($_POST['password'])) {
             $login = htmlspecialchars($_POST['login']);
             $password = htmlspecialchars($_POST['password']);

             if($auth->login($login, $password, true) === true) {
                 $_SESSION['auth'] = $login;


                  return $this->adminIndex();

             }
             else {
                 //envoie vers la forbidden du controller;
             return $this->forbidden('admin.errors');
             }

         }
         elseif (isset($_SESSION['auth'])) {
             return $this->adminIndex();
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
         $postsTitle = $this->Posts->queryTitles();
        $variables = compact('postsTitle');
        $this->render('admin.posts', $variables, 'admin.index');
     }

 }

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
                 $this->render('admin.index');
             }
             else {
                 //envoie vers la forbidden du controller;
             return $this->forbidden('admin.errors');
             }

         }
         else {
             $this->connectionPage();
         }


     }

     public function connectionPage() {
         $this->render('admin.connection');
     }

     public function login() {

     }
 }

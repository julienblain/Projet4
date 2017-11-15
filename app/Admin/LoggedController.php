<?php
namespace App\Admin;

use App\Controller\AppController;
use \App;
use Core\Auth\DBAuth;

 class LoggedController  extends AppController {

     public function connection() {

         $app = App::getInstance();

         $auth = new DBAuth($app->getDb());
         //si l'admin n'est pas loggé
         if(!$auth->logged()) {
             $this->connectionPage();
         }
     }

     public function connectionPage() {
         $this->render('admin.connection');
     }
 }

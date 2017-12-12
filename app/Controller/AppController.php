<?php
// donne le path des vues de l'app
namespace App\Controller;
use \App;
use Core\Controller\Controller;

class AppController extends Controller {

    protected $template = 'default';

    //definition de la vue à la volé
    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';

    }

    //renvoie a getTable de App et donne le modele a charger
    protected function loadModel($modelName) {

        $this->$modelName = App::getInstance()->getTable($modelName);
    }

    public function error() {
        include_once($this->viewPath.'posts/error.php');
    }

}

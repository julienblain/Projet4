<?php
// donne le path des vues de l'app
namespace App\Controller;
use App\App;
use Core\Controller\Controller;

class AppController extends Controller {

    protected $template = 'default';

    //definition de la vue à la volé
    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';
    }

}

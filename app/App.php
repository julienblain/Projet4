<?php
//permet de ne plus trinballer $datas de page en page, et permet de garder la connexion
//donc methode static
//pas de namespace pour que ca soit plus simple a appelé par la suite
//carrefour pour l'appli

class App {
    public $titlePage = "Billet simple pour l'Alaska";
    private $_dbInstance;
    private static $_instance;

    //chargement des autoloader et session start
    public function load () {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }



}

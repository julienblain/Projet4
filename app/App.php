<?php
//permet de ne plus trinballer $datas de page en page, et permet de garder la connexion
//donc methode static
//pas de namespace pour que ca soit plus simple a appelé par la suite
//carrefour pour l'appli

use Core\Config;
use Core\Database\MysqlDatabase;
use App\Router;

class App {
    public $titlePage = "Billet simple pour l'Alaska";
    private $_dbInstance;
    private static $_instance;

    public function router() {
            $route = new Router();
            $getController = $route->getController();
            $action = $route->getAction();
            $controller = new $getController();
            return $controller->$action();
    }

    //chargement des autoloader et session start
    public function load () {
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    //singleton
    public static function getInstance() {
        if(self::$_instance === null) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    //Design Pattern Factory (namespace)
    public function getTable($modelName) {
        $className = '\\App\\Table\\' . ucfirst($modelName) . 'Table';
        return new $className($this->getDb());
    }

    public function getDb() {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if($this->_dbInstance === null) {
            $this->_dbInstance = new MysqlDatabase(
                $config->getSettings('db_name'),
                $config->getSettings('db_user'),
                $config->getSettings('db_pass'),
                $config->getSettings('db_host')
            );

        }

         return $this->_dbInstance;
    }



}

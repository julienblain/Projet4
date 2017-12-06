<?php
namespace App;

//QUESTION ROUTER ok ? appelé via App
class Router {
    protected $action;
    protected $controller;
    private $_serverSelfAdmin;
    private $_page;


    public function __construct() {
        $this->setServerSelfAdmin();
        $this->setPage();
        $this->setAction();
        $this->setController();

        // echo $this->_serverSelfAdmin .' server <br>';
        // var_dump( $this->_page) ;
        // echo $this->controller .' controller <br>';
        // echo $this->action .'action <br>';
        //
        // var_dump($_SESSION);
    }

    public function setServerSelfAdmin() {
        //permet de recuperer l'url pour voir si on est sur l'espace admin
        $path = $_SERVER['PHP_SELF'];
        if (\strstr($path, 'Forteroche')) {
            $this->_serverSelfAdmin = 1;
        } else {
            $this->_serverSelfAdmin = 0;
        }
    }

    public function setPage() {
        //si le mec n'est pas authentifié sur admin/index
        if( ($this->_serverSelfAdmin == 1 ) && (!isset($_SESSION['auth'])) ) {
                $this->_page = 'logged.connection';
        }
        elseif ((!isset($_GET['p'])) && (isset($_SESSION['auth'])) && ($this->_serverSelfAdmin == 1 )) {
                $this->_page = 'logged.connection';
        }
        elseif (isset($_GET['p'])){
                $this->_page = $_GET['p'];
        }
        elseif(isset($_GET['logout'])) {
            session_destroy();
            $this->_page = 'posts.index';
        }
        else {
            $this->_page = 'posts.index';
        }

        $this->_page = \explode('.', $this->_page);
    }

    public function setAction() {
        if($this->_serverSelfAdmin === 1) {
            if((count($this->_page)) >2) {
                $this->action = $this->_page[0] . ucfirst($this->_page[2]);
            }
            else {
                $this->action = $this->_page[0] . $this->_page[1];
            }

        }
        else {
            if((count($this->_page)) > 2 ) {
                $this->action = $this->_page[0] . ucfirst($this->_page[2]);
            }
            else {
                $this->action = $this->_page[1];
            }
        }

    }

    public function setController() {
        if ($this->_serverSelfAdmin === 1) {
            $this->controller = '\App\Admin\\' . ucfirst($this->_page[0]) . 'Controller';
        }
        else {
            $this->controller = '\App\Controller\\' . ucfirst($this->_page[0]) . 'Controller';
        }

    }

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }
}

 ?>

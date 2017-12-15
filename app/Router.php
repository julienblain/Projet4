<?php
namespace App;

class Router {

    private $_serverSelfAdmin;
    private $_page;
    protected $action;
    protected $controller;

    public function __construct() {
        $this->setServerSelfAdmin();
        $this->setPage();
        $this->setAction();
        $this->setController();
    }

    //lets know if we are on admin page
    public function setServerSelfAdmin() {
        $path = $_SERVER['PHP_SELF'];

        if (\strstr($path, 'Forteroche')) {
            $this->_serverSelfAdmin = 1;
        } else {
            $this->_serverSelfAdmin = 0;
        }
    }

    public function setPage() {
        //loggedController control the logged users and return the home view
        if( ($this->_serverSelfAdmin == 1 ) && (!isset($_SESSION['auth'])) ) {
                $this->_page = 'logged.connection';
        }
        elseif ((!isset($_GET['p'])) && (isset($_SESSION['auth'])) && ($this->_serverSelfAdmin == 1 )) {
                $this->_page = 'logged.connection';
        }
        elseif (isset($_GET['p'])){
            //setting control
            $control = $_GET['p'];
            $control = \explode('.', $control);
            if(
                (($control[0] == 'posts') && ($control[1] == 'create') && (isset($_SESSION['auth'])))
                ||
                (($control[0] == 'posts') && ($control[1] == 'created') && (isset($_SESSION['auth'])))
                ||
                (($control[0] == 'logged') && ($control[1] == 'connection') && (isset($_SESSION['auth'])))
                ||
                (($control[0] == 'posts') && ($control[1] == 'legalNotice'))
                ||
                (($control[0] == 'posts') && ($control[2] == 'selected') && ((int) $control[1]))
                ||
                (($control[0] == 'comments') && ($control[2] == 'comment') && ((int) $control[1]))
                ||
                (($control[0] == 'comments') && ($control[2] == 'reported') && ((int) $control[1]) && ((int) $control[3]))
                ||
                (($control[0] == 'comments') && ($control[2] == 'ignore') && ((int) $control[1]))
                ||
                (($control[0] == 'comments') && ($control[2] == 'delete') && ((int) $control[1]) && ((int) $control[3]) && (isset($_SESSION['auth'])))
                ||
                (($control[0] == 'posts') && ((int)$control[1]) && ($control[2] == 'update') && (isset($_SESSION['auth'])))
                ||
                (($control[0] == 'posts') && ((int)$control[1]) && ($control[2] == 'updated') && (isset($_SESSION['auth'])))
                ||
                (($control[0] == 'posts') && ((int)$control[1]) && ($control[2] == 'delete') && (isset($_SESSION['auth'])))

            ) {

                $this->_page = $_GET['p'];
            }
            else {
                if(($this->_serverSelfAdmin == 1 )) {
                    echo '<p class="notification">La page demandée n\'existe pas. </p>';
                    $this->_page = 'logged.connection';
                }
                else {
                    echo '<p class="notification">La page demandée n\'existe pas. </p>';
                    $this->_page = 'posts.index';
                }
            }
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
        //count via explode array
        if($this->_serverSelfAdmin === 1) { // admin page
            if((count($this->_page)) >2) {
                $this->action = $this->_page[0] . ucfirst($this->_page[2]);
            }
            else {
                $this->action = $this->_page[0] . $this->_page[1];
            }
        }
        else {
            if((count($this->_page)) > 2 ) { // users page
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

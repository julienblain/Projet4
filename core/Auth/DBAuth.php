<?php

namespace Core\Auth;
use \Core\Controller\Controller;

class DBAuth {

    private $_db;

    // connexion a la base de donnée
    public function __construct($db) {
        $this->_db = $db;
    }

    //verifie dans la session si on a un utilisateur
    public function logged() {
        return isset($_SESSION['auth']);
    }

    //QUESTION on met text en bdd pour sha1 ?
    //verification et validation des logins et debut session
    public function login($login, $password, $one) {
        $user = $this->_db->prepare(
            "SELECT * FROM users "
        , $one);

        if (($user) && ($user->password === sha1($password))) {
            return true;
        }
        else {
            return false;
        }
    }



}

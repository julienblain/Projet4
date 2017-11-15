<?php

namespace Core\Auth;

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
}

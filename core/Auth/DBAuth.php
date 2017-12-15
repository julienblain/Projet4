<?php

namespace Core\Auth;

use \Core\Controller\Controller;

class DBAuth {

    private $_db;

    // bdd connection
    public function __construct($db) {
        $this->_db = $db;
    }

    // logged admin verification
    public function logged() {
        return isset($_SESSION['auth']);
    }

    // verification admin login
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

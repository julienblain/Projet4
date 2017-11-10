<?php
namespace Core\Database;

class MysqlDatabase {

    //mise en variable des code
    private $_dbName;
    private $_dbUser;
    private $_dbPassword;
    private $_dbHost;

    private $_pdo;

    public function __construct($dbName, $dbUser, $dbPassword, $dbHost) {
        $this->_dbName = $dbName;
        $this->_dbUser = $dbUser;
        $this->_dbPassword = $dbPassword;
        $this->_dbHost = $dbHost;
    }

    public function getPdo() {
        //pour eviter de multiple requete pdo
        if ($this->_pdo === null) {
            $pdo = new \PDO('mysql:host=' . $this->_dbHost . ';
                dbname=' . $this->_dbName . ';
                charset=utf8',
                $this->_dbUser,
                $this->_dbPassword
            );
            $this->_pdo = $pdo;
        }

        return $this->_pdo;
    }


}

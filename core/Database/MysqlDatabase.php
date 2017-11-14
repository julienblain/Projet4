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
            try {
                $pdo = new \PDO('mysql:host=' . $this->_dbHost . ';
                    dbname=' . $this->_dbName . ';
                    charset=utf8',
                    $this->_dbUser,
                    $this->_dbPassword
                );
                $this->_pdo = $pdo;
            }
            catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

        }

        return $this->_pdo;
    }

    //recuperation des donnees grace a fecth
    //QUESTION on fait un try pour fetch ?
    public function query($statement) {
        $req = $this->getPdo()->query($statement);
        $req->setFetchMode(\PDO::FETCH_OBJ); //recuperation des données sous forme d'objet
        $datas = $req->fetchAll();
        $req->closeCursor();
        return $datas;

    }

    public function prepare($statement) {
        $req = $this->getPdo()->prepare($statement);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ); //recuperation des données sous forme d'objet
        //QUESTION retourne plusieurs objets avec le post repeté
        //QUESTION creation d'une class Comment dans Entity ?
        //QUESTION les champs de 2 tables diff s'écrasnet si meme non?
        $datas = $req->fetchAll();
        $req->closeCursor();
        return $datas;
    }


}

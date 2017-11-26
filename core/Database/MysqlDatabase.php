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
                die('Error : ' . $e->getMessage());
            }

        }

        return $this->_pdo;
    }

    //TODO sur les exceptions et ecriture du log
    //recuperation des donnees grace a fecth
    public function query($statement, $one = false) {
        $req = $this->getPdo()->query($statement);
        $req->setFetchMode(\PDO::FETCH_OBJ); //recuperation des données sous forme d'objet

        if($one) {
            $datas = $req->fetch();
        }
        else {
            $datas = $req->fetchAll();
        }
        $req->closeCursor();
        return $datas;

    }

//au cas ou on recupere qu'une donnée
    public function prepare($statement, $one = false) {
        $req = $this->getPdo()->prepare($statement);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ); //recuperation des données sous forme d'objet
    
        if($one) {
            $datas = $req->fetch();
        }
        else {
            $datas = $req->fetchAll();
        }
        $req->closeCursor();

        return $datas;
    }

    public function delete($statement) {
        $req = $this->getPdo()->prepare($statement);
        $req->execute();
        $req->closeCursor();
        return true;
    }

    public function update($statement, $array) {
        $req = $this->getPdo()->prepare($statement);
        echo 'ici';
        $req->execute($array);
        $req->closeCursor();
    }

    public function insertInto($statement, $array) {
        $req = $this->getPdo()->prepare($statement);
        $req->execute($array);
        $req->closeCursor();
    }

    public function countPrepare($statement) {
        $req = $this->getPdo()->prepare($statement);
        $req->execute();
        $data = $req->fetch();
        $req->closeCursor();
        return $data;
    }

    public function updateOne($statement) {
        $req = $this->getPdo()->exec($statement);
        var_dump($req);
    }




}

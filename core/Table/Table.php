<?php
namespace Core\Table;
//use Core\Database\MysqlDatabase;

class Table {

    //devine le nom de la table par rapport au nom du model
    protected $table;
    protected $db;

    public function __construct($db) {
        $this->db = $db;
        //recuperation du nom de la table
        if(is_null($this->table)) {
            $parts = \explode('\\', \get_class($this)); //return array
            $className = \end($parts); //donne PostTable
            $this->table = \strtolower(\str_replace('Table', '', $className)); //posts
        }
    }

    public function query($statement) {
        //envoi a mysqlDB
        return $this->db->query($statement);
    }

    public function prepare($statement, $one=false) {
        return $this->db->prepare($statement, $one=false);
    }

    /**
     *
     * @return object
     */
    //requete au niveau de la bdd
    //TODO ne sert a rien
    public function queryAll() {
        return $this->query("SELECT * FROM reported");
    }

    public function delete($statement) {
        return $this->db->delete($statement);
    }

    public function update($statement, $array) {
        return $this->db->update($statement, $array);
    }

    public function insertInto($statement, $array) {
        return $this->db->insertInto($statement, $array);
    }

    public function countPrepare($statement) {
        return $this->db->countPrepare($statement);
    }



}

 ?>

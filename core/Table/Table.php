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

    public function prepare($statement) {
        return $this->db->prepare($statement);
    }

    /**
     *
     * @return object
     */
    //requete au niveau de la bdd
    public function queryAll() {
        return $this->query("SELECT * FROM {$this->table}");
    }


}

 ?>

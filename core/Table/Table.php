<?php
namespace Core\Table;

class Table {

    protected $table;
    protected $db;

    public function __construct($db) {
        $this->db = $db;

        //guess the table name by the model name
        if(is_null($this->table)) {
            $parts = \explode('\\', \get_class($this));
            $className = \end($parts);
            $this->table = \strtolower(\str_replace('Table', '', $className));
        }
    }

    public function query($statement, $one=false) {
        return $this->db->query($statement, $one);
    }

    public function prepare($statement, $one=false) {
        return $this->db->prepare($statement, $one=false);
    }

    public function delete($statement) {
        return $this->db->delete($statement);
    }

    public function update($statement, $array) {
        return $this->db->update($statement, $array);
    }

    public function updateOne($statement) {
        return $this->db->updateOne($statement);
    }

    public function insertInto($statement, $array) {
        return $this->db->insertInto($statement, $array);
    }
}

<?php
namespace App\Table;
use Core\Table\Table;

class PostsTable extends Table {

    protected $table = 'posts';

    //QUESTION 2 requetes via Table ou une ici ?
    public function queryIndex() {
        return $this->queryAll();

    }


}

 ?>

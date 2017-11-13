<?php
namespace App\Table;
use Core\Table\Table;

class PostsTable extends Table {

    protected $table = 'posts';

    public function last() {
        return $this->queryAll();

    }


}

 ?>

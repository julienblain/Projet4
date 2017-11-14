<?php
namespace App\Table;
use Core\Table\Table;

class PostsTable extends Table {

    protected $table = 'posts';

    //QUESTION 2 requetes via Table ou une ici ?
    //TODO a enlever
    // public function queryIndex() {
        // return $this->queryAll();
    // }

    public function queryIndex() {
        return $this->prepare(
            "SELECT * FROM posts
            LEFT JOIN comments
            ON comments.idPost = posts.id
            WHERE posts.id = (SELECT MAX(id) FROM posts)
            AND WHERE posts.datePost
        ");
    }


}

 ?>

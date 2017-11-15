<?php
namespace App\Table;
use Core\Table\Table;

class PostsTable extends Table {

    protected $table = 'posts';

    //QUESTION selection par l'id ou la date ?
    public function queryIndex() {
        return $this->prepare(
            "SELECT * FROM posts
            LEFT JOIN comments
            ON comments.idPost = posts.id
            WHERE posts.id = (SELECT MAX(id) FROM posts)

        ");
    }

    public function queryTitles() {
        return $this->query(
            "SELECT title FROM posts"
        );
    }

}

 ?>

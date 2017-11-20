<?php
namespace App\Table;
use Core\Table\Table;

class PostsTable extends Table {

    protected $table = 'posts';

    //QUESTION selection par l'id ou la date ?
    public function queryIndex() {
        return $this->prepare(
            "SELECT * FROM posts
            WHERE posts.id = (SELECT MAX(id) FROM posts)
        ");
    }

    public function queryTitles() {
        return $this->query(
            "SELECT id, title FROM posts"
        );
    }

    //QUESTION on peut faire un delete sur 2 table en 1 requete ?
        public function deletePostById($postId) {
            return $this->delete(
                "DELETE FROM posts
                WHERE id = {$postId}"
            );
        }

        public function queryPostSelected($postId) {
            return $this->prepare(
                "SELECT * FROM posts
                WHERE id = {$postId}"
            );
        }

        public function updatedPost($postId, $postTitle, $postContent) {
            return $this->update(
                ("UPDATE posts
                SET title = :postTitle, content = :postContent
                WHERE id = {$postId}"),

                (array(
                    'postTitle' => $postTitle,
                    'postContent' => $postContent
                )) 
            );
        }
}

 ?>

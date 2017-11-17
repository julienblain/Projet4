<?php

namespace App\Table;
use Core\Table\Table;

class CommentsTable extends Table {

    protected $table = 'comments';

    public function queryCommentsById($postId) {
         return $this->prepare(
            "SELECT * FROM posts
            INNER JOIN comments
            ON comments.idPost = posts.id
            WHERE posts.id = {$postId}
            "
        );//TODO oublie de l'ordre pour les commentaires

    }


    public function deleteCommentsByIdPost($postId) {
        return $this->delete(
            "DELETE FROM comments
            WHERE idPost = {$postId}"
        );
    }
}

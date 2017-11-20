<?php

namespace App\Table;
use Core\Table\Table;

class CommentsTable extends Table {

    protected $table = 'comments';

    public function queryCommentsById($postId) {
         return $this->prepare(
            "SELECT * FROM comments
            WHERE idPost = {$postId}
            ORDER BY idComment
            "
        );//TODO oublie de l'ordre pour les commentaires

    }


    public function deleteCommentsByIdPost($postId) {
        return $this->delete(
            "DELETE FROM comments
            WHERE comments.idPost = {$postId}"
        );
    }
}

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

    public function insert($postId, $author, $email, $content) {
        return $this->insertInto(
                ('INSERT INTO comments(idPost, author, mail, contentComment)
                VALUES(:idPost, :author, :mail, :contentComment)'),

                (array(
                    'idPost' => $postId,
                    'author' => $author,
                    'mail' => $email,
                    'contentComment' => $content
                ))
        );
    }

    public function queryReported($commentId, $one=true) {
        return $this->query((
            "SELECT reportedComment FROM comments
            WHERE idComment = '{$commentId}'"
        ), $one);
    }

    public function updateComment($commentId, $nbReported) {
        return $this->update(
            ("UPDATE comments
            SET  reportedComment= :nbReported
            WHERE idComment = '{$commentId}'"),

            (array(
                'nbReported' => $nbReported
            ))
        );
    }

}

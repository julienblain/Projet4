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

    public function insert($postId, $author, $email, $content, $addressIp) {
        return $this->insertInto(
                ('INSERT INTO comments(idPost, author, mail, contentComment, addressIp)
                VALUES(:idPost, :author, :mail, :contentComment, :addressIp)'),

                (array(
                    'idPost' => $postId,
                    'author' => $author,
                    'mail' => $email,
                    'contentComment' => $content,
                    'addressIp' => $addressIp
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

    public function queryAllReported() {
        return $this->query(
            "SELECT * FROM comments
            WHERE reportedComment > 0
            ORDER BY reportedComment DESC"
        );
    }

    public function deleteComment($commentId) {
        return $this->delete(
            "DELETE FROM comments
            WHERE idComment = '{$commentId}'"
        );
    }

}

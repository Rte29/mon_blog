<?php

namespace Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment_id, comment, DATE_FORMAT(comment_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_creation_date_fr, username
        FROM comment LEFT JOIN user ON comment.id = user.id WHERE post_id = ? AND comment_status = "1" ORDER BY comment_creation_date DESC LIMIT 0, 5');
        $comments->execute(array($postId));

        return $comments;

    }

    public function readAllComment($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment_id, comment, DATE_FORMAT(comment_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_creation_date_fr, username
        FROM comment LEFT JOIN user ON comment.id = user.id WHERE post_id = ? AND comment_status = "1" ORDER BY comment_creation_date DESC');
        $comments->execute(array($postId));

        return $comments;

    }

    public function readCommentsToValidate($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment_id, comment, DATE_FORMAT(comment_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_creation_date_fr, username
        FROM comment LEFT JOIN user ON comment.id = user.id WHERE post_id = ? AND comment_status IS NULL ORDER BY comment_creation_date DESC');
        $comments->execute(array($postId));

        return $comments;

    }

    public function getAllComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment_id FROM comment WHERE post_id = ? ');
        $comments->execute(array($postId));

        return $comments;

    }

    public function setComment($postId, $comment)
    {

        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(post_id, comment, id, comment_creation_date) VALUES(?, ?, 1, NOW())');
        $affectedLines = $comments->execute(array($postId, $comment));

        return $affectedLines;
    }
  
    public function deleteAllComments($postId)
    {
        $db = $this->dbConnect();
        $del = $db->prepare('DELETE FROM comment WHERE post_id = :id');
        $del->execute(['id'=>$postId]);

        return $del;

    }

    public function validateComment($commentId)
    {
        $db = $this->dbConnect();
        $val = $db->prepare('UPDATE comment SET comment_status ="1" WHERE comment_id = ?');
        $valide = $val->execute(array($commentId));

        return $val;
    }

    public function cancelComment($commentId)
    {
        $db = $this->dbConnect();
        $del = $db->prepare('DELETE FROM comment WHERE comment_id = ?');
        $del->execute(array($commentId));

    }

}
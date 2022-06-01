<?php

namespace Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment_id, comment, DATE_FORMAT(comment_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_creation_date_fr 
        FROM comment WHERE post_id = ? AND comment_status = "1" ORDER BY comment_creation_date DESC');
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

}
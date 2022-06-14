<?php

namespace Blog\Model;

require_once("model/Manager.php");
require_once("controller/frontend.php");

class LoginManager extends Manager
{
    public function login($pseudo, $pwd)
    {
        $db = $this->dbConnect();
        $req=$db->prepare('SELECT * FROM user WHERE username=? AND pwd=? limit 1');
        $req->execute(array($pseudo, md5($pwd)));
        $tab = $req->fetch();
        
        return $tab;
    }

    public function readAccountToValidate()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment_id, comment, DATE_FORMAT(comment_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_creation_date_fr, username
        FROM comment LEFT JOIN user ON comment.id = user.id WHERE post_id = ? AND comment_status IS NULL ORDER BY comment_creation_date DESC');
        $comments->execute(array($postId));

        return $comments;

    }    
}
<?php

namespace Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT post_id, title, post_content, DATE_FORMAT(post_creation_date, \'%d/%m/%Y à %Hh%imin\') 
        AS post_creation_date_fr, DATE_FORMAT(post_update_date, \'%d/%m/%Y à %Hh%imin\') AS post_update_date_fr
        FROM post ORDER BY post_creation_date DESC LIMIT 0, 5');

        return $req;
    }

    
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id, title, post_content, DATE_FORMAT(post_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS post_creation_date_fr, DATE_FORMAT(post_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_update_date_fr
        FROM post WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;

        
        
    }
}
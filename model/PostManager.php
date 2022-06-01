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
        FROM post ORDER BY post_creation_date DESC LIMIT 0, 3');

        return $req;
    }

    public function getAllPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT post_id, title, post_content, DATE_FORMAT(post_creation_date, \'%d/%m/%Y à %Hh%imin\') 
        AS post_creation_date_fr, DATE_FORMAT(post_update_date, \'%d/%m/%Y à %Hh%imin\') AS post_update_date_fr
        FROM post ORDER BY post_creation_date DESC ');

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

    public function setPost($title, $author, $text, $cat, $status)
    {

        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO post(title, id, post_creation_date, post_update_date, post_content, post_category_id, post_status) VALUES(?, ?, NOW(), NOW(), ?, ?, ?)');
        $affectedLines = $post->execute(array($title, $author, $text, $cat, $status));

        return $affectedLines;
    }

    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $del = $db->prepare('DELETE FROM post WHERE post_id = :id');
        $del->execute(['id'=>$postId]);

    }

    public function updatePost($postTitle, $postContent, $postId)
    {
        $db = $this->dbConnect();
        $update = $db->prepare('UPDATE post SET title = :title, post_update_date=now(), post_content = :content WHERE post_id = :id');
        $update->execute([
            'title'=>$postTitle, 
            'content'=>$postContent,
            'id'=>$postId, ]);
    }
}
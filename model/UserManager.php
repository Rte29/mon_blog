<?php

namespace Blog\Model;

require_once "model/Manager.php";

class Subscribe extends Manager
{
    public function checkUserLogin($pseudo)
    {
        $db = $this->dbConnect();
        $req=$db->prepare('SELECT id FROM user WHERE username=? limit 1');
        $req->execute(array($pseudo));
        $tab = $req->fetch();
                       
        return $tab;
    }

    public function setUser($name, $firstName, $birth, $email, $pseudo, $pwd)
    {
        $db = $this->dbConnect();
        $ins=$db->prepare('INSERT INTO user(last_name, first_name, birthday, email, admin_role, user_registration_date, user_update_date, username, pwd) 
        VALUES(?,?,?,?,0, NOW(), NOW(),?,?)');
        $ins->execute(array($name, $firstName, $birth, $email, $pseudo, md5($pwd)));
        
        return $ins;    
    }

    public function getUsers($start, $end)
        {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, last_name, first_name, email, DATE_FORMAT(user_registration_date, \'%d/%m/%Y\') 
        AS user_registration_date_fr, username FROM user WHERE user_registration_date >= ? AND user_registration_date <= ? ORDER BY user_registration_date DESC ');
        $req->execute(array($start, $end));
        
        return $req;
    }

    public function getAllUsers()
        {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, last_name, first_name, email, DATE_FORMAT(user_registration_date, \'%d/%m/%Y\') 
        AS user_registration_date_fr, username FROM user ORDER BY last_name DESC ');
                
        return $req;
    }

    public function getUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, last_name, first_name, DATE_FORMAT(birthday, \'%d/%m/%Y\') AS birthday_fr, email, admin_role,  DATE_FORMAT(user_registration_date, \'%d/%m/%Y\') 
        AS user_registration_date_fr, DATE_FORMAT(user_update_date, \'%d/%m/%Y\') 
        AS user_update_date_fr, username FROM user WHERE id = ?');
        $req->execute(array($userId));
        $user = $req->fetch();

        return $user;
    }

    public function deleteUser($userId)
    {
        $db = $this->dbConnect();
        $del = $db->prepare('DELETE FROM user WHERE id = :id');
        $del->execute(['id'=>$userId]);

        return $del;
    }
}
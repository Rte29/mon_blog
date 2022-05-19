<?php

namespace Blog\Model;

require_once("model/Manager.php");

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
        
        
    }
}
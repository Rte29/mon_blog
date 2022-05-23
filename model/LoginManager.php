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
}
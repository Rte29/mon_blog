<?php

namespace Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=mon_blog;charset=utf8', 'root', '');
        return $db;
    }
}
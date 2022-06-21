<?php

namespace Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        try
            {
                $db = new \PDO('mysql:host=localhost;dbname=mon_blog;charset=utf8', 'root', '');
                return $db;
            }
        catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
    }
}
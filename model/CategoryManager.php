<?php

namespace Blog\Model;

require_once("model/Manager.php");

class CategManager extends Manager
{
    public function getCateg()
    {
        $db = $this->dbConnect();
        $category = $db->query('SELECT * FROM post_category ORDER BY category DESC');
    }
}
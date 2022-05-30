<?php
//session_start();

function admin()
{
    require('public/view/frontend/admin.php');
}

function postList()
{
    $postManager = new \Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    require('public/view/frontend/postList.php');
}

function postAdmin()
    {
    require('public/view/Backend/postAdmin.php');
    }

function addPosts()
{
    //$categManager = new \Blog\Model\CategManager();
    //$categs= $categManager->getCateg();

    require('public/view/backend/addpost.php');
}

function setPost()
{
    $title = htmlspecialchars($_POST['title']);
    $author = $_SESSION['AUTHOR'];
    $text = htmlspecialchars($_POST['text']);
    if($_POST['category'] == "html")
        {$cat=1;}
    elseif($_POST['category'] == "css")
        {$cat=2;}
    else{$cat=3;}
    
    if($_POST['status'] == "publish")
        {$status=1;}
    else{$status=0;}

    $postManager = new \Blog\Model\PostManager();

    $affectedLines = $postManager->setPost($title, $author, $text, $cat, $status);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=postList');
    }
}

function cancelPost()
{
    
    require('public/view/frontend/postList.php');
}

function cancel()
{
    echo('cancel');
    die;
}


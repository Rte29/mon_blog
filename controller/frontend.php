<?php
session_start();

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/User.php');

function listPosts()
{
    $postManager = new \Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    
    require('public/view/frontend/listPostView.php');
}

function post()
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    
    require('public/view/frontend/postView.php');
}

function addComment($postId, $comment)
{
    $commentManager = new \Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function connect()
{
    require('public/view/frontend/subscribe.php');
}

function addUser()
{
$name =strtoupper($_POST['name']);
$firstName =strtoupper($_POST['firstName']);
$birth =$_POST['birthday'];
$email =$_POST['email'];
$pseudo =$_POST['pseudo'];
$pwd =$_POST['pwd'];
$newPwd =$_POST['newPwd'];
$message="";


            if(empty($name)) {$message="<li>Nom invalide</li>";}
            if(empty($firstName)) {$message="<li>Prénom invalide</li>";}
            if(empty($birth)) {$message="<li>Date de naissance invalide</li>";}
            if(empty($email)) {$message="<li>Email invalide</li>";}
            if(empty($pseudo)) {$message="<li>Pseudo invalide</li>";}
            if(empty($pwd)) {$message="<li>Mot de passe invalide</li>";}
            if(empty($newPwd)) {$message="<li>Mot de passe invalide</li>";}
            if($pwd!=$newPwd) {$message="<li>Mots de passe non identiques</li>";}

            $addUser = new \Blog\Model\Subscribe();

            if(empty($message)){
                
            $newUser = $addUser->checkUserLogin($pseudo);
                   
                if(empty($tab)) 
                {   
                    $newUser = $addUser->setUser($name, $firstName, $birth, $email, $pseudo, $pwd);
                }
                else
                {
                    echo('Ce Pseudo existe déjà');
                }
            }
            else 
            {
                echo($message);
                die;
            }

        require('public/view/frontend/subscribe.php');
    }


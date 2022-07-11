<?php
session_start();

// Class loading
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/UserManager.php';
require_once 'model/LoginManager.php';

// Loading 3 last post on index page
function listPosts()
{
    $postManager = new \Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    
    require 'public/view/frontend/listPostView.php';
}

function readAll()
{
    $postManager = new \Blog\Model\PostManager();
    $posts = $postManager->getAllPosts();

    if(isset($_GET['id']))
    {
    require 'public/view/frontend/postList.php';
    }
    else
    {
    require 'public/view/backend/postList.php';
    }
}


function post()
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $post = $postManager->getPost(htmlspecialchars($_GET['id']));
    $comments = $commentManager->getComments(htmlspecialchars($_GET['id']));

    require 'public/view/frontend/postView.php';
}

function readallComment()
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $post = $postManager->getPost(htmlspecialchars($_GET['id']));
    $comments = $commentManager->readAllComment(htmlspecialchars($_GET['id']));
        
    require 'public/view/frontend/postView.php';
}

function addComment($postId, $comment)
{
    $commentManager = new \Blog\Model\CommentManager();

    $affectedLines = $commentManager->setComment($postId, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=postList&id=1');
    }
}

function subscribe()
{
    require 'public/view/frontend/subscribe.php';
}

function connect()
{
    require 'public/view/frontend/connect.php';
}

function addUser()
{
$name =strtoupper(htmlspecialchars($_POST['name']));
$firstName =strtoupper(htmlspecialchars($_POST['firstName']));
$birth =htmlspecialchars($_POST['birthday']);
$email =htmlspecialchars($_POST['email']);
$pseudo =htmlspecialchars($_POST['pseudo']);
$pwd =htmlspecialchars($_POST['pwd']);
$newPwd =htmlspecialchars($_POST['newPwd']);
$message="";

    if($pwd!=$newPwd) {$message="<li>Mots de passe non identiques</li>";}
      
$addUser = new \Blog\Model\Subscribe();

if(empty($message))
    {
        $user = $addUser->checkUserLogin($pseudo);
                
            if($user==false) 
            {   
                $newUser = $addUser->setUser($name, $firstName, $birth, $email, $pseudo, $pwd);
            
                require 'public/view/frontend/connect.php';
            }
            else
            {
                echo('Ce Pseudo existe déjà');
                exit;
            }
    }
    else 
    {
        print_r($message);
        die;
    }

    require 'public/view/frontend/subscribe.php';
}

function checkLogin()
{
$pseudo =htmlspecialchars($_POST['pseudo']);
$pwd=htmlspecialchars($_POST['pwd']);

    if(isset($pseudo) || isset($pwd))
    {
        $login = new \Blog\Model\LoginManager();
        $log = $login->login($pseudo, $pwd);
        
        if($log==false)
        {            
            echo('Les informations saisie ne permettent pas d\'identifier : ' . $pseudo );
        }
        else
        {
            $_SESSION['AUTHOR'] = $log['id'];
            $_SESSION['ADMIN'] = $log['admin_role'];
            $_SESSION['PSEUDO'] = $log['username'];
            $_SESSION['EMAIL'] = $log['email'];
            listPosts();
            
        }
    }
    else
    {
        throw new Exception('Vous devez renseigner tous les champs !');     
    }
}

function disconnect()
{
    session_destroy();
    header('Location: index.php?action=listPosts');
}

function mailContact()
{
$to = "er.gouez@gmail.com";
$subject = "Message d'un utilisateur de Mon blog";
$nom = htmlspecialchars($_POST['name']);
$prenom = htmlspecialchars($_POST['firstName']);
$msg = htmlspecialchars($_POST['message']);
$from = htmlspecialchars($_POST['email']);

$message = 'Nom : ' . $nom . "\r\n" . 'Prénom : ' . $prenom . "\r\n" . 'email : ' . $from . "\r\n" . 'Message :  ' . "\r\n" . $msg ;

$headers = "Content-Type: text/plain; charset=utf-8\r\n";
$headers .="From: " . $from . "<br>";

if (mail($to, $subject, $message, $headers))
    {
        header('Location: index.php?action=listPosts&id=1');}
    else
    {
        echo 'erreur envoi';
        die;
    }
}
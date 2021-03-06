<?php

// Chargement des classes
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/UserManager.php';
require_once 'model/LoginManager.php';

function admin()
{
    require 'public/view/backend/admin.php';
}

function postList()
{
    $postManager = new \Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    require 'public/view/frontend/postList.php';
}

function postAdmin()
{
    require 'public/view/Backend/postAdmin.php';
}

function addPosts()
{
    require 'public/view/backend/addpost.php';
}

function setPost()
{ 
$title = htmlspecialchars($_POST['title']);
$author = $_SESSION['AUTHOR'];
$chapo = htmlspecialchars($_POST['chapo']);
$text = htmlspecialchars($_POST['text']);
$category = htmlspecialchars($_POST['category']);
$status = htmlspecialchars($_POST['status']);

    if($category == "html")
        {$cat=1;}
    elseif($category == "css")
        {$cat=2;}
    else{$cat=3;}
    
    if($status == "publish")
        {$status=1;}
    else{$status=0;}

    $postManager = new \Blog\Model\PostManager();

    $affectedLines = $postManager->setPost($title, $author, $chapo, $text, $cat, $status);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=postList');
    }
}

function cancel()
{
    $postId = htmlspecialchars($_GET['id']);

    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $comments = $commentManager->getAllComments($postId);
    $comment = $comments->fetch();


    if(empty($comment['comment_id']))
    {
        $delete = $postManager->deletePost($postId);
        header('Location: index.php?action=cancelPost');
    }
    else{

        $deleteComments = $commentManager->deleteAllComments($postId);
        $delete = $postManager->deletePost($postId);
        header('Location: index.php?action=postList');
    }
}

function uptPt()
{
    $post = new \Blog\Model\PostManager();
    $posts = $post->getAllPosts();

    require 'public/view/backend/postListForUpdate.php';
}

function uptPtView()
{
    $postId = htmlspecialchars($_GET['id']);

    $postManager = new \Blog\Model\PostManager();
    $post = $postManager->getPost($postId);

    require 'public/view/backend/uptPostView.php';

}


function uptPosts()
{
    $postTitle = htmlspecialchars($_POST['title']);
    $chapo = htmlspecialchars($_POST['chapo']);
    $postContent = htmlspecialchars($_POST['text']); 
    $postId = htmlspecialchars($_POST['id']);
    $status = htmlspecialchars($_POST['status']);

    if($status == "publish"){
        $status=1;
    }else{$status=0;}

    $postManager = new \Blog\Model\PostManager();
    $updatePost = $postManager->updatePost($postTitle, $chapo, $postContent, $postId ,$status);
    
    header('Location: index.php?action=uptPost');
}

function commentAdmin()
{
    require 'public/view/backend/commentAdmin.php';
}

function commentValidation()
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $posts = $postManager->getAllPosts();
       
    require 'public/view/backend/commentValidation.php';
}

function validateComments()
{
    $commentManager = new \Blog\Model\CommentManager();
    $val = $commentManager->validateComment(htmlspecialchars($_GET['id']));

    header('Location: index.php?action=commentValidation');
}

function cancelComments()
{
    $commentManager = new \Blog\Model\CommentManager();
    $cnl = $commentManager->cancelComment(htmlspecialchars($_GET['id']));

    header('Location: index.php?action=commentValidation');
}

function cancelComments2()
{
    $commentManager = new \Blog\Model\CommentManager();
    $cnl = $commentManager->cancelComment(htmlspecialchars($_GET['id']));

    header('Location: index.php?action=comments');
}

function comments()
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $posts = $postManager->getAllPosts();
       
    require 'public/view/backend/comments.php';
}

function accountAdmin()
{
    require 'public/view/backend/accountAdmin.php';
}

function lastAccount()
{
    require 'public/view/backend/lastAccount.php';
}

function searchAccount()
{
    $start = htmlspecialchars($_POST['start']);
    $end = htmlspecialchars($_POST['end']);

    $user = new \Blog\Model\Subscribe();
        
    $accounts = $user->getUsers($start, $end);

    require 'public/view/backend/account.php';
}

function allAccount()
{
    $user = new \Blog\Model\Subscribe();
        
    $accounts = $user->getAllUsers();

    require 'public/view/backend/allAccount.php';
}

function editUser()
{
    $userId = htmlspecialchars($_GET['id']);

    $user = new \Blog\Model\Subscribe();
    $editUser = $user->getUser($userId);

require 'public/view/backend/editAccount.php';
}

function editUserAll()
{
    $userId = $_GET['id'];

    $user = new \Blog\Model\Subscribe();
    $editUserAll = $user->getUser($userId);

require 'public/view/backend/editAccountAll.php';
}

function deleteUser()
{
    $userId = htmlspecialchars($_GET['id']);

    $userManager = new \Blog\Model\Subscribe();
    $commentManager = new \Blog\Model\CommentManager();

    $comments = $commentManager->getAllUserComments($userId);
    $comment = $comments->fetch();


    if(empty($comment['comment_id']))
    {
        $delete = $userManager->deleteUser($userId);
        header('Location: index.php?action=allAccount');
    }
    else{

        $deleteComments = $commentManager->deleteAllUserComments($userId);
        $delete = $userManager->deleteUser($userId);
        header('Location: index.php?action=allAccount');
    }
}
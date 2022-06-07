<?php
//session_start();

function admin()
{
    require('public/view/backend/admin.php');
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

function cancel()
{
    $postId = $_GET['id'];

    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $comments = $commentManager->getAllComments($postId);
    $comment = $comments->fetch();


    if(empty($comment['comment_id']))
    {
        $delete = $postManager->deletePost($postId);
        header('Location: index.php?action=postList');
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

    require('public/view/backend/postListForUpdate.php');
}

function uptPtView()
{
    $postId = $_GET['id'];

    $postManager = new \Blog\Model\PostManager();
    $post = $postManager->getPost($postId);

    require('public/view/backend/uptPostView.php');

}


function uptPosts()
{
    $postTitle = $_POST['title'];
    $postContent = $_POST['text']; 
    $postId = $_POST['id'];

    echo($postTitle);
    echo($postContent);
    echo ($postId);

    $postManager = new \Blog\Model\PostManager();
    $updatePost = $postManager->updatePost($postTitle, $postContent, $postId);
    
    header('Location: index.php?action=uptPost');
}

function commentAdmin()
{
    require('public/view/backend/commentAdmin.php');
}

function commentValidation()
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $posts = $postManager->getAllPosts();
       
    require('public/view/backend/commentValidation.php');
}

function validateComments()
{
    $commentManager = new \Blog\Model\CommentManager();
    $val = $commentManager->validateComment($_GET['id']);

    header('Location: index.php?action=commentValidation');
}

function cancelComments()
{
    $commentManager = new \Blog\Model\CommentManager();
    $cnl = $commentManager->cancelComment($_GET['id']);

    header('Location: index.php?action=commentValidation');
}
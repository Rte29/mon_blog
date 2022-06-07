<?php
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        if ($_GET['action'] == 'readAll') {
            readAll();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'subscribe') {
            subscribe();
        }   
        elseif ($_GET['action'] == 'connect') {
            connect();
        }   
        elseif ($_GET['action'] == 'addUser') {
            addUser();
        }
        elseif ($_GET['action'] == 'checkLogin') {
            checkLogin();
        }
        elseif ($_GET['action'] == 'disconnect') {
            disconnect();
        } 
        elseif ($_GET['action'] == 'admin') {
            admin();
        } 
        elseif ($_GET['action'] == 'postList') {
            postList();
        } 
        elseif ($_GET['action'] == 'postAdmin') {
            postAdmin();
        } 
        elseif ($_GET['action'] == 'addPost') {
           addPosts();
        } 
        elseif ($_GET['action'] == 'setPost') {
            setPost();
         } 
        elseif ($_GET['action'] == 'cancelPost') {
            readAll();
         } 
         elseif ($_GET['action'] == 'cancel') {
            cancel();
         } 
         elseif ($_GET['action'] == 'uptPost') {
            uptPt();
         } 
         elseif ($_GET['action'] == 'uptPosts') {
            uptPosts();
         } 
         elseif ($_GET['action'] == 'uptPostView') {
            uptPtView();
         }
         elseif ($_GET['action'] == 'commentAdmin') {
            commentAdmin();
         }
         elseif ($_GET['action'] == 'readAllComment') {
            readAllComment();
         } 
         elseif ($_GET['action'] == 'commentValidation') {
            commentValidation();
         } 
         elseif ($_GET['action'] == 'validateComment') {
           validateComments();
         }
         elseif ($_GET['action'] == 'cancelComment') {
            cancelComments();
          }
        }       
    
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
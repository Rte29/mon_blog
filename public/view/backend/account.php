<?php
setcookie('start', $_POST['start']);
setcookie('end', $_POST['end']); 
if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){
    
include('./public/view/frontend/navigation.php');

?>

<body>
    <div class="container">
        <section class="row">
            <h1>Les derniers enregistrements</h1><br/>
            <p><a href="index.php?action=lastAccount">Retour ...</a></p>
                
            <div class="row">
                <div class="pb-3">
                    <?php ob_start(); ?>
                            <?php
                                while ($account = $accounts->fetch())
                                {
                            ?>
                                <div class="news">
                                    <div class="col-sm-12 pb-4">
                                        <h4><?= htmlspecialchars($account['last_name'] . ' ' . $account['first_name']) ?></h4>
                                        <h5>pseudo: <?= htmlspecialchars($account['username']) ?></h5>
                                        <em>inscrit le <?= htmlspecialchars($account['user_registration_date_fr']) ?></em></br>
                                        <em><a href="index.php?action=deleteUser&amp;id=<?= $account['id'] ?>" class="btn btn-success" onclick="return confirm('Vous êtes sur le point de supprimer un compte ainsi que tous les commentaires déposés par l\'utilisateur. Cette action sera définitive. Confirmez votre choix')" >Supprimer</a></em>
                                        <em><a href="index.php?action=editUser&amp;id=<?= $account['id'] ?>" class="btn btn-primary" >Editer</a></em>
                                    </div>
                                </div>
                            <?php
                                }
                                $accounts->closeCursor();
                                $content = ob_get_clean(); 
                            require('./public/view/frontend/template.php'); 
                            ?>
                </div>
            </div>
        </section>
    </div>
</body>

<?php 
include('./public/view/frontend/footer.php');

var_dump($_COOKIE);
}
else{
    header('Location: index.php?action=listPosts');
}
?>
<?php 
if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){
    
include('./public/view/frontend/navigation.php'); 
?>
<div class="container">
    <section>
        <p><a href="index.php?action=allAccount">Retour ...</a></p><br/>
        <div class="rows">
            <div class="col-lg-8 col-lg-offset-2">
                <h1>Pseudo : <?= htmlspecialchars($editUser['username']) ?></h1>
                <h3><?php echo(htmlspecialchars($editUser['last_name']) . ' ' . htmlspecialchars($editUser['first_name'])) ?></h3>
                <h6><em>enregistré le <?= $editUser['user_registration_date_fr'] ?> et modifié le <?= $editUser['user_update_date_fr'] ?></em></h6><br>
                <h6>date de naissance: </h6>
                <p><?= nl2br(htmlspecialchars($editUser['birthday_fr'])) ?></p><br>
                <h6>email : </h6>
                <p><?= nl2br(htmlspecialchars($editUser['email'])) ?></p><br>
                <p><?php 
                    if($editUser['admin_role'] ==1)
                    {
                        ?>
                        <h4><em>ADMINISTRATEUR</em></h4><br>
                        <?php
                    } 
                    else
                    {
                        ?>
                        <h3>Utilisateur</h3><br>
                        <?php
                    }
                    ?>
                </p>
                <em><a href="index.php?action=deleteUser" class="btn btn-success" 
                onclick="return confirm('Vous êtes sur le point de supprimer un compte ainsi que tous les commentaires déposés par l\'utilisateur. Cette action sera définitive. Confirmez votre choix')">
                Supprimer</a></em>
            </div>
        </div>
    </section>
</div>
<?php 
include('./public/view/frontend/footer.php'); 
}
else{
    header('Location: index.php?action=listPosts');
}
?>
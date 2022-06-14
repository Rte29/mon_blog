<?php include('./public/view/frontend/navigation.php'); ?>
<div class="container">
    <section>
        <div class="rows">
            <div class="col-lg-8 col-lg-offset-2">

                <h1><?php echo(htmlspecialchars($editUser['last_name']) . ' ' . htmlspecialchars($editUser['first_name'])) ?></h1>

                    <h3>Pseudo : <?= htmlspecialchars($editUser['username']) ?></h3>
                    <h3><em>enregistré le <?= $editUser['user_registration_date_fr'] ?> et modifié le <?= $editUser['user_update_date_fr'] ?></em></em>
                    </h3><br/>
                    
                    <h4>date de naissance: <?= nl2br(htmlspecialchars($editUser['birthday_fr'])) ?></h4>
                    <h4>email : <?= nl2br(htmlspecialchars($editUser['email'])) ?></h4>
                    <p><?php 
                        if($editUser['admin_role'] ==1)
                        {
                            ?>
                            <h4>ADMINISTRATEUR</h4>
                            <?php
                        } 
                        else
                        {
                            ?>
                            <h3>Utilisateur</h3>
                            <?php
                        }
                        ?>
                    </p>
                    <em><a href="index.php?action=deleteUser" class="btn btn-success" 
                    onclick="return confirm('Vous êtes sur le point de supprimer un compte ainsi que tous les commentaires déposés par l\'utilisateur. Cette action sera définitive. Confirmez votre choix')">
                    Supprimer</a></em>
                    <div class="rows">
                        <div class="col-lg-4 col-lg-offset-2">
                            <p><a href="index.php?action=lastAccount">Retour ...</a></p>
                        </div>
                    </div>
            </div>
        </div>
</div>

    </section>
<?php include('./public/view/frontend/footer.php'); ?>
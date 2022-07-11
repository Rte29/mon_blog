<?php $title = 'Mon blog';
include('navigation.php');
if (isset($_GET['id'])){
    ?>
        <div class="container">
            <section>
            <div class="alert alert-success" role="alert">
                <h3>Votre message a bien été envoyé.<br> Je vous répondrai dans les plus brefs delais.</h3>
            </div>
</section>
        </div>
    <?php 
    } 
include('hero.php');

?>
<!-- 3 Last Post Section on home page-->
<body>
<div class="container">
    <h1>Les derniers billets !</h1>    
    <section class="row">
            <div class="card mb-4 mb-lg-0 border-primary shadow">
                <div clas="card-body">
                    <?php ob_start(); ?>
                    <?php
                        while ($data = $posts->fetch())
                        {
                    ?>
                        <div class="col-md-4">
                            <h3 class="card-title ">
                                <?= htmlspecialchars($data['title']) ?>
                                <em>le <?= $data['post_creation_date_fr'] ?></em>
                            </h3>
                            <div class="d-flex">    
                            <p class="card-text overflow-hidden">
                                <?= nl2br(htmlspecialchars($data['chapo'])) ?>
                                <br />
                                <em><a href="index.php?action=post&amp;id=<?= $data['post_id'] ?>">Lire la suite</a></em>
                            </p>
                        </div>
                        </div>
                    <?php
                        }
                        $posts->closeCursor();
                        $content = ob_get_clean(); 
                    require('template.php'); ?>
                </div>              
            </div>
        </div>              
                    </section>
</div>
                    </body>
<?php include('about.php'); ?>
<?php include('contact.php'); ?>
<?php include('footer.php'); ?>
<?php 

include('navigation.php');
?>
<body>
    <section id="contact">
        <?php
        if(isset($_GET['id']))
        {
        ?>
        <div class="alert alert-success" role="alert" >
            <h4>Votre commentaire sera pris en compte après validation</h4>
        </div>
        <?php ;
        }
        ?>
        <div class="container">
            <div class="row">
            <?php ob_start(); ?>
            <section>
            <h1>Les derniers billets !</h1>
            <p><a href="index.php?action=listPosts">Retour ...</a></p><br/>

            <?php
            while ($data = $posts->fetch())
            {
            ?>
                <div class="row">
                    <h5>
                        <?= htmlspecialchars($data['title']) ?>
                        <em>le <?= $data['post_creation_date_fr'] ?></em>
                    </h5>
                    
                    <p>
                        <?= nl2br(htmlspecialchars($data['post_content'])) ?>
                        <br />
                        <em><a href="index.php?action=post&amp;id=<?= $data['post_id'] ?>">Editer</a></em>
                    </p>
                </div>
            <?php
            }
            $posts->closeCursor();
            $content = ob_get_clean(); 
            ?>
            <?php require('template.php'); ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 text-center">
                        <p><a href="index.php?action=readAll&id=frontend">tout lire ...</a></p>
                    </div>
                </div>  
            </div>
        </div>
    </section>
</body>
<?php include('footer.php'); ?>
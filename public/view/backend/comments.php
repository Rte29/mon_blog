<?php 
include('./public/view/frontend/navigation.php');
?>
    <?php ob_start(); ?>
        <section>
            <h1>Tous les commentaires</h1>
    <?php
        while ($data = $posts->fetch())
        {
    ?>
            <div class="news">
                <h3><?= htmlspecialchars($data['title']) ?></h3>
                <?php
                    $comments = $commentManager->readAllComment($data['post_id']);
                    while ($comment = $comments->fetch())
                    {
                        
                ?>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p>le <?= $comment['comment_creation_date_fr'] ?> par <em><?php echo $comment['username'] ?></em></p>
                            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                            <em><a href="index.php?action=cancelComment2&amp;id=<?= $comment['comment_id'] ?>">Supprimer</a></em>
                        </div>  
                    </div>
                <?php 
                    }
                ?>
            </div>
    <?php
        }
        $posts->closeCursor();
        $content = ob_get_clean(); 
        require('./public/view/frontend/template.php');
    ?>

        </section>
<?php include('./public/view/frontend/footer.php'); ?>

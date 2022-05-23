<?php include('navigation.php'); ?>
<button class="btn btn-success btn-lg" type="submit" action="index.php?action=connect" name="J'ai déjà un compte">
<?php ob_start(); ?>
<h1><?php echo($post['title']) ?></h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
    
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['post_creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['post_content'])) ?>
    </p>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <h2>Commentaires</h2>

            <form action="index.php?action=addComment&amp;id=<?= $post['post_id'] ?>" method="post">
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <br/>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
            </div>
    </div>  
</div>
<?php

while ($comment = $comments->fetch())
{
?>
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <p>le <?= $comment['comment_creation_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>
    </div>  
</div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php include('footer.php'); ?>

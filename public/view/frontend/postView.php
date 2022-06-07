<?php include('navigation.php'); ?>

<?php ob_start(); ?>
<section>
<h1><?php echo($post['title']) ?></h1>
<p><a href="index.php?action=postList">Retour à la liste des billets</a></p>

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
        <div class="col-lg-10 text-center">
            <h2>Commentaires</h2>
<?php if (isset($_SESSION['PSEUDO'])) :?>
            <form action="index.php?action=addComment&amp;id=<?= $post['post_id'] ?>" method="post">
                <div>
                    <input type="hidden" id="author" name="author" value="<?php echo($_SESSION['PSEUDO']) ?>"><br />
                </div>
                <div>
                    <label for="comment">Ajoutez un commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <br/>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
            
<?php else : ?>
    <i>'Pour écrire un commentaire, vous devez vous identifier'</i>
<?php endif; ?>
        </div>
    </div>  
</div>
<?php
while ($comment = $comments->fetch())
{
?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 text-center">
            <p>le <?= $comment['comment_creation_date_fr'] ?> par <em><?php echo $comment['username'] ?></em></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>
    </div>  
</div>
<?php 
}
?>

<?php $content = ob_get_clean();
require('template.php'); ?>
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-10 text-center">
            <p><a href="index.php?action=readAllComment&id=<?php echo($_GET['id']) ?>">lire tous les commentaires</a></p>
        </div>
    </div>  
</div>
<?php include('footer.php'); ?>

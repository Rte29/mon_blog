<?php 
if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){
     
include('navigation.php'); 

ob_start(); ?>
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
            <p>le <?= $comment['comment_creation_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>
    </div>  
</div>
<?php
}
?>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php include('footer.php'); 
}
else{
    header('Location: index.php?action=listPosts');
}
?>

<?php 
include('navigation.php');

?>

<?php ob_start(); ?>
<section>
<h1>Les derniers billets !</h1>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['post_creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['post_content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['post_id'] ?>">Commentaires</a></em>
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
</section>
<?php include('footer.php'); ?>
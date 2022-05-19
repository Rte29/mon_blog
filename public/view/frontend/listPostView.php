<?php $title = 'Mon blog';
include('navigation.php');
include('hero.php');
?>

<?php ob_start(); ?>

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
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php include('about.php'); ?>
<?php include('contact.php'); ?>
<?php include('footer.php'); ?>
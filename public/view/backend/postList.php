<?php 
if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){
    
include('./public/view/frontend/navigation.php');

ob_start(); ?>
<section>
<h1>Les billets !</h1>
<p><a href="index.php?action=postAdmin">Retour ...</a></p><br/>

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
            <em><a href="index.php?action=cancel&amp;id=<?php echo $data['post_id'] ?>" 
            onclick="return confirm('Vous êtes sur le point de supprimer un article ainsi que tous les commentaires y référent. Cette action sera définitive. Confirmez votre choix')">Supprimer</a></em>
            

        </p>
    </div>
<?php
    }
  $posts->closeCursor();
  $content = ob_get_clean(); 
require('./public/view/frontend/template.php'); ?>

</section>
</body>
<?php 
include('./public/view/frontend/footer.php'); 
}
else{
    header('Location: index.php?action=listPosts');
}
?>


<?php 
if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){
    
include('./public/view/frontend/navigation.php');
?>
<body>
    <div class="container">
<?php ob_start();?>

<section>
<h1>Les billets !</h1>
<p><a href="index.php?action=postAdmin">Retour ...</a></p><br/>
<?php
  while ($data = $posts->fetch())
    {
?>
    <div class="news">
        <h5>
            <?= htmlspecialchars($data['title']) ?> 
            <em>le <?= $data['post_creation_date_fr'] ?></em>
        </h5>
        
        <p>
            <?= nl2br(htmlspecialchars($data['chapo'])) ?>
            <br />
            <em><a href="index.php?action=uptPostView&amp;id=<?php echo $data['post_id'] ?>">Modifier</a></em>
            

        </p>
    </div>
<?php
    }
  $posts->closeCursor();
  $content = ob_get_clean(); 
require('./public/view/frontend/template.php');
?>
</section>
</div>
</body>
<?php include('./public/view/frontend/footer.php'); 
}
else{
    header('Location: index.php?action=listPosts');
}
?>
<?php 
if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){
  
include('./public/view/frontend/navigation.php');
?>
    <?php ob_start(); ?>
        <section>
            <h1>Tous les commentaires en attente !</h1>
            <p><a href="index.php?action=commentAdmin">Retour ...</a></p><br/>
    <?php
        while ($data = $posts->fetch())
        {
    ?>
            <div class="news">
                <h3><?= htmlspecialchars($data['title']) ?></h3>
                <?php
                    $comments = $commentManager->readCommentsToValidate($data['post_id']);
                    while ($comment = $comments->fetch())
                    {
                        
                ?>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p>le <?= $comment['comment_creation_date_fr'] ?> par <em><?php echo $comment['username'] ?></em></p>
                            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                            <em><a href="index.php?action=cancelComment&amp;id=<?= $comment['comment_id'] ?>">Supprimer</a></em>
                            <em><a href="index.php?action=validateComment&amp;id=<?= $comment['comment_id'] ?>">Valider</a></em>
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
<?php include('./public/view/frontend/footer.php');
}
else{
    header('Location: index.php?action=listPosts');
}
?>

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Validation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>La remarque est validée</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

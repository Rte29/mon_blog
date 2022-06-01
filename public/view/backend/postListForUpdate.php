<?php 
include('./public/view/frontend/navigation.php');

?>
<?php 
ob_start(); 
?>

<section>
<h1>Les billets !</h1>

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
            <em><a href="index.php?action=uptPostView&amp;id=<?php echo $data['post_id'] ?>">Modifier</a></em>
            

        </p>
    </div>
<?php
    }
  $posts->closeCursor();
  $content = ob_get_clean(); 
require('./public/view/frontend/template.php'); ?>

</section>
<?php include('./public/view/frontend/footer.php'); ?>
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="js/freelancer.min.js"></script>

</body>

</html>
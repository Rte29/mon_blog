<?php 
if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){

include('./public/view/frontend/navigation.php');
?>

<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Administration</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 portfolio-item">
                <a href="index.php?action=commentAdmin" class="portfolio-link">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="./public/img/portfolio/comments-resize.png" class="img-responsive" alt="">
                    <h3>Gestion des commentaires</h3>
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="index.php?action=accountAdmin" class="portfolio-link">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="./public/img/portfolio/client.png" class="img-responsive" alt="">
                    <h3>Gestion des comptes</h3>
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="index.php?action=postAdmin" class="portfolio-link">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="./public/img/portfolio/post-resize.png" class="img-responsive" alt="">
                    <h3>Gestion des post</h3>
                </a>
            </div>
            
        </div>
    </div>
</section>
<?php 

include('./public/view/frontend/footer.php');
}
else{
    header('Location: index.php?action=listPosts');
}
?>

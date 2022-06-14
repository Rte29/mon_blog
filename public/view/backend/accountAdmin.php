<?php 
include('./public/view/frontend/navigation.php');
?>


<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Gestion des Comptes</h2>
                <hr class="star-primary">
                
            </div>
            <p><a href="index.php?action=admin">Retour ...</a></p><br/>
        </div>
        <div class="row">
            <div class="col-sm-6 portfolio-item">
                <a href="index.php?action=lastAccount" class="portfolio-link">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="./public/img/portfolio/comments-resize.png" class="img-responsive" alt="">
                    <h4>Les derniers comptes enregistrés</h4>
                </a>
            </div>
            <div class="col-sm-6 portfolio-item">
                <a href="index.php?action=comments" class="portfolio-link">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="./public/img/portfolio/client.png" class="img-responsive" alt="">
                    <h4>Tous les comptes</h4>
                </a>
            </div>
    </div>
</section>   

<?php
include('./public/view/frontend/footer.php');
?>
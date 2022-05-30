<?php 
include('./public/view/frontend/navigation.php');
?>
<body>
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Gestion des Post</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 portfolio-item">
                <a href="index.php?action=addPost" class="portfolio-link">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="./public/img/portfolio/addPost.png" class="img-responsive" alt="">
                    <h3>Ajouter un post</h3>
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="index.php?action=updatePost" class="portfolio-link">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="./public/img/portfolio/modifPost.png" class="img-responsive" alt="">
                    <h3>Modifier un post</h3>
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="index.php?action=cancelPost" class="portfolio-link">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="./public/img/portfolio/cancelPost.png" class="img-responsive" alt="">
                    <h3>Supprimer un post</h3>
                </a>
            </div>
            
        </div>
    </div>
</section>   
</body>

<?php
include('./public/view/frontend/footer.php');
?>
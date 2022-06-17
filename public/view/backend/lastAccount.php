<?php 

if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){
    
include('./public/view/frontend/navigation.php');
?>

<body>

    <section id="accountFilter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>Affichage des nouveaux comptes</br> Quelle période souhaitez-vous visualiser ?</h4>
                    <hr class="star-primary">
                </div>
                <p><a href="index.php?action=accountAdmin">Retour ...</a></p>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="subscribe" id="searchAccount" action="index.php?action=searchAccount" method="post" >
                        <div class="form-group"> 
                                <div class="col-md-4">
                                    <label for="start">Date de début</label>
                                    <input type="date" class="form-control" placeholder="date de début" name="start" id="start" value="<?= isset($_COOKIE['start']) ? $_COOKIE['start'] : '';?> "required>
                                    <p class="help-block text-danger"></p>
                                </div>
                               
                                <div class="col-md-4">
                                    <label for="stop" >Date de fin</label>
                                    <input type="date" class="form-control" placeholder="date de fin" name="end" id="end" value="<?= isset($_COOKIE['end']) ? $_COOKIE['end'] : '';?> " required>
                                <p class="help-block text-danger"></p>
                                </div>
                            </div>
                       
                        <hr>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg" name="Chercher">Chercher</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    </body>
    <?php 

include('./public/view/frontend/footer.php');
var_dump($_COOKIE);
}
else{
    header('Location: index.php?action=listPosts');
}
?>
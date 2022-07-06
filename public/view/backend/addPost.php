<?php 
if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){

include('./public/view/frontend/navigation.php');
?>
<body>
<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Ajouter un post</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <p><a href="index.php?action=postAdmin">Retour ...</a></p><br/>
             <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    
                    <form name="addPost" id="addPost" action="index.php?action=setPost" method="post">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" name="title" id="title" required data-validation-required-message="Merci d'entrer le titre.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label for="chapo">Chapo</label>
                                <textarea id="chapo" name="chapo" rows="3" cols="100" required></textarea>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label for="text">Texte</label>
                                <textarea id="text" name="text" rows="5" cols="100" required></textarea>
                                
                            </div>
                        </div>
                                <br>
                                
                            <div class="option">
                                <label for="category">Quelle catégorie ?</label><br />
                                <select name="category" id="category" required>
                                    <option value="">--Choisissez une catégorie--</option>
                                        <option value="html">HTML</option>
                                        <option value="css">CSS</option>
                                        <option value="php">PHP</option>
                                </select>
                                
                            </div>
                            <br />
                            <div class="option">
                                <label for="status">Quel est le status</label><br />
                                <select name="status" id="status" required>
                                    <option value="">--Choisissez un status--</option>
                                        <option value="publish">Publier</option>
                                        <option value="standBy">Attente</option>
                                </select>
                            </div>

                            <div id="success"></div>
                            <br />
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
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
}
else{
    header('Location: index.php?action=listPosts');
}
?>
<?php
if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){
     
include('./public/view/frontend/navigation.php');
?>
<body>
<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Modifier un post</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <p><a href="index.php?action=uptPost">Retour ...</a></p><br/>
             <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    
                    <form name="uptPost" id="uptPost" action="index.php?action=uptPosts" method="post">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?php echo $post['title'] ?>" required data-validation-required-message="Please enter title.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="chapo">Chapo</label>
                                <textarea id="chapo" name="chapo" rows="4" cols="90"><?php echo $post['chapo'] ?></textarea>
                                
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="text">Texte</label>
                                <textarea id="text" name="text" rows="8" cols="90"><?php echo $post['post_content'] ?></textarea>
                                
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">                                
                                <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'] ?>">
                            </div>
                        </div>
                        <div class="option">
                                <label for="status">Quel est le status</label><br />
                                <select name="status" id="status" required>
                                    <option value="">--Choisissez un status--</option>
                                        <option value="publish">Publier</option>
                                        <option value="standBy">Attente</option>
                                </select>
                            </div>
                                <br>
                            <div id="success"></div>
                            <br />
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" class="btn btn-success btn-lg">Valider</button>
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
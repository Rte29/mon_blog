<?php include('navigation.php'); ?>
<!DOCTYPE html>
<html lang="en">
<body>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Inscription</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="subscribe" id="subscribe" action="index.php?action=addUser" method="post" >
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" required >
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="firsName" >Prénom</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="birthday">Date de naissance</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="pseudo">Pseudo</label>
                                <input type="text" class="form-control" name="pseudo" id="pseudo" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>mot de passe</label>
                                <input type="password" class="form-control" pattern=".{8,}" name="pwd" id="pwd" required title="8 characters minimum">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Vérification mot de passe</label>
                                <input type="password" class="form-control" name="newPwd" id="newPwd" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg" name="valider" value="S'authentifier">Valider</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    </body>
    </html>
    <?php include('footer.php'); ?>
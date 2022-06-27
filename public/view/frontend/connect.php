<?php 

include('navigation.php');
?>
<section id="contact">
<?php
if (isset($newUser))
{
?>
<div class="alert alert-success" role="alert">
<h3>inscription validée</h3>
</div>"
<?php ;
}
?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Identifiez-vous</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form action="index.php?action=checkLogin" method="post">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label for="pseudo">Pseudo</label>
                                <input type="text" class="form-control"  name="pseudo" placeholder="toto95" id="pseudo" required data-validation-required-message="Merci d'entrer votre pseudo.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label for="pwd">Mot de passe</label>
                                <input type="password" class="form-control" name="pwd" placeholder="********" id="pwd" required data-validation-required-message="Merci d'entrer votre mot de passe.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
<?php 
include('footer.php');
?>

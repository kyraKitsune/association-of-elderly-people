<?php
    include "../Includes/head.php";
    include "../Includes/header.php";
    include "../Config/config.php";
    if (!isConnect()){
        header('Location:../login.php');
        die;
    }
?>

<form action="action.php" method="post">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mt-3 mb-3">
                    <label for="nom" class="form-label col-3">Nom :</label>
                    <input type="text" class="form-control" name="nom" id="nom" minlength=3 maxlength=25 placeholder="Votre nom">
                </div>
            </div>
            <div class="col">
                <div class="mt-3 mb-3">
                    <label for="prenom" class="form-label col-3">Prénom :</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" minlength=3 maxlength=25 placeholder="Votre prénom">
                </div>
            </div>
            <div class="col">
                <div class="mt-3 mb-3">
                    <label for="mail" class="form-label col-3">Mail :</label>
                    <input type="mail" class="form-control" name="mail" id="mail" minlength=7 maxlength=25 placeholder="Votre mail">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mt-3 mb-3">
                    <label for="sujet" class="form-label col-3">Sujet :</label>
                    <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Votre sujet ici">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mt-3">
                    <label for="message" class="form-label col-3">Message :</label>
                    <textarea type="text" id="message" class="form-control" minlength=25 maxlength=2000 name="message" rows="10" placeholder="Veuillez saisir votre message ici"></textarea>
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Envoyer" name="btn_create">
        </div>
    </div>
</form>
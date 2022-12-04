<?php
    if(isset($_POST['btn_create'])){
        include 'Config/bdd.php';
        include 'Admin/Config/functions.php'; // Permet d'appeler la fonction cleanDirtyText
        $nom = cleanDirtyText($_POST['nom']);
        $prenom = cleanDirtyText($_POST['prenom']);
        $mail = cleanDirtyText($_POST['mail']);
        $sujet = cleanDirtyText($_POST['sujet']);
        $message = cleanDirtyText($_POST['message']);
        $sqlAddComm = "INSERT INTO contact (nom, prenom, mail, sujet, message) VALUES ('$nom', '$prenom', '$mail', '$sujet', '$message')";
        $addComm = $bdd->prepare($sqlAddComm);
        $addComm->execute();
        header('Location:index.php');
    }
?>
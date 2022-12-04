<?php
    // Supprimer une demande
    if (isset($_GET['id'])){
        include '../../Config/bdd.php';
        // Generation de la requete SQL pour supprimer
        $sql = "DELETE FROM contact WHERE id = " . $_GET['id'];
        // var_dump($sql);
        $req = $bdd->prepare($sql);
        if (!$req->execute()) {
            // erreur + gestion session
            header('Location:index.php');
            die;
        }
        // Gestion session pour la validation
        header('Location:index.php');
        die;
    }

    if(isset($_POST['btn_create'])){
        include '../../Config/bdd.php';
        include '..//Config/functions.php'; // Permet d'appeler la fonction cleanDirtyText
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
<?php
    include '../Config/bdd.php';
    include 'Config/config.php';

    if(isset($_POST['soumettre'])){
        $sql = "SELECT * FROM admin WHERE mail = :mail";
        $req = $bdd->prepare($sql);
        $data = [
            ':mail' => $_POST['mail']
        ];
        $req->execute($data);
        $user = $req->fetch(PDO::FETCH_ASSOC);
        var_dump($user);

        if(!$user){
            $_SESSION['connect'] = false;
            var_dump('nok');
            die;
        }

        if (!password_verify($_POST['mdp'], $user['mot_de_passe'])){
            $_SESSION['connect'] = false;
            var_dump(password_verify($_POST['mdp'], $user['mot_de_passe']));
            var_dump($_POST['mdp']);
            die;
        } 
        $_SESSION['connect'] = true;
        unset($user['mot_de_passe']);
        $_SESSION['prenom'] = $user;
        // Redirection
        header('Location:Formulaire/index.php');
        die;
    }

    if (isset($_GET['logout']) && $_GET['logout'] == true){
        session_destroy();
        header('Location:../index.php');
        die;
    }
?>
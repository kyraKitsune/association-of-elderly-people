<?php
    // Afficher le formulaire de modifications avec les informations pré remplit
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        if ($id > 0) {
            include '../../Config/bdd.php';
            $sql = 'SELECT * FROM contact WHERE id = :id';
            $req = $bdd->prepare($sql);
            $req->execute([':id' => $id]);
            if (!$req->rowCount() == 1){
                die('ERREUR Recherche du message');
            }
            $contact = $req->fetch(PDO::FETCH_ASSOC);
        } 
    }

    include "../Config/config.php";
    if (!isConnect()){
        header('Location:../login.php');
        die;
    }

    include "../Includes/head.php";
    include "../Includes/header.php";
?>

<body>
    <div class="container">
        <h1 class="text-center mt-4">Modifier un commentaire</h1>
        <form action="action.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="mt-3 mb-3">
                            <label for="nom" class="form-label col-3">Nom :</label>
                            <input type="text" class="form-control" name="nom" id="nom" minlength=3 maxlength=25 value="<?= $contact['nom'] ?>" placeholder="Votre nom">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mt-3 mb-3">
                            <label for="prenom" class="form-label col-3">Prénom :</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" minlength=3 maxlength=25 value="<?= $contact['prenom'] ?>" placeholder="Votre prénom">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mt-3 mb-3">
                            <label for="mail" class="form-label col-3">Mail :</label>
                            <input type="mail" class="form-control" name="mail" id="mail" minlength=7 maxlength=25 value="<?= $contact['mail'] ?>" placeholder="Votre mail">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mt-3 mb-3">
                            <label for="sujet" class="form-label col-3">Sujet :</label>
                            <input type="text" class="form-control" id="sujet" name="sujet" value="<?= $contact['sujet'] ?>" placeholder="Votre sujet ici">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mt-3">
                            <label for="message" class="form-label col-3">Message :</label>
                            <textarea type="text" id="message" class="form-control" minlength=25 maxlength=2000 name="message" rows="10"  placeholder="Veuillez saisir votre message ici"><?= $contact['message'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary mt-5" value="Envoyer" name="btn_update">
                </div>
            </div>
        </form>
    </div>
  </body>
</html>
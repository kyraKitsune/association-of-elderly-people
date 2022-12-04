<?php 
    include "../Config/config.php";
    if (!isConnect()){
        header('Location:../login.php');
        die;
    }
    include '../../Config/bdd.php';
    $sql = "SELECT * FROM contact";
    $req = $bdd->query($sql);
    $contacts = $req->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($contacts);



    include "../Includes/head.php";
    include "../Includes/header.php";
?>

    <body>
        <div class="container">
            <div class="text-center">
                <h1 class="mt-4 mb-4">Liste des messages</h1>
                <a href="create.php" class="btn btn-success">Créer un message test</a>
            </div>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Sujet</th>
                        <th scope="col">Message</th>
                    </tr>
                    
                </thead>
                <tbody>

                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <th scope="row"><?= $contact['id'];  ?></th>
                            <td><?= $contact['nom'];  ?></td>
                            <td><?= $contact['prenom'];  ?></td>
                            <td><?= $contact['mail'];  ?></td>
                            <td><?= $contact['sujet'];  ?></td>
                            <td><?= $contact['message'];  ?></td>
                            <td><a href="update.php?id=<?= $contact['id'] ?>" class="btn btn-warning">Modifier</a></td>
                            <td><a href="action.php?id=<?= $contact['id'] ?>" class="btn btn-danger">Supprimer</a></td>
                            <td><a href="single.php?id=<?= $contact['id'] ?>" class="btn btn-info">Voir</a></td>
                        </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </body>
</html>
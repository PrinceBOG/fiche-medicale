<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<style>
    .container {
        width: 80%;
    }
</style>

<body>
    <div class="container p-5">
        <div class="row">
            <div class="card">
                <div class="card-header">Formulaire d'inscription</div>
                <div class="card-body">
                    <div class="col-md-3">
                        <form method="post" autocomplete="off">
                            <div class="mb-3">
                                <label for="name">Nom d'utilisateur</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <button class="btn btn-success" type="submit" name="valid_ins">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php

require('commande.php');

//echo 'val: ' . $_POST['name'] . "<br>";

/*$mp = htmlspecialchars($_POST['name']);

echo $mp;*/

if (isset($_POST['valid_ins'])) {
    if (isset($_POST['name']) and isset($_POST['password'])) {
        $username = htmlspecialchars(strip_tags($_POST['name']));
        $password = sha1($_POST['password']);
    }
    if (require('connexion_db.php')) {

        $req = $access->prepare("SELECT* FROM connexion where username=? and mot_de_passe=?");
        $req->execute(array($username, $password));
        if ($req->rowCount() == 1) {
            echo 'Il existe un utilisateur utilisant ces informations, veuillez directement vous connecter ou redéfinissez les valeurs saisies ';
            $req->closeCursor();
        } else {
            $req = $access->prepare("INSERT INTO connexion(username,mot_de_passe,statut) values(?,?,?)");

            $statut = "user";

            $req->execute(array($username, $password, $statut));

            echo 'Vous êtes bien inscrit en tant ' . $username;

            $req->closeCursor();

            header('Location: login.php');
        }
    }
}
?>
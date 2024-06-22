<?php

session_start();

require('commande.php');

if (isset($_POST['valid_log'])) {

    if (isset($_POST['username']) and isset($_POST['mail']) and isset($_POST['password'])) {
        $username = htmlspecialchars(strip_tags($_POST['username']));
        $mail = htmlspecialchars(strip_tags($_POST['mail']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        //}
    }
}
//$statut = 'user';
if (require('connexion_db.php')) {
    $req = $access->prepare("SELECT * FROM connexion where username=? and mot_de_passe=?");
    $req->execute(array($username, $password));

    if ($req->rowCount() > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['id'] = $req->fetch()['id'];
        echo $_SESSION['username'];
        header('Location: dossiers-medical.php');
        exit;
    } else {
        header('Location: login1.php');
    }
    $req->closeCursor();
}



/*if ($user) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("Location: dossiers-medical.php");
    exit;
} else {
    echo "Problème de connexion, veuillez vérifier que les informations entrées sont correctes";
}*/


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                <div class="card-header">Connectez-vous</div>
                <div class="card-body">
                    <div class="col-md-3">
                        <form method="post">
                            <div class="mb-3">
                                <label for="username">Nom d'utilisateur</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">Adresse mail</label>
                                <input type="email" name="mail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button class="btn btn-success" type="submit" name="valid_log">Valider</button>
                        </form>
                    </div>
                    <a href="inscription.php">Créer un compte</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
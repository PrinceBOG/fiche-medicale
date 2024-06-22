<?php
session_start();

//require('commande.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valid_log'])) {

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['statut'])) {
        $username = htmlspecialchars(strip_tags($_POST['username']));
        $password = sha1($_POST['password']);
        $statut = htmlspecialchars(strip_tags($_POST['statut']));

        if (require('connexion_db.php')) {
            $req = $access->prepare("SELECT * FROM connexion where username=? and mot_de_passe=? and statut=?");
            $req->execute(array($username, $password, $statut));

            //$req->closeCursor();

            if ($req->rowCount() > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['statut'] = $statut;
                //$_SESSION['id'] = $req->fetch()['id'];
                /*echo 'us: ' . $_SESSION['username'] . "<br>";
                echo 'pswd: ' . $_SESSION['password'];*/
                $resultat = $req->fetchAll(PDO::FETCH_OBJ);
                foreach ($resultat as $res) {
                    $stat = $res->statut;
                }
                $reqdesc = $access->prepare("SELECT * FROM desc_stu where username=? and mot_de_passe=?");
                $reqdesc->execute(array($username, $password));
                if ($reqdesc->rowCount() >= 1) {
                    header('Location: dossiers-medical.php');
                    exit;
                } else if ($reqdesc->rowCount() <= 0) {
                    if ($stat == 'user') {
                        header('Location: ajouter-medical.php');
                        //$stu = $stat;
                        exit;
                    } else if ($stat == 'admin') {
                        header('Location:  admin-medical.php');
                        //$stu = $stat;
                    }
                }
            } else {

                //echo "<script>document.getElementById('errorModal').style.display = 'block';</script>";
                //header('Location: login.php');

                echo "Nom d'utilisateur,mot de passe ou statut incorrect";

                exit;
            }
            //$req->closeCursor();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Island+Moments&family=Kaushan+Script&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: 'Poppins';
    }
</style>

<body>
    <div class="container p-5">
        <div class="row">
            <div class="card">
                <div class="card-header">Log in</div>
                <div class="card-body">
                    <div class="col-md-3">
                        <form method="post">
                            <div class="mb-3">
                                <label for="username">Nom d'utilisateur</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail4" class="form-label">Statut</label>
                                <select id="choix" class="js-example-basic-single select2" data-dropdown-parent="#add-module" name="statut">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <button class="btn btn-success" type="submit" name="valid_log">Valider</button>
                        </form>
                    </div>
                    <a href="inscription.php">Créer un compte</a>
                </div>
            </div>
        </div>
    </div>

    <div id="errorModal" tabindex="-1" class="modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informations non valides</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Identifiant ou mot de passe incorrect.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeButton">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Récupérer le modal
        var modal = document.getElementById('errorModal');

        // Récupérer le bouton de fermeture du modal
        var span = document.getElementsByClassName("close")[0];

        // Quand l'utilisateur clique sur le bouton de fermeture, fermez le modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        document.getElementById('closeButton').addEventListener('click', function() {
            closeModal();
        });

        // Fonction pour fermer le modal
        function closeModal() {
            document.getElementById('errorModal').style.display = 'none';
        }

        // Fermez le modal si l'utilisateur clique en dehors du modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
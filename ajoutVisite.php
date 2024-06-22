<?php

session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Ajout de visites</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        tr,
        th,
        td {
            border: 1px solid #212529 !important;
        }
    </style>
</head>

<body>
    <div class="container p-5">
        <form class="row g-3" method="post">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Etabilssement</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="etab">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Date d'entrée</label>
                <input type="date" class="form-control" id="inputEmail4" name="datEnter">
            </div>
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Heure</label>
                <input type="time" class="form-control" id="inputPassword4" name="heurEnter">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Date de Sortie</label>
                <input type="date" class="form-control" id="inputPassword4" name="datSortie">
            </div>
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Heure</label>
                <input type="time" class="form-control" id="inputPassword4" name="heurSortie">
            </div>
            <div class="col-8">
                <label for="inputAddress2" class="form-label">Médécin</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="" name="medecin_vis">
            </div>
            <div class="col-md-4">
                <label for="inputCity" class="form-label">Etat de santé</label>
                <input type="text" class="form-control" id="inputCity" name="etat_sante">
            </div>
            <button type="submit" name="submit2" class="btn btn-primary btn-sm">Soumettre</button>
        </form>

    </div>

</body>

</html>

<?php

require('commande.php');

if (isset($_POST['submit2'])) {
    if (isset($_POST['etab']) and isset($_POST['datEnter']) and isset($_POST['heurEnter']) and isset($_POST['datSortie']) and isset($_POST['heurSortie']) and isset($_POST['medecin_vis']) and isset($_POST['etat_sante'])) {
        $etab = htmlspecialchars(strip_tags($_POST['etab']));
        $datEnter = htmlspecialchars(strip_tags($_POST['datEnter']));
        $heurEnter = htmlspecialchars(strip_tags($_POST['heurEnter']));
        $datSortie = htmlspecialchars(strip_tags($_POST['datSortie']));
        $heurSortie = htmlspecialchars(strip_tags($_POST['heurSortie']));
        $medecin_vis = htmlspecialchars(strip_tags($_POST['medecin_vis']));
        $etat_sante = htmlspecialchars(strip_tags($_POST['etat_sante']));
    }

    try {
        ajouter_vis($etab, $datEnter, $heurEnter, $datSortie, $heurSortie, $medecin_vis, $etat_sante, $username, $password);
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}


?>
<?php

session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];

$name = strtolower($_POST['nom']);
$prenom = strtolower($_POST['prenom']);
$name = htmlspecialchars(strip_tags($name));
$prenom = htmlspecialchars(strip_tags($prenom));
$sexe = htmlspecialchars(strip_tags($_POST['sexe']));
$age = htmlspecialchars(strip_tags($_POST['age']));
$birth = htmlspecialchars(strip_tags($_POST['birth']));
$fil = htmlspecialchars(strip_tags($_POST['fil']));
$pere = htmlspecialchars(strip_tags($_POST['pere']));
$mere = htmlspecialchars(strip_tags($_POST['mere']));
$gs = htmlspecialchars(strip_tags($_POST['gs']));
$tal = htmlspecialchars(strip_tags($_POST['taille']));
$poids = htmlspecialchars(strip_tags($_POST['poids']));
$statut = htmlspecialchars(strip_tags($_POST['statut']));
$pers_urg = htmlspecialchars(strip_tags($_POST['pers_urg']));
$medecin = htmlspecialchars(strip_tags($_POST['medecin']));
$target_dir = "images/"; //Dossiers de destination pour les fichiers téléchargés
$target_file = $target_dir . basename($_FILES["profil"]["name"]); //Chemin complet du fichier de destination
move_uploaded_file($_FILES["profil"]["tmp_name"], $target_file); //Téléchargement du fichier
$profil = $_FILES['profil']['name'];

$admed = isset($_POST['admed']) ? $_POST['admed'] : 'non';
$transp = isset($_POST['transp']) ? $_POST['transp'] : 'non';
$consul = isset($_POST['consul']) ? $_POST['consul'] : 'non';

if (isset($_POST['outer-group'])) {
    // Récupérer les données du champ "outer-group"
    $outerGroupValues = $_POST['outer-group'];
    $conds = array();
    // Parcourir les valeurs récupérées
    foreach ($outerGroupValues as $outerGroup) {
        // Vérifiez si la clé "cond" existe dans chaque élément de "outer-group"
        if (isset($outerGroup['cond'])) {
            // Récupérez la valeur de "cond"
            $condValue = $outerGroup['cond'];
            // Utilisez la valeur comme vous le souhaitez
            $conds[] = $condValue;
        }
    }
    $charscond = implode(',', $conds);
}

if (isset($_POST['medoc'])) {
    $AllInsMedocs = $_POST['medoc'];
    $medocArray = array();
    foreach ($AllInsMedocs as $insMedoc) {
        if (isset($insMedoc['nom_medoc'])) {
            $medocValue = $insMedoc['nom_medoc'];
            $medocArray[] = $medocValue;
        }
    }
    $charsMedoc = implode(',', $medocArray);
    $medocArray = array();
    foreach ($AllInsMedocs as $insMedoc) {
        if (isset($insMedoc['posologie'])) {
            $medocValue = $insMedoc['posologie'];
            $medocArray[] = $medocValue;
        }
    }

    $charsPos = implode(',', $medocArray);
    $medocArray = array();
    foreach ($AllInsMedocs as $insMedoc) {
        if (isset($insMedoc['frequence'])) {
            $medocValue = $insMedoc['frequence'];
            $medocArray[] = $medocValue;
        }
    }
    $charsFreq = implode(',', $medocArray);
}
if (isset($_POST['alg'])) {
    $algInsts = $_POST['alg'];
    $algArray = array();
    foreach ($algInsts as $algInst) {
        $algValue = $algInst['reaction'];
        $algArray[] = $algValue;
    }
    $charsReaction = implode(',', $algArray);
    $algArray = array();
    foreach ($algInsts as $algInst) {
        $algValue = $algInst['type'];
        $algArray[] = $algValue;
    }
    $charsType = implode(',', $algArray);
}


if (require('connexion_db.php')) {


    $req = $access->prepare("INSERT INTO desc_stu(nom,prenom,sexe,age,birthday,profil,filiere,groupe_sanguin, taille, poids,statut,cond_med,nom_medoc,posologie,frequence,allergies,type_reaction,personne_urg,nom_pere,nom_mere,medecin,auto_admistrer_medoc, auto_transporter_hopital, auto_consult_medecin,username,mot_de_passe) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $req->execute(array($name, $prenom, $sexe, $age, $birth, $profil, $fil, $gs, $tal, $poids, $statut, $charscond, $charsMedoc, $charsPos, $charsFreq, $charsReaction, $charsType, $pers_urg, $pere, $mere, $medecin, $admed, $transp, $consul, $username, $password));
    if ($req->execute(array($name, $prenom, $sexe, $age, $birth, $profil, $fil, $gs, $tal, $poids, $statut, $charscond, $charsMedoc, $charsPos, $charsFreq, $charsReaction, $charsType, $pers_urg, $pere, $mere, $medecin, $admed, $transp, $consul, $username, $password))) {
    }
    $req->closeCursor();

    header('Location: dossiers-medical.php');
}

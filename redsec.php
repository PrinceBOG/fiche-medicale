<?php

session_start();

$username=$_SESSION['username'];
$password=$_SESSION['password'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données des champs texte
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // Dossier de destination pour les fichiers téléchargés
    $target_dir = "images/";
    // Chemin complet du fichier de destination
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Assurez-vous que le répertoire de destination existe
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Tentative de téléchargement du fichier
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "Le fichier " . basename($_FILES["file"]["name"]) . " a été téléchargé avec succès.<br>";
        echo "Nom : " . $name . "<br>";
        echo "Email : " . $email . "<br>";

        // Affichage du fichier téléchargé
        echo "<br><a href='$target_file' download>Télécharger le fichier</a>";

        // Connexion à la base de données
        require('connexion_db.php');

        // Préparation et exécution de la requête pour insérer les données dans la base de données
        $stmt = $access->prepare("INSERT INTO cond_test(nom, email, file) VALUES (:name, :email, :file_path)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':file_path', $target_file);
        $stmt->execute();

        header('Location: dossiers-medical.html');
    }
}

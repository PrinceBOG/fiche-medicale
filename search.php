<?php

$keywords = $_GET['keywords'];
if (require("connexion_db.php")) {

    $req = $access->prepare("SELECT nom,prenom from desc_stu where nom like :keywords or prenom like :keywords");
    $req->execute(array(":keywords" => '%' . $keywords . '%'));
    $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json'); // Ajout de l'en-tête Content-Type
    echo json_encode($resultat);
} else {
    // Retourner un message d'erreur si les keywords ne sont pas définis ou sont vides
    header('Content-Type: application/json'); // Ajout de l'en-tête Content-Type
    echo json_encode(array("error" => "Keywords not provided or empty"));
}

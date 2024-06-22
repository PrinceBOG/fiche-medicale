<?php

$host = "localhost";
$utilisateur_db = "root";
$port = "3307";
$password_db = "";
$db = "myhealth";

try {
    $access = new PDO("mysql:host=$host;port=$port;dbname=$db", $utilisateur_db, $password_db);
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}

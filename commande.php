<?php

function ajouter($name, $prenom, $sexe, $age, $birth, $profil, $fil, $gs, $tal, $poids, $statut, $charscond, $charsMedoc, $charsPos, $charsFreq, $charsReaction, $charsType, $pers_urg, $pere, $mere, $medecin, $admed, $transp, $consul, $username, $password)
{
    if (require('connexion_db.php')) {

        //$profilcont = file_get_contents($profil);

        $req = $access->prepare("INSERT INTO desc_stu(nom,prenom,sexe,age,birthday,profil,filiere,groupe_sanguin, taille, poids,statut,cond_med,nom_medoc,posologie,frequence,allergies,type_reaction,personne_urg,nom_pere,nom_mere,medecin,auto_admistrer_medoc, auto_transporter_hopital, auto_consult_medecin,username,mot_de_passe) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        /*$req->execute(array($name, $gs, $tal, $poids, $statut));*/

        /*foreach ($conds as $cond) {
            $acces->bind("s", $cond);
            $req->execute(array($cond));
            echo 'Ajouté';
        }*/

        /*$req->bindParam("s", $name);*/


        /*$id = $access->lastInsertId();

        $req->closeCursor();


        $req = $access->prepare("INSERT INTO cond_med(num_stu,cond_med) values(?,?)");*/

        /*foreach ($conds as $cond) {
            $cond = htmlspecialchars($cond);
            $req->execute(array($name, $gs, $tal, $poids, $statut, $cond));
        }*/
        $req->execute(array($name, $prenom, $sexe, $age, $birth, $profil, $fil, $gs, $tal, $poids, $statut, $charscond, $charsMedoc, $charsPos, $charsFreq, $charsReaction, $charsType, $pers_urg, $pere, $mere, $medecin, $admed, $transp, $consul, $username, $password));

        $req->closeCursor();

        // $req = $access->prepare("INSERT INTO medicament(num_stu,nom,posologie,frequence) values(?,?,?,?)");

        // foreach ($medocs as $key => $medoc) {
        //     // Récupérer les valeurs correspondantes
        //     $posol = $posols[$key]; // Par exemple, récupérez l'âge de la même manière
        //     // Ajoutez d'autres colonnes comme 'age', 'email', etc., de la même manière
        //     $freq = $freqs[$key];
        //     // Préparer la requête SQL d'insertion
        //     $req->execute(array($id, $medoc, $posol, $freq)); // Ajoutez les autres colonnes ici
        // }
        // echo "Données insérées";
        // $req->closeCursor();
    }
}

function ajouter_vis($etab, $datEnter, $heurEnter, $datSortie, $heurSortie, $medecin_vis, $etat_sante, $username, $password)
{
    if (require('connexion_db.php')) {
        $req = $access->prepare("INSERT INTO visite(etablissement,date_entree,heure_entree,date_sortie,heure_sortie,medecin,etat_sante,username,mot_de_passe) values(?,?,?,?,?,?,?,?,?)");

        $req->execute(array($etab, $datEnter, $heurEnter, $datSortie, $heurSortie, $medecin_vis, $etat_sante, $username, $password));

        $req->closeCursor();
    }
}

/*function inscrip($username, $password)
{
    if (require('connexion_db.php')) {
        $req = $access->prepare('INSERT INTO desc_stu(username,mot_de_passe) values(?,?)');

        //$statut = "user";

        $req->execute(array($username, $password));

        $req->closeCursor();
    }
}

function getUser($username, $password)
{
    if (require('connexion_db.php')) {
        //$statut = 'user';
        $req = $access->prepare("SELECT * FROM connexion where username=? and mot_de_passe=?");
        $req->execute(array($username, $password));
    }

    if ($req->rowCount() == 1) {
        $data = $req->fetch();
        return $data;
    } else {
        return false;

        $req->closeCursor();
    }
}*/


function afficher($username, $password)
{
    if (require("connexion_db.php")) {
        $req = $access->prepare("SELECT * from desc_stu where username=? and mot_de_passe=?");
        $req->execute(array($username, $password));
        $allInfos = $req->fetchAll(PDO::FETCH_OBJ); //Récupère toutes les valeurs sous forme d'objet
        return $allInfos;

        $req->closeCursor();
    }
}

function afficher_vis($username, $password)
{
    if (require('connexion_db.php')) {
        $req = $access->prepare("SELECT etablissement, date_entree, heure_entree, date_sortie, heure_sortie,medecin,etat_sante from visite where username=? and mot_de_passe=?");

        $req->execute(array($username, $password));

        $Visits = $req->fetchAll(PDO::FETCH_OBJ);

        return $Visits;

        $req->closeCursor();
    }
}

function afficherAll()
{
    if (require('connexion_db.php')) {
        $req = $access->prepare("SELECT * FROM desc_stu");
        $req->execute();
        $recupAll = $req->fetchAll(PDO::FETCH_OBJ);
        return $recupAll;
        $req->closeCursor();
    }
}

function afficherSpec($keywords)
{
    if (require('connexion_db.php')) {

        if (strpos($keywords, ' ') !== false) {
            $keyArray = array();
            $keyArray = explode(' ', $keywords);
            $req = $access->prepare('SELECT * FROM desc_stu where nom=? and prenom=? ');
            $req->execute(array($keyArray[0], $keyArray[1]));
            if ($req->rowCount() >= 1) {
                $recup = $req->fetchAll(PDO::FETCH_OBJ);
                $req->closeCursor();
            } else {
                $req->execute(array($keyArray[1], $keyArray[0]));
                if ($req->rowCount() >= 1) {
                    $recup = $req->fetchAll(PDO::FETCH_OBJ);
                } else {
                    header("Location: rechtest.php");
                }
            }
        } else {
            $req = $access->prepare('SELECT * FROM desc_stu where nom=? or prenom=? ');
            $req->execute(array($keywords, $keywords));
            if ($req->rowCount() <= 0) {
                header("Location: noneUser.php");
            } else {
                $recup = $req->fetchAll(PDO::FETCH_OBJ);
            }
        }
        return $recup;
        $req->closeCursor();
    }
}

function update($username, $password, $upArray)
{
    if (require('connexion_db.php')) {
        foreach ($upArray as $cle => $val) {
            $req = $access->prepare("UPDATE desc_stu set $cle = ? where username=? and mot_de_passe=?");
            $req->execute(array($val, $username, $password));
            $req->closeCursor();
        }
    }
}

<?php
require('commande.php');

$allUsers = afficherAll();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Medical</title>

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
    <section class="comp-section">
        <div class="container">
            <div class="row">
                <?php foreach ($allUsers as $user) : ?>

                    <?php

                    $medicamentsArray = explode(',', $user->nom_medoc);
                    $posologiesArray = explode(',', $user->posologie);
                    $frequencesArray = explode(',', $user->frequence);
                    $allergiesArray = explode(',', $user->allergies);
                    $typeReactionArray = explode(',', $user->type_reaction);

                    $elementMeds = array();
                    $elementAlgs = array();

                    for ($i = 0; $i < count($medicamentsArray); $i++) {
                        $elementMeds[] = array($medicamentsArray[$i], $posologiesArray[$i], $frequencesArray[$i]);
                    }

                    for ($i = 0; $i < count($allergiesArray); $i++) {
                        $elementAlgs[] = array($allergiesArray[$i], $typeReactionArray[$i]);
                    }
                    ?>

                    <div class="col-3">
                        <a href="#" class="card" data-bs-toggle="modal" data-bs-target="#activités<?= $user->id_stu ?>">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body p-1">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <div class="d-flex">
                                                <h1 class="me-3">
                                                    <i class="far fa-file"></i>
                                                </h1>
                                                <div>
                                                    <?php

                                                    $prenom = ucfirst($user->prenom);
                                                    $nom = strtoupper($user->nom);

                                                    ?>
                                                    <span class="d-block mb-2 fs-6 fw-bold"><?= $nom ?> <?= $prenom ?></span>
                                                    <span class="mb-0 me-5">1ère année</span>
                                                    <span class="mb-0"><strong><?= $user->filiere ?></strong></span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </a>
                    </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="activités<?= $user->id_stu ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fiche médicale</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="comp-section">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item"><a class="nav-link active" href="#solid-tab3" data-bs-toggle="tab">Info Personnel</a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-tab4" data-bs-toggle="tab">Visite</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="solid-tab3">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="avatar avatar-xxl">
                                            <?php if ($user->profil == null) { ?>
                                                <img class="avatar-img rounded-3" src="images/iconPerson2.png" alt="">
                                            <?php } else { ?>

                                                <img class="avatar-img rounded-3" alt="User Image" src="images/<?= $user->profil ?>">
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <div>
                                                    <span class="d-block mb-0 fs-6 fw-bold">Nom :</span>
                                                    <span class="mb-0"><?= $nom ?></span>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <div>
                                                    <span class="d-block mb-0 fs-6 fw-bold">Prénoms :</span>
                                                    <span class="mb-0"><?= $prenom ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-5">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <div>
                                                    <span class="d-block mb-0 fs-6 fw-bold">Sexe :</span>
                                                    <span class="mb-0"><?= $user->sexe ?></span>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <div>
                                                    <span class="d-block mb-0 fs-6 fw-bold">Age :</span>
                                                    <span class="mb-0"><?= $user->age ?> ans</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-3">
                                                <thead>
                                                    <tr class="table-info">
                                                        <th scope="col">Groupe Sanguin</th>
                                                        <th scope="col">Taille</th>
                                                        <th scope="col">Poids</th>
                                                        <th scope="col">Date de Naissance</th>
                                                        <th scope="col">Adresse</th>
                                                        <th scope="col">Nom du Père</th>
                                                        <th scope="col">Nom de la Mère</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><?= $user->groupe_sanguin ?></th>
                                                        <td><?= $user->taille ?></td>
                                                        <td><?= $user->poids ?></td>
                                                        <td><?= $user->birthday ?></td>
                                                        <td></td>
                                                        <td><?= $user->nom_pere ?></td>
                                                        <td><?= $user->nom_mere ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <h4 class="m-0">Condition médicale</h4>
                                        <ul class="list-group">
                                            <?php
                                            $conditionArray = explode(',', $user->cond_med);
                                            foreach ($conditionArray as $condition) {
                                                echo "<li class='list-group-item'>$condition</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <h4 class="m-0">Médicament actuelle</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="table-success">
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">Posologie </th>
                                                        <th scope="col">Fréquence</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($elementMeds as $key => $elementMed) :  ?>
                                                        <tr>
                                                            <th scope="row"><?= $key + 1 ?></th>
                                                            <td scope="row"><?= $elementMed[0] ?></td>
                                                            <td scope="row"><?= $elementMed[1] ?></td>
                                                            <td scope="row"><?= $elementMed[2] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <h4 class="m-0">Allergies</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="table-danger">
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Réaction</th>
                                                        <th scope="col">Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($elementAlgs as $key => $elementAlg) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $key + 1 ?></th>
                                                            <td><?= $elementAlg[0] ?></td>
                                                            <td><?= $elementAlg[1] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <div>
                                                    <span class="mb-0 fs-6 fw-bold">Personne à contacté en cas d'urgence :</span>
                                                    <span class="mb-0"><?= $user->personne_urg ?></span>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <div>
                                                    <span class="mb-0 fs-6 fw-bold">Médécin traitant :</span>
                                                    <span class="mb-0"><?= $user->medecin ?> </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <h4 class="m-0">Autorisations Médicales</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Autorisation pour administrer des médicaments (le cas échéantbheading)
                                                    </div>
                                                </div>
                                                <span class="badge bg-primary rounded-pill"><?= $user->auto_admistrer_medoc ?></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Autorisation pour transporter l'apprenant à l'hôpital en cas d'urgence
                                                    </div>
                                                </div>
                                                <span class="badge bg-danger rounded-pill"><?= $user->auto_transporter_hopital ?></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Autorisation pour consulter le médecin traitant de l'apprenant en cas de
                                                        besoin </div>
                                                </div>
                                                <span class="badge bg-primary rounded-pill"><?= $user->auto_consult_medecin ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


</body>

</html>

<?php

echo "user_id: " . $user->id_stu;

?>
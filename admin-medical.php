<?php
session_start();
if ($_SESSION['username'] != "Prince" and $_SESSION['password'] != "4e00ae5a3850c8238eabce543aac62c2385044bf") {
    header('Location: login.php');
}

require('commande.php');

$allUsers = afficherAll();

if (isset($_POST['search'])) {
    $keywords = $_POST['keywords'];

    $keywords = strtolower($keywords);

    $Users = afficherSpec($keywords);

    $idArray = array();

    foreach ($Users as $User) {
        $idArray[] = $User->id_stu;
    }
}

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

        .fich {
            background-color: greenyellow;

        }

        .not-fich {
            color: white;
        }

        .suggestion {
            cursor: pointer;
            padding: 5px;
        }

        .suggestion:hover {
            background-color: lightgray;
            /* Couleur de fond au survol */
        }
    </style>
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="index.html" class="logo">
                    <img src="assets/img/logo.png" alt="">
                </a>
                <a href="index.html" class="logo-small">
                    <img src="assets/img/logo-small.png" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
                        </form>
                    </div>
                </li>


                <li class="nav-item dropdown has-arrow flag-nav">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                        <img src="assets/img/flags/us1.png" alt="" height="20">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/flags/us.png" alt="" height="16"> English
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/flags/fr.png" alt="" height="16"> French
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/flags/es.png" alt="" height="16"> Spanish
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/flags/de.png" alt="" height="16"> German
                        </a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <img src="assets/img/icons/notification-bing.svg" alt="img"> <span class="badge rounded-pill">4</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="assets/img/profiles/avatar-06.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="assets/img/profiles/avatar-17.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="assets/img/profiles/avatar-13.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="images/iconPerson2.png" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="images/iconPerson2.png" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6><?= $_SESSION['username'] ?></h6>
                                    <h5>Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> My Profile</a>
                            <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="disconnect.php"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.html">Settings</a>
                    <a class="dropdown-item" href="disconnect.php">Logout</a>
                </div>
            </div>

        </div>

        <div class="page-wrapper m-0">
            <div class="content">
                <section class="comp-section">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-0">
                                <div class="card-header">
                                    <div class="section-header m-0">
                                        <h3 class="section-title">Registre medical</h3>
                                        <div class="line"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="row justify-content-between mb-3">
                                            <div class="col-md-10">
                                                <div class="search-set">
                                                    <div class="search-path">
                                                        <a class="btn btn-filter" id="filter_search">
                                                            <img src="assets/img/icons/filter.svg" alt="img">
                                                            <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                                        </a>
                                                    </div>

                                                    <div class="input-group">

                                                        <input type="text" name="keywords" class="form-control" onkeydown="searchKeywords()" placeholder="Recherche" aria-label="Username" aria-describedby="basic-addon1" id="searchInput" autocomplete="off">
                                                        <button type="submit" name="search" value="rechercher" class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></button>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <a href="inscription.php">
                                                    <button type="button" class="btn btn-primary w-100"><i class="fas fa-plus"></i> Ajouter</button>
                                                </a>

                                            </div> -->
                                        </div>
                                        <div id="suggestions"></div>

                                        <div class="card" id="filter_inputs">
                                            <div class="card-body pb-0">
                                                <div class="row align-items-end">
                                                    <div class="col-md-5 col-sm-6 col-12">
                                                        <div class="form-group m-0">
                                                            <label>Promotion</label>
                                                            <select class="js-example-basic-single form-small select2">
                                                                <option selected="selected">20##-20##</option>
                                                                <option>20##-20##</option>
                                                                <option>20##-20##</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-12">
                                                        <div class="form-group m-0">
                                                            <label>Année</label>
                                                            <select class="js-example-basic-single form-small select2">
                                                                <option selected="selected">Année 1</option>
                                                                <option>Année 2</option>
                                                                <option>Année 3</option>
                                                                <option>Alumni</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-6 col-12 ms-auto">
                                                        <div class="form-group m-0">
                                                            <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- <section>
                    <form action="rechUser.php">
                        <button type="submit">Aller</button>
                    </form>
                </section> -->

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
                                        <?php

                                        ?>
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

                                                            $valid = false;

                                                            if (isset($_POST['search'])) {
                                                                for ($i = 0; $i < count($idArray); $i++) {
                                                                    if ($user->id_stu == $idArray[$i]) {
                                                                        $valid = true;
                                                                    }
                                                                }
                                                                if ($valid) {
                                                                    echo '<span class="d-block mb-2 fs-6 fw-bold fich">' . $nom . ' ' . $prenom . '</span>';
                                                                } else {
                                                                    echo '<span class="d-block mb-2 fs-6 fw-bold">' . $nom . ' ' . $prenom . '</span>';
                                                                }
                                                            } else {
                                                                echo '<span class="d-block mb-2 fs-6 fw-bold">' . $nom . ' ' . $prenom . '</span>';
                                                            }


                                                            ?>

                                                            <span class="mb-0 me-5">1ère année</span>
                                                            <span class="mb-0"><strong><?= $user->filiere ?></strong></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </a>

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
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>




    <div class="modal fade" id="add-module" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enregistrer un apprenant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="comp-section">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-bs-toggle="tab">Info Personnel</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#solid-tab2" data-bs-toggle="tab">Visite</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="solid-tab1">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="inputEmail4" class="form-label">Apprenant</label>
                                                <select id="choix" class="js-example-basic-single select2" data-dropdown-parent="#add-module" name="statut">
                                                    <option selected="selected">Choisissez le statut de cet apprenant</option>
                                                    <option value="stage">Stage</option>
                                                    <option value="activite">Activités</option>
                                                    <option value="autres">Autres</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="name" class="form-label">Nom de l'apprenant</label>
                                                <input type="text" name="nom" placeholder="Nom" class="form-control" id="name">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="name" class="form-label">Prénom de l'apprenant</label>
                                                <input type="text" name="prenom" placeholder="Prenom(s)" class="form-control" id="name">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="inputState" class="form-label">Groupe Sanguin</label>
                                                <select id="inputState" class="form-select" name="gs">
                                                    <option selected>Choisissez le groupe sanguin</option>
                                                    <option value="0+">O+</option>
                                                    <option value="0-">O-</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputPassword4" class="form-label">Taille</label>
                                                <input type="text" class="form-control" id="inputPassword4" name="taille">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputPassword4" class="form-label">Poids</label>
                                                <input type="number" class="form-control" id="inputPassword4" name="poids">
                                            </div>
                                        </div>
                                        <label class="col-form-label">Condition médicale</label>
                                        <div class="row g-3 outer-repeater">
                                            <div class="col-10">
                                                <div data-repeater-list="outer-group" class="outer">
                                                    <div data-repeater-item class="outer">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <input type="text" placeholder="Ajouter une condition" class="outer form-control mb-3" name="cond">
                                                            </div>
                                                            <div class="col-2">
                                                                <button data-repeater-delete type="button" class="outer btn  btn-danger">Supprimer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button data-repeater-create type="button" class="outer btn  btn-success w-100">Ajouter</button>
                                            </div>
                                        </div>
                                        <label class="col-form-label">Médicament actuelle</label>
                                        <div class="row g-3 outer-repeater">
                                            <div class="col-10">
                                                <div data-repeater-list="medoc" class="outer">
                                                    <div data-repeater-item class="outer">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <input type="text" name="nom_medoc" placeholder="Nom de médicaments" class="outer form-control mb-3" />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" name="posologie" placeholder="Posologie" class="outer form-control mb-3" />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" name="frequence" placeholder="Fréquence" class="outer form-control mb-3" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <button data-repeater-delete type="button" class="outer btn  btn-danger">Supprimer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button data-repeater-create type="button" class="outer-1 btn  btn-success w-100">Ajouter</button>
                                            </div>
                                        </div>
                                        <label class="col-form-label">Allergies</label>
                                        <div class="row g-3 outer-repeater">
                                            <div class="col-10">
                                                <div data-repeater-list="alg" class="outer-2">
                                                    <div data-repeater-item class="outer-2">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <input type="text" name="reaction" placeholder="Réaction" class="outer-2 form-control mb-3" />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <select id="inputState" class="form-select" name="type">
                                                                            <option selected>Choisissez le type</option>
                                                                            <option value="alimentaires">Alimentaires</option>
                                                                            <option value="saisonnieres">Saisonnières</option>
                                                                            <option value="interieur">Intérieur</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <button data-repeater-delete type="button" class="outer-2 btn  btn-danger">Supprimer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button data-repeater-create type="button" class="outer btn  btn-success w-100">Ajouter</button>
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-6">
                                                <label for="inputState" class="form-label">Personne à contacter en cas d'urgence</label>
                                                <select id="inputState" class="form-select" name="pers_urg" placeholder="Personne à contacter ">
                                                    <option value="" disabled selected hidden></option>
                                                    <option value="Son père">Son père</option>
                                                    <option value="Sa mère">Sa Mère</option>
                                                    <option value="Son tuteur/Sa Tutrice">Son Tuteur/ Sa Tutrice</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputPassword4" class="form-label">Médécin traitant</label>
                                                <input type="text" class="form-control" id="inputPassword4" name="medecin">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1" value="oui" name="admed">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Autorisation pour administrer des médicaments (le cas échéantbheading)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck2" value="oui" name="transp">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Autorisation pour transporter l'apprenant à l'hôpital en cas d'urgence
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck3" value="oui" name="consul">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Autorisation pour consulter le médecin traitant de l'apprenant en cas de besoin
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit1" class="btn btn-primary btn-sm">Soumettre</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="solid-tab2">
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/plugins/select2/js/custom-select.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>

    <script src="assets/js/jquery.repeater.js"></script>

    <script>
        const searchKeywords = async () => {
            document.querySelector('#suggestions').innerHTML = "";
            let keywords = document.querySelector("#searchInput").value;
            console.log(keywords);

            if (keywords.length > 0) {
                const req = await fetch(`search.php?keywords=${keywords}`);
                const json = await req.json();
                console.log(json);

                if (json.length > 0) {
                    json.forEach((sugg) => {
                        // Création d'un élément de suggestion
                        const suggestion = document.createElement('div');
                        suggestion.textContent = `${sugg.nom} ${sugg.prenom}`;
                        suggestion.classList.add('suggestion');

                        // Ajout de la suggestion à la liste
                        document.querySelector('#suggestions').appendChild(suggestion);

                        // Ajout d'un gestionnaire d'événements pour placer la suggestion dans l'input lorsque cliqué
                        suggestion.addEventListener('click', () => {
                            document.querySelector('#searchInput').value = suggestion.textContent;
                            document.querySelector('#suggestions').innerHTML = "";
                        });
                    });
                }
            }
        }
    </script>

</body>

</html>
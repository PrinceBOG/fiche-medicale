<?php

session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    header('Location: login.php');
} else {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
}

// if ($send) {
//     echo $send;
//     header('Location: dossiers-medical.php');
// }

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
                                                <p class="noti-details"><span class="noti-title"><?= $username ?></span> added new task <span class="noti-title">Patient appointment booking</span></p>
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
                                                <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name
                                                    <span class="noti-title">Appointment booking with payment gateway</span>
                                                </p>
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
                                                <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span>
                                                    to project <span class="noti-title">Doctor available module</span></p>
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
                                    <h6><?= $username ?></h6>
                                    <h5>Utilisateur</h5>
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
                                    <form action="#">
                                        <div class="row justify-content-between mb-3">

                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#add-module"><i class="fas fa-plus"></i> Ajouter</button>
                                            </div>
                                        </div>
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
                                <form action="insert.php" method="post" enctype="multipart/form-data">
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
                                                <label class="form-check">Sexe</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sexe" value="masculin" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Masculin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sexe" value="feminin" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Féminin
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="name" class="form-label">Age</label>
                                                <input type="number" name="age" placeholder="Age" class="form-control" id="age">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="name" class="form-label">Date de naissance</label>
                                                <input type="date" name="birth" class="form-control" id="birth">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="inputState" class="form-label">Année</label>
                                                <select name="fil" class="form-select" id="fil">
                                                    <option selected>Choisissez une filière</option>
                                                    <option value="L1">Licence 1</option>
                                                    <option value="L2">Licence 2</option>
                                                    <option value="L3">Licence 3</option>
                                                    <option value="M1">Master 1</option>
                                                    <option value="M2">Master 2</option>
                                                    <option value="DOC1">Doctorat 1</option>
                                                    <option value="DOC2">Doctorat 2</option>
                                                    <option value="DOC3">Doctorat 3</option>

                                                </select>
                                            </div>


                                            <div class="col-md-4">
                                                <label for="formFile" class="form-label">Photo de profile</label>
                                                <input class="form-control" type="file" id="formFile" name="profil">
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
                                            <div class="col-md-3">
                                                <label for="inputState" class="form-label">Personne à contacter en cas d'urgence</label>
                                                <select id="inputState" class="form-select" name="pers_urg" placeholder="Personne à contacter ">
                                                    <option value="" disabled selected hidden></option>
                                                    <option value="Son père">Son père</option>
                                                    <option value="Sa mère">Sa Mère</option>
                                                    <option value="Son tuteur/Sa Tutrice">Son Tuteur/ Sa Tutrice</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputPassword4" class="form-label">Nom du père</label>
                                                <input type="text" class="form-control" id="inputPassword4" name="pere">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="inputPassword4" class="form-label">Nom de la mère</label>
                                                <input type="text" class="form-control" id="inputPassword4" name="mere">
                                            </div>

                                            <div class="col-md-3">
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
                                    <div class="modal-footer justify-content-end">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" name="submit1" class="btn btn-primary btn-sm">Soumettre</button>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane" id="solid-tab2">
                                <form class="row g-3" method="POST">
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

                                    <div class="modal-footer justify-content-end">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" name="submit2" class="btn btn-primary btn-sm">Soumettre</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
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
        $(document).ready(function() {
            'use strict';

            $('.outer-repeater, outer-repeater-1, outer-repeater-2').repeater({
                isFirstItemUndeletable: true,
                defaultValues: {
                    'text-input': ''
                },
                show: function() {
                    console.log('outer show');
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    console.log('outer delete');
                    $(this).slideUp(deleteElement);
                },
                repeaters: [{
                    isFirstItemUndeletable: true,
                    selector: '.inner-repeater',
                    defaultValues: {
                        'inner-text-input': 'inner-default'
                    },
                    show: function() {
                        console.log('inner show');
                        $(this).slideDown();
                    },
                    hide: function(deleteElement) {
                        console.log('inner delete');
                        $(this).slideUp(deleteElement);
                    }
                }]
            });
        });
    </script>

</body>

</html>
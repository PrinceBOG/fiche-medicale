<?php

session_start();

//if(isset($_SESSION['username']) and isset($_SESSION['password'])){
$_SESSION['username'] = "";
$_SESSION['password'] = "";
$_SESSION['statut'] = "";
//$_SESSION = array();
//session_destroy();

header('Location: login.php');

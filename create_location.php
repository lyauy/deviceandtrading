<?php

include_once('ConnexionBDD.php');
include_once('user.php');
include_once("userController.php");
include_once('location.php');
include_once("locationController.php");
include_once('objet.php');
include_once("objetController.php");

$userid = getAuthUserId($conn);
$zobjid = $_GET['id_objet'];
$objid = trim($zobjid,"'");

$newLocation = new Location(null, $objid, $userid[0], $_POST['debutloc'], $_POST['finloc']);
var_dump($newLocation);
$newLocation->locToDB($conn);
header("Location: ./Accueil.php");
die();
<?php

include_once('ConnexionBDD.php');
include_once('user.php');
include_once("userController.php");
include_once('location.php');
include_once("locationController.php");
include_once('objet.php');
include_once("objetController.php");


function getLocation ($sth) {

	$sth->setFetchMode(PDO::FETCH_CLASS, 'Location');
	$locations = $sth->fetchall();
	return $locations;
}
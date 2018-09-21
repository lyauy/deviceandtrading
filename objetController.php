<?php

include_once('ConnexionBDD.php');
include_once('objet.php');
/*var_dump($user);*/

function redirectObjet()
{
	header("Location: ./Accueil.php");
	die();
}

function getObjet ($sth) {

	$sth->setFetchMode(PDO::FETCH_CLASS, 'Objet');
	$objet = $sth->fetch();
	return $objet;
}

?>

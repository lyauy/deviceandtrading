<?php

include_once('ConnexionBDD.php');
include_once('objet.php');
/*var_dump($user);*/

function redirectUser()
{
	header("Location: ./Accueil.php");
	die();
}

function getUser ($sth) {

	$sth->setFetchMode(PDO::FETCH_CLASS, 'Objet');
	$objet = $sth->fetch();
	return $objet;
}


function createUser($conn) {

	$newObjet = new Objet($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], 0, $_POST['password']);
	$newObjet->objetToDB($conn);
	redirectUser();
}

function editUser($conn) {

	$newUser = new User($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], 0, $_POST['password']);
	$newUser->saveToDB($conn);
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='./Accueil.php';
    </script>");
}

?>

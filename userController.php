<?php

include_once('ConnexionBDD.php');
include_once('user.php');


function redirectUser()
{
	header("Location: ./show_user_list.php");
	die();
}

function getUser ($sth) {

	$sth->setFetchMode(PDO::FETCH_CLASS, 'User');
	$user = $sth->fetch();
	return $user;
}

function createUser($conn) {

	$newUser = new User($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], 0, $_POST['password']);
	$newUser->userToDB($conn);
	redirectUser();
}

function editUser($conn) {

	$newUser = new User($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], 0, $_POST['password']);
	$newUser->saveToDB($conn);
	header("Location: ./show_user.php?pseudo=". $_POST['pseudo']);
	die();
}

?>


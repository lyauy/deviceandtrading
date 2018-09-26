<?php

include_once('ConnexionBDD.php');
include_once('user.php');
/*var_dump($user);*/

function redirectUser()
{
	header("Location: ./show_user_list.php");
	die();
}

function getAuthUserId ($conn) {

	session_start();

	$useremail = $_SESSION['userCo']->email;
	$req = $conn->query("SELECT id FROM user WHERE email = '$useremail'");
	$userid = $req->fetch();
	return $userid[0];
}

function getUser ($sth) {

	$sth->setFetchMode(PDO::FETCH_CLASS, 'User');
	$users = $sth->fetchall();
	return $users;
}

function createUser($conn) {

	$newUser = new User($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], 0, $_POST['password']);
	$newUser->userToDB($conn);
	redirectUser();
}

function editUser($conn) {

	$newUser = new User($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['admin'], $_POST['password']);
	$newUser->saveToDB($conn);
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='./Accueil.php';
    </script>");
    header("Location: ./admin.php");
}

function DeleteUser($user){
	header("Location: ./Accueil");
	die();
}
?>


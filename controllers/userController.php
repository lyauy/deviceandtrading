<?php
include_once('ConnexionBDD.php');
include_once('models/user.php');


public function createUser() {

	$newUser = new user();

	$newUser->nom = $_POST['nom'];
	$newUser->prenom = $_POST['prenom'];
	$newUser->email = $_POST['email'];
	$newUser->adresse = $_POST['adresse'];
	$newUser->ville = $_POST['ville'];
	$newUser->cp = $_POST['cp'];
	$newUser->admin = $_POST['admin'];
	$newUser->password = $_POST['password'];
	
}

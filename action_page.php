<?php
include("user.php");
$test = new User('t', 't', 't', 't', 't', 't', 52525, 0, '52522')
;
echo var_dump($test);
/*var_dump($conn);*/
$test->userToDB($conn);

$test->deleteUser($conn);
/*echo $test->pseudo;

$serializedTest = serialize($test);
var_dump(array($serializedTest));

$stmt = $conn->prepare("INSERT INTO user(pseudo, nom, prenom, email, adresse, ville, cp, admin, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute(array($serializedTest));*/
/*
	$pseudo = $_POST['pseudo'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$cp = $_POST['cp'];

	$req = $conn->exec("INSERT INTO user(pseudo, nom, prenom, email, adresse, ville, cp, admin) VALUES('$pseudo', '$nom', '$prenom', '$email', '$adresse', '$ville', '$cp', 0)");
/*	
    $req->execute(array(
       'pseudo' => $pseudo,
       'nom' => $nom,
       'prenom' => $prenom,
       'email' => $email,
       'adresse' => $adresse,
       'ville' => $ville,
       'cp' => $cp,
        ));*/

?>
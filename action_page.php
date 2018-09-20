<?php
include("userController.php");

session_start();

$email = $_POST["email"];

$sth = $conn->query("SELECT * FROM user WHERE email = '$email'");
$sth->setFetchMode(PDO::FETCH_CLASS, 'User');
$user = $sth->fetch();

if($user)
{
  echo "Vous êtes connecté(e) ! ";
  $_SESSION['fdp'] = $user;
  var_dump($_SESSION['fdp']);
}
else
  echo "Non connecté";

/*  echo "<br/>";
echo gettype($user);
echo "<br />";
echo get_class($user);
echo"<br/>";*/
/*var_dump($users);
if (isset($_POST["email"]) ==) {
  echo $_POST["email"];
}
foreach ($users as $user) {
  var_dump($user);
  echo gettype($user);
  echo $user[0];

  if (isset($_POST["email"] && $_POST["email"] == ) {
  }
}*/

/*$test = new User('t', 't', 't', 't', 't', 't', 52525, 0, '52522')
;
echo var_dump($test);
/*var_dump($conn);*/
/*$test->userToDB($conn);

$test->deleteUser($conn);*/
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
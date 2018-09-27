<?php

session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');


$email = $_POST["email"];
$password = $_POST["password"];


$sth = $conn->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");
$sth->setFetchMode(PDO::FETCH_CLASS, 'User');
$user = $sth->fetch();

if($user)
{
  $_SESSION['userCo'] = $user;
  header('Location: http://localhost/Location/Accueil.php');
}
else {

  echo ("<script LANGUAGE='JavaScript'>
    window.alert('pute');
    window.location.href=' http://localhost/Location/Accueil.php';
    </script>");


}

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
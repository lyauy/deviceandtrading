<?php
include("ConnexionBDD.php");
include("user.php");
include("objet.php");
include("objetController.php");

session_start();

$useremail = $_SESSION['userCo']->email;
var_dump($useremail);
$req = $conn->query("SELECT id FROM user WHERE email = '$useremail'");
$userid = $req->fetch();
var_dump($userid[0]);
var_dump(null, $_POST['nom'], $_POST['typeobjet'], $_FILES['image']['file'], 1, $_POST['livraison'], $_POST['nombre'], $_POST['commentaire'], $userid[0]);
$newObjet = new Objet(null, $_POST['nom'], $_POST['typeobjet'], $_FILES['image']['name'], 1, $_POST['livraison'], $_POST['nombre'], $_POST['commentaire'], $userid[0]);
$newObjet->objetToDB($conn);
redirectObjet();


?>
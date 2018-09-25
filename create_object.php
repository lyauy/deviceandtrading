<?php
include("ConnexionBDD.php");
include("user.php");
include("userController.php");
include("objet.php");
include("objetController.php");

$userid = getAuthUserId($conn);
var_dump($userid[0]);

$uploads_dir = "./images/";
$uploads_base = basename($_FILES['image']['name']);
var_dump($uploads_base);
$upload_idk=$uploads_dir.$uploads_base;
move_uploaded_file($_FILES["image"]["tmp_name"], $uploads_dir . $uploads_base);
var_dump($upload_idk);


var_dump(null, $_POST['nom'], $_POST['typeobjet'], $upload_idk, 1, $_POST['livraison'], $_POST['nombre'], $_POST['commentaire'], $userid[0]);
$newObjet = new Objet(null, $_POST['nom'], $_POST['typeobjet'], $upload_idk, 1, $_POST['livraison'], $_POST['nombre'], $_POST['commentaire'], $userid[0]);
$newObjet->objetToDB($conn);
//redirectObjet();


?>
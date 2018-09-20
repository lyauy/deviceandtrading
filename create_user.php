<?php
include("user.php");

$newUser = new User($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], 0, $_POST['password']);
$newUser->userToDB($conn);
$newUser->redirectUser();

?>
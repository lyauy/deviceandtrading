<?php
include("userController.php");

    if(session_id() == '' || !isset($_SESSION))
      {
        session_start();
      }

	$newUser = new User($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_SESSION['userCo']->admin , $_POST['password']);
	$newUser->saveToDB($conn);
	$_SESSION['userCo'] = $newUser;
	
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='./Accueil.php';
    </script>");
    header("Location: ./Accueil.php");

?>
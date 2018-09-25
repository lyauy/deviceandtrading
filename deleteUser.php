<?php
	include_once('userController.php');
	$user = unserialize($_POST['user']);

	$req = $conn->exec("DELETE FROM user WHERE email = '$user->email'");
	header("location: template.php"); 
?>
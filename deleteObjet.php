<?php
	include_once('objet.php');
	$objet = unserialize($_POST['objet']);

	var_dump($objet);
	$req = $conn->exec("DELETE FROM objet WHERE id_objet = '$objet->id_objet'");
	header("location: show_object_list.php"); 
?>
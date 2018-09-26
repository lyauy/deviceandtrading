<?php
	include_once('objet.php');
	$objet = unserialize($_POST['objet']);

	var_dump($objet);
	$req2 = $conn->exec("DELETE FROM location WHERE id_objet = '$objet->id_objet'");
	$req = $conn->exec("DELETE FROM objet WHERE id_objet = '$objet->id_objet'");
	header("location: show_object_list.php"); 
?>
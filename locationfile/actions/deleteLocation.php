<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');
	$location = unserialize($_POST['location']);

	$req2 = $conn->exec("UPDATE objet SET disponibilite = 1 WHERE id_objet = '$location->id_objet'");
	$req = $conn->exec("DELETE FROM location WHERE id_location = '$location->id_location'");
	header("Location: http://localhost/Location/Accueil.php");
//	header("location: show_location_list.php"); 
?>
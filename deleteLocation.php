<?php
	include_once('Location.php');
	$location = unserialize($_POST['location']);

	var_dump($location);
	$req = $conn->exec("DELETE FROM location WHERE id_location = '$location->id_location'");
//	header("location: show_location_list.php"); 
?>
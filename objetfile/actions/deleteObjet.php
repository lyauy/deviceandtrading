<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');
	$objet = unserialize($_POST['objet']);

	$req = $conn->exec("DELETE FROM objet WHERE id_objet = '$objet->id_objet'");
	header("location: http://localhost/Location/objetfile/views/show_object_list.php"); 
?>
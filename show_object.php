<?php
include_once('ConnexionBDD.php');
include_once('user.php');
include_once("userController.php");
include_once('location.php');
include_once("locationController.php");
include_once('objet.php');
include_once("objetController.php");


if(isset($_SESSION['userCo'])){

	$userid = getAuthUserId($conn);	
	$req2 = $conn->query("SELECT * FROM user WHERE id=$userid");
	$user = getUser($req2);
}

$objid = $_GET['id_objet'];
$req = $conn->query("SELECT * FROM objet WHERE id_objet=$getidobj");
$objet = getObjet($req);

?>

<div id="show_object">
	<table>
		<td>Image : <tr><?php echo "<img src='".$objet->image."' width='200' height='200'  />"; ?></tr></td>
</div>
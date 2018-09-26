<?php
include_once('ConnexionBDD.php');
include_once('user.php');
include_once("userController.php");
include_once('location.php');
include_once("locationController.php");
include_once('objet.php');
include_once("objetController.php");

	$userid = getAuthUserId($conn);	
if(isset($_SESSION)){

	$req2 = $conn->query("SELECT * FROM user WHERE id=$userid");
	$user = getUser($req2);
	var_dump($user);
}

$objid = $_GET['id_objet'];
$req = $conn->query("SELECT * FROM objet");
$objets = getObjet($req);

foreach ($objets as $objet){
	if ($objet->id_objet == $objid) {
		$unobjet = $objet;
	}
}

var_dump($unobjet);

$req3 = $conn->query("SELECT * FROM user");
$users = getUser($req3);

foreach ($users as $user){
	if ($user->id == $unobjet->id_user) {
		$unuser = $user;
	}
}

var_dump($unuser);
?>

<div id="show_object">
	<table>
		<tr>Image : <?php echo "<img src='".$unobjet->image."' width='200' height='200'  />"; ?></tr>
		<tr><td>Nom : <?php echo $unobjet->nom; ?></td></tr>
		<tr><td>Catégorie : <?php echo $unobjet->typeobjet; ?></td></tr>
		<tr><td>Livraison : 
			<?php if($unobjet->livraison) {
				echo 'livraison possible';
			} else {
				echo 'pas de livraison';
			} ?>
		</td></tr>
		<tr><td>Disponibilité :
			<?php if($unobjet->disponibilite) {
				echo 'Disponible';
			} else {
				echo 'Indisponible';
			} ?>
		</td></tr>
		<tr><td>Nombre restant : <?php echo $unobjet->nombre; ?></td></tr>
		<tr><td>Commentaire : <?php echo $unobjet->commentaire; ?></td></tr>
		<tr><td>Propriété de : <?php echo '<a href=./show_user?pseudo='.$unuser->pseudo.'>'.$unuser->pseudo.'</a>'; ?></td></tr>
		<tr><td>
			<?php 
			if($unobjet->id_user != $userid ) {

				if($unobjet->disponibilite && isset($_SESSION['userCo'])) {
					echo '<a href=./location_form.php?id_objet='.$unobjet->id_objet.'>Louer</a>';
				} else if (!$unobjet->disponibilite && isset($_SESSION['userCo'])){
					echo "Objet Indisponible !";
				} else {
					echo "Veuillez vous connecter pour louer un objet !";
				} 
			}
				?>
		</td></tr>
	</table>

</div>
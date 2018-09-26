
<?php
	include_once('ConnexionBDD.php');
	include_once('user.php');
	include_once("userController.php");
	include_once('location.php');
	include_once("locationController.php");
	include_once('objet.php');
	include_once("objetController.php");

	$userid = getAuthUserId($conn);
	$req = $conn->query("SELECT * FROM location WHERE id_user = '$userid'");
	$locations = getLocation($req);	
	var_dump($locations);
?>

<div id="object_list">

	<p>Mes Locations</p>

	<table>
		<tr>
			<td>Nom</td>
			<td>Catégorie</td>
			<td>Propriétaire</td>
			<td>Image</td>
			<td>Début de la location</td>
			<td>Fin de la location</td>
		</tr>
		<?php foreach ($locations as $location): ?> 
			<tr>
				<?php 
					$req2 = $conn->query("SELECT * FROM objet WHERE id_objet = '$location->id_objet'");
					$req2->setFetchMode(PDO::FETCH_CLASS, 'Objet');
					$objet = $req2->fetch();

					$req3 = $conn->query("SELECT * FROM user WHERE id = '$objet->id_user'");
					$req3->setFetchMode(PDO::FETCH_CLASS, 'User');
					$user = $req3->fetch();
				?>
				<td><?php echo $objet->nom; ?></td>
				<td><?php echo $objet->typeobjet; ?></td>
				<td><?php echo $user->pseudo; ?></td>
				<td><?php echo "<img src='".$objet->image."' width='200' height='200'  />"; ?></td>
				<td><?php echo $location->debutloc; ?></td>
				<td><?php echo $location->finloc; ?></td>
				<td><a href="#" class="button">Supprimer</a></td>
			</tr>
		<?php endforeach ?>
	</table>


</div>
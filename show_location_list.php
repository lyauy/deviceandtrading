
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

	$req2 = $conn->query("SELECT * FROM objet WHERE id_objet = '$'");
	
?>

<div id="object_list">

	<p>Mes Locations</p>

	<table>
		<tr>
			<td>Nom</td>
			<td>Catégorie</td>
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
				?>
				<td><?php echo $objet->nom; ?></td>
				<td><?php echo $objet->typeobjet; ?></td>
				<td><?php echo "<img src='".$objet->image."' width='200' height='200'  />"; ?></td>
				<td><?php echo $location->debutloc; ?></td>
				<td><?php echo $location->finloc; ?></td>
				<td><a href="#" class="button">Supprimer</a></td>
			</tr>
		<?php endforeach ?>
	</table>


</div>
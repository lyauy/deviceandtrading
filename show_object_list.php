
<?php
	include_once("userController.php");
	include_once("objetController.php");
	$userid = getAuthUserId($conn);
	$objets = $conn->query("SELECT * FROM objet WHERE id_user = '$userid'");
	$objets = getObjet($objets);
?>

<div id="object_list">

	<p>Mes objets</p>

	<table>
		<tr>
			<td>Nom</td>
			<td>Catégorie</td>
			<td>Disponibilité</td>
			<td>Image</td>
		</tr>
		<?php foreach ($objets as $objet): ?> 
			<tr>
				<?php var_dump($objet); ?>
				<td><?php echo $objet->nom; ?></td>
				<td><?php echo $objet->typeobjet; ?></td>
				<td>
					<?php 
						if($objet->disponibilite == 1) {
							echo 'Disponible';
						}
						else {
							echo 'Non disponible';
						}

					?>	
				</td>
				<td><?php echo "<img src='".$objet->image."' width='200' height='200'  />"; ?></td>
				<td><a href="./show_user.php?id='<?php echo $objet->id_objet; ?>'" class="button">Consulter/Modifier</a></td>
				<td>
					<?php $obj = serialize($objet);
		            echo"
		            <form method='POST' action='./deleteObjet.php'>
		                <input type='hidden' name='objet' value = '$obj'/>
		            	<button class='btn btn-outline-danger' type='submit'><i class='fas fa-trash-alt'></i> Supprimer</button>
		            </form>";
		            ?>
		        </td>
			</tr>
		<?php endforeach ?>
	</table>


</div>
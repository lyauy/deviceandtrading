<!doctype html>
<html lang="en">
  <?php 
  include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/front/head.php');
  include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');
  ?>
  <body style="height:1500px;background-color: rgb(249, 249, 249);">
<?php 

	$userid = getAuthUserId($conn);
	$objets = $conn->query("SELECT * FROM objet WHERE id_user = '$userid'");
	$objets = getObjet($objets);

    if(session_id() == '' || !isset($_SESSION)) {
      {
        session_start();
      }
  }
?>

  <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php') ?>
    <div class="" <div class="container" style="margin-top:100px;">
		<?php 
			$users = $conn->query("SELECT * FROM user");
			$users = getUser($users);
		?>
		
		<table id="objet" class="display">
		    <thead>
		<tr>
			<td>Id</td>
			<td>Image</td>
			<td>Nom</td>
			<td>Catégorie</td>
			<td>Disponibilité</td>
			<td>Propriété de</td>
			<td>Commentaire</td>
			<td>Prix</td>
			<td>Action</td>
			<td>Action</td>
		</tr>
		    </thead>
		    <tbody>
				<?php foreach ($objets as $objet): ?> 
					<tr>
						<td><?php echo $objet->id_objet; ?></td>
						<td><?php echo "<img src='http://localhost/Location/images/".$objet->image."' width='150' height='150'  />"; ?></td>
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
						<td><?php echo $_SESSION['userCo']->pseudo ; ?></td>
						<td><?php echo $objet->commentaire; ?></td>
						<td><?php echo $objet->prix; ?>€</td>
						<td>
							<?php $obj = serialize($objet);
				            echo"<form method='POST' action='http://localhost/Location/objetfile/actions/ModifObjet.php?id_objet=$objet->id_objet'>
					            <input type='hidden' name='obj' value = '$obj'/>
					            <button type='submit' class='btn btn-outline-warning'><i class='fas fa-exchange-alt'></i> Modifier</button></td>
				            </form>";?>
						<td>
							<?php $obj = serialize($objet);
				            echo"
				            <form method='POST' action='http://localhost/Location/objetfile/actions/deleteObjet.php?id_objet=$objet->id_objet'>
				                <input type='hidden' name='objet' value = '$obj'/>
				            	<button class='btn btn-outline-danger' type='submit'><i class='fas fa-trash-alt'></i> Supprimer</button>
				            </form>";
				            ?>
				        </td>
					</tr>
				<?php endforeach ?>
		    </tbody>
		</table>  
	</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="http://localhost/Location/front/FeuilleJs.js"></script>

  <script>
    $(document).ready(function() {
        $('#objet').dataTable();
    } );
 </script>

  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php 
	include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/front/head.php'); 
	include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php'); 
?>
<body style="height:1500px;background-color: rgb(249, 249, 249);">
<?php 

    if(session_id() == '' || !isset($_SESSION)) {
      {
        session_start();
      }
  }
 include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php') 
 ?>
<?php
	
	if(isset($_SESSION['userCo'])){

	$userid = getAuthUserId($conn);	
		$req2 = $conn->query("SELECT * FROM user WHERE id=$userid");
		$user = getUser($req2);
	}

	$objid = $_GET['id_objet'];
	$req = $conn->query("SELECT * FROM objet");
	$objets = getObjet($req);

	foreach ($objets as $objet){
		if ($objet->id_objet == $objid) {
			$unobjet = $objet;
		}
	}
	$req3 = $conn->query("SELECT * FROM user");
	$users = getUser($req3);

	foreach ($users as $user){
		if ($user->id == $unobjet->id_user) {
			$unuser = $user;
		}
	}
?>

<div class="container" style="margin-top:100px;">

	<div class="text-center">
		<h3><?php echo $unobjet->typeobjet." n°".$unobjet->id_objet?></h3>
		<br />
	<?php echo "<img src='http://localhost/Location/images/".$unobjet->image."' width='300' height='300'  />"; ?><br/><br/>
	</div>
	<table class="table table-bordered">
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
		<tr><td>Commentaire : <?php echo $unobjet->commentaire; ?></td></tr>
		<tr><td>Prix : <?php echo $unobjet->prix.' €/mois'; ?></td></tr>
		<tr><td>Propriété de : <?php echo $unuser->pseudo ; ?></td></tr>
			<?php 
			if(isset($userid) && $unobjet->id_user != $userid ) {

				if($unobjet->disponibilite && isset($_SESSION['userCo'])) {
					echo "<tr><td><a class='btn btn-outline-success' href=http://localhost/Location/locationfile/views/location_form.php?id_objet='.$unobjet->id_objet.'><i class='fas fa-cart-plus'></i> Louer</a></td></tr></table>";
				} else if (!$unobjet->disponibilite && isset($_SESSION['userCo'])){
					echo "</table>Objet Indisponible !";
				} 
			}
			else if (!isset($userid)) {
					echo "</table><p align='center'>Veuillez vous connecter pour louer un objet !</p>";
				} else {
					echo '';
				}

				?>

</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/userfile/auth/modalCo.php') ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="http://localhost/Location/front/FeuilleJs.js"></script>

</body>
</html>
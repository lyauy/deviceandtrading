<!DOCTYPE html>
<html lang="en">
<head>
  <title>Modification de l'utilisateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./FeuilleStyle.css">

</head>
<body style="height:1500px;background-color: rgb(249, 249, 249);">
<?php 
    include_once('user.php');
    if(session_id() == '' || !isset($_SESSION)) {
      {
        session_start();
      }
  }
 include_once('navbar.php') 
 ?>
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
	<?php echo "<img src='./images/".$unobjet->image."' width='300' height='300'  />"; ?><br/><br/>
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
			if($unobjet->id_user != $userid ) {

				if($unobjet->disponibilite && isset($_SESSION['userCo'])) {
					echo "<tr><td><a class='btn btn-outline-success' href=./location_form.php?id_objet='.$unobjet->id_objet.'><i class='fas fa-cart-plus'></i> Louer</a></td></tr>";
				} else if (!$unobjet->disponibilite && isset($_SESSION['userCo'])){
					echo "Objet Indisponible !";
				} else {
					echo "Veuillez vous connecter pour louer un objet !";
				} 
			}
				?>
	</table>

</div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="./FeuilleJs.js"></script>

</body>
</html>
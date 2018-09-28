<!DOCTYPE html>
<html lang="en">
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/front/head.php'); ?>
<body style="height:1500px;background-color: rgb(249, 249, 249);">

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

$userid = getAuthUserId($conn);
$getPseudo = $_GET['pseudo'];

$req = $conn->query("SELECT * FROM user");
$users = getUser($req);

foreach($users as $user){
	if($user->pseudo == $getPseudo){
		$unuser = $user;
	}
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php') 
 ?>


<div class="container" style="margin-top:100px;">

	<div class="text-center">
		<h3><?php echo "Utilisateur : ".$unuser->pseudo?></h3>
		<br />
	</div>
	<table class="table table-bordered">
		<tr><td>Nom : <?php echo $unuser->nom; ?></td></tr>
		<tr><td>Prenom : <?php echo $unuser->prenom; ?></td></tr>

		<tr><td>Email : <?php echo $unuser->email; ?></td></tr>
		<tr><td>Téléphone : <?php echo '0'.$unuser->tel; ?></td></tr>

		<tr><td>Adresse : <?php echo $unuser->adresse; ?></td></tr>
		<tr><td>Ville : <?php echo $unuser->ville; ?></td></tr>

		<tr><td>Code Postal : <?php echo $unuser->cp; ?></td></tr>
		<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/userfile/auth/modalCo.php') ?>

</div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</body>
</html>


<?php
	include_once("user.php");
	include_once("userController.php");
	include_once('ConnexionBDD.php');
	$users = $conn->query("SELECT * FROM user");
?>

<div id="users">

	<p>Liste des utilisateurs</p>

	<table>
		<tr>
			<td>Pseudo</td>
			<td>Email</td>
		</tr>
		<?php
			foreach ($users as $user): 
		?> 
		<?php
			$oneUser = castToUser($user);
 ?>
			<tr>
				<td><?php echo $oneUser->pseudo ?></td>
				<td><?php echo $oneUser->email ?></td>
				<td><a href="./show_user.php?pseudo='<?php echo $oneUser->pseudo ?>'" class="button">Voir</a></td>
				<td><a href="#" class="button">Editer</a></td>
				<td><a href="#" class="button">Supprimer</a></td>
			</tr>
			<?php endforeach ?>
	</table>


</div>
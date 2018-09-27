<!doctype html>
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
?>

  <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php') ?>
    <div class="" <div class="container" style="margin-top:100px;">
		<?php 
			$users = $conn->query("SELECT * FROM user");
			$users = getUser($users);
		?>

    <?php 
    if (isset($_SESSION['userCo'])) {
      if($_SESSION['userCo']->admin)
      {
    ?>
		<table id="user" class="display">
		    <thead>
		        <tr>
		            <th>Id</th>
		            <th>Pseudo</th>
		            <th>Nom</th>
		            <th>Prénom</th>
		            <th>Email</th>
                <th>Téléphone</th>
		            <th>Adresse</th>
		            <th>Ville</th>
		            <th>Code postal</th>
		            <th>Admin</th>
		            <th>Mot de passe</th>
		            <th>Action</th>
		            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
				<?php foreach ($users as $user):
          ?> 
					<tr>
						<td><?php echo $user->id ?></td>
						<td><?php echo $user->pseudo ?></td>
						<td><?php echo $user->nom ?></td>
						<td><?php echo $user->prenom ?></td>
						<td><?php echo $user->email ?></td>
            <td>0<?php echo $user->tel ?></td>
						<td><?php echo $user->adresse ?></td>
						<td><?php echo $user->ville ?></td>
						<td><?php echo $user->cp ?></td>
						<td>
            <?php 
            if ($user->admin) 
              echo"Oui";
            else
              echo"Non";
            ?>
            </td>
						<td><?php echo $user->password ?></td>
						<td>
              <?php $objUser = serialize($user);
              echo"<form method='POST' action='http://localhost/Location/userfile/views/ModifUser.php'>
                <input type='hidden' name='user' value = '$objUser'/>
                <button type='submit' class='btn btn-outline-warning'><i class='fas fa-exchange-alt'></i> Modifier</button></td>
              </form>";?>
						<td>
            <?php $objUser = serialize($user);
            echo"<form method='POST' action='http://localhost/Location/userfile/actions/deleteUser.php'>
                <input type='hidden' name='user' value = '$objUser'/>
                <button class='btn btn-outline-danger' type='submit'><i class='fas fa-trash-alt'></i> Supprimer</button>
              </form>";?>
            </td>
					</tr>
				<?php endforeach ?>
		    </tbody>
		</table>  
	</div>
  <?php
}
  }
  else
    echo "veuillez vous co";
  ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="http://localhost/Location/front/FeuilleJs.js"></script>

  <script>
    $(document).ready(function() {
        $('#user').dataTable();
    } );
 </script>

  </body>
</html>
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
  if(isset($_POST['user']))
    $user = unserialize($_POST['user']);
  else
    $user = $_SESSION['userCo'];
 include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php') 
 ?>

<div class="container" style="margin-top:100px;">
  <h2>Informations personnelles</h2>
  <?php
  if (isset($_POST['user']))
    echo "<form action='http://localhost/Location/userfile/actions/edit_user.php' method='post'>";
  else
    echo "<form action='http://localhost/Location/userfile/actions/editProfil.php' method='post'>";
  ?>
    <div class="form-group">
      <label for="email">Pseudo:</label>
      <input type="text" class="form-control" name="pseudo" value="<?php echo $user->pseudo ?>" readonly>
    </div>
    <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" name="nom" value="<?php echo $user->nom ?>">
    </div>
    <div class="form-group">
      <label for="prenom">Prenom:</label>
      <input type="text" class="form-control" name="prenom" value="<?php echo $user->prenom ?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" name="email" value="<?php echo $user->email ?>" readonly>
    </div>
    <div class="form-group">
      <label for="tel">Tel:</label>
      <input type="text" class="form-control" name="tel" value="0<?php echo $user->tel ?>">
    </div>
    <div class="form-group">
      <label for="adresse">Adresse:</label>
      <input type="text" class="form-control" name="adresse" value="<?php echo $user->adresse ?>">
    </div>
    <div class="form-group">
      <label for="ville">Ville:</label>
      <input type="text" class="form-control" name="ville" value="<?php echo $user->ville ?>">
    </div>
    <div class="form-group">
      <label for="cp">Code postal:</label>
      <input type="text" class="form-control" name="cp" value="<?php echo $user->cp ?>">
    </div>
    <?php 
    if (isset($_POST['user'])) {
      echo"
      <div class='form-group'>
      	<label for='admin'>Admin:</label>
  		  <select name='admin' class='custom-select'>";
            if ($user->admin)
              echo "<option selected value='1'>Oui</option><option value='0'>Non</option>";
            else
              echo "<option selected value='0'>Non</option><option value='1'>Oui</option>";
        echo"</select>
      </div>";
    }
    else

    ?>
    <div class="form-group">
      <label for="password">Mot de passe:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password" value="<?php echo $user->password ?>">
    </div>
    <?php 
    if (isset($_POST['user']))
      echo"<a href='http://localhost/Location/userfile/views/admin.php' class='btn btn-primary float-left'><i class='fas fa-undo-alt'></i> Retour</a>";
    else
      echo"<a href='http://localhost/Location/Accueil.php' class='btn btn-primary float-left'><i class='fas fa-undo-alt'></i> Retour</a>";

    echo"<button type='submit' class='btn btn-primary float-right'><i class='fas fa-check'></i> Valider</button>";
    ?>
  </form>
</div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="http://localhost/Location/front/FeuilleJs.js"></script>

</body>
</html>
<?php
include_once("userController.php");

$user = unserialize($_POST['user']);

?>

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

<?php include_once('navbar.php') ?>

<div class="container">
  <h2>Informations personnelles</h2>
  <form action="./edit_user.php" method="post">
    <div class="form-group">
      <label for="email">Pseudo:</label>
      <input type="text" class="form-control" name="pseudo" value="<?php echo $user->pseudo ?>">
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
      <input type="email" class="form-control" name="email" value="<?php echo $user->email ?>">
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
    <div class="form-group">
      <label for="password">Mot de passe:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password" value="<?php echo $user->password ?>">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Valider</button>
  </form>
</div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="./FeuilleJs.js"></script>

</body>
</html>
<!-- 
<form action="./create_user.php" method="post">
  <fieldset>
    <legend>Personal information:</legend>
    Pseudo:<br>
    <input type="text" name="pseudo">
    <br><br>
    Nom:<br>
    <input type="text" name="nom">
    <br>
    Prénom:<br>
    <input type="text" name="prenom">
    <br><br>
    Email:<br>
    <input type="email" name="email">
    <br>
    Adresse:<br>
    <input type="text" name="adresse">
    <br><br>
    Ville:<br>
    <input type="text" name="ville">
    <br>
    Code postal:<br>
    <input type="number" name="cp">
    <br><br>
    Mot de passe:<br>
    <input type="password" name="password">
    <br>
    Confirmation:<br>
    <input type="password" name="password">
    <br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
 -->


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Création d'un nouvel utilisateur</title>
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

<div class="container" style="margin-top:100px;" onsubmit="return validate()">
  <h2>Nouvelle utilisateur</h2>
  <form action="./create_user.php" method="post">
    <div class="form-group">
      <label for="email">Pseudo:</label>
      <input type="text" class="form-control" name="pseudo" placeholder="Saisir le pseudo" required>
    </div>
    <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" name="nom" placeholder="Saisir le nom" required>
    </div>
    <div class="form-group">
      <label for="prenom">Prenom:</label>
      <input type="text" class="form-control" name="prenom" placeholder="Saisir le prenom" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" name="email" placeholder="Saisir l'email" required>
    </div>
    <div class="form-group">
      <label for="tel">Tel:</label>
      <input type="text" class="form-control" name="tel" placeholder="Saisir le numéro de téléphone" required>
    </div>
    <div class="form-group">
      <label for="adresse">Adresse:</label>
      <input type="text" class="form-control" name="adresse" placeholder="Saisir l'adresse" required>
    </div>
    <div class="form-group">
      <label for="ville">Ville:</label>
      <input type="text" class="form-control" name="ville" placeholder="Saisir la ville" required>
    </div>
    <div class="form-group">
      <label for="cp">Code postal:</label>
      <input type="text" class="form-control" name="cp" placeholder="Saisir le code postal" required>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe:</label>
      <input type="password" class="form-control" placeholder="Saisir le mot de passe" name="password" id="mdp" required>
    </div>
    <div class="form-group">
      <label for="password">Confirmation:</label>
      <input type="password" class="form-control" placeholder="Confirmer" name="password" id="confirmation" required>
    </div>
    <a href="./Accueil.php" class="btn btn-primary float-left"><i class="fas fa-undo-alt"></i> Retour</a>
    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i> Valider</button>
  </form>
</div>

<?php
  include_once('modalCo.php');
?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="./FeuilleJs.js"></script>

  <script>
      function validate()
      {
        var a = document.getElementById("mdp").value;
        var b = document.getElementById("confirmation").value;

        if (a == b) {
            return true;
        }
        else
            {
                alert("Les mots de passe ne correspondent pas !");
                return false;
            }
        }
  </script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/front/head.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');
 ?>
<body style="height:1500px;background-color: rgb(249, 249, 249);">
<?php

    $users = $conn->query("SELECT * FROM user");
    $users = getUser($users);

    if(session_id() == '' || !isset($_SESSION)) {
      {
        session_start();
      }
  }
 include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php') 
 ?>

<div class="container" style="margin-top:100px;" onsubmit="return validate()">
  <h2>Nouvel utilisateur</h2>
  <form action="http://localhost/Location/userfile/actions/create_user.php" method="post">
    <div class="form-group">
      <label for="pseudo">Pseudo:</label>
      <input id="pseudo" type="text" class="form-control" name="pseudo" placeholder="Saisir le pseudo" required>
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
      <input id="email" type="text" class="form-control" name="email" placeholder="Saisir l'email" required>
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
    <a href="http://localhost/Location/Accueil.php" class="btn btn-primary float-left"><i class="fas fa-undo-alt"></i> Retour</a>
    <button id="submit" type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i> Valider</button>
  </form>
</div>

<?php
  include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/userfile/auth/modalCo.php');
?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="http://localhost/Location/front/FeuilleJs.js"></script>

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
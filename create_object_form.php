<!-- <div id="form_create_object">
<p>Déposer un objet</p>
<form id="create_objet" action="./create_object.php" method="post">
  <fieldset>
    <legend>Object information:</legend>
    Nom:<br>
    <input id="nom" type="text" name="nom">
    <br>
    Catégorie:<br>
    <select id="typeobjet" name="typeobjet">
        <option value="pc_portable">Ordinateur portable</option>
        <option value="smartphone">Smartphone</option>
        <option value="tablette">Tablette</option>
    </select>
    <br>
    Image:<br>
    <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" />
    <br><br>
    Livraison possible:<br>
    <input type="checkbox" id="livraison" name="livraison" value="1" checked />
    <br>
    Commentaire:<br>
    <textarea id="commentaire" rows="10" cols="50" id="commentaire" name="commentaire"></textarea>
    <br>
    <input id="envoyer" type="submit" value="Submit">
  </fieldset>
</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="postjson.js"> </script>
</div> -->



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Création d'un nouvel objet</title>
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

<div class="container" style="margin-top:100px;">
  <h2>Nouvelle Objet</h2>
  <div id="form_create_object">
  <form id="create_objet" action="./create_object.php" method="post" enctype="multipart/form-data">
    <fieldset>
    <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Saisir le nom" required>
    </div>
    <div class="form-group">
        <label for="typeobjet">Catégorie:</label>
          <select id="typeobjet" name="typeobjet" class="custom-select">
            <option value="pc_portable">Ordinateur portable</option>
            <option value="smartphone">Smartphone</option>
            <option value="tablette">Tablette</option>
          </select>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <div class="custom-file">
            <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" />
            <label class="custom-file-label" for="image">Choisir l'image</label>
        </div>
    </div>
    <div class="form-group">
      <label for="prix">Prix:</label>
      <input type="number" class="form-control" id="prix" name="prix" placeholder="Saisir le prix par mois" required>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="livraison" name="livraison" value="1">
          <label class="custom-control-label" for="livraison">Livraison possible ?</label>
        </div>  
    </div>  
    <div class="form-group">
        <label for="commentaire">Commentaire</label>
        <textarea class="form-control" id="commentaire" name="commentaire"  rows="10" cols="50"></textarea>
    </div>


    <a href="./Accueil.php" class="btn btn-primary float-left"><i class="fas fa-undo-alt"></i> Retour</a>
    <button name="ok" type="submit" value="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i> Valider</button>
  </fieldset>
  </form>
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script type="text/javascript" src="postjson.js"> </script> -->
</div>
</div>



   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script type="text/javascript" src="./FeuilleJs.js"></script>

          <script>
            $('#image').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>

</body>
</html>
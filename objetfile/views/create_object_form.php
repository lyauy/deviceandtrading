<!DOCTYPE html>
<html lang="en">
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/front/head.php'); ?>
<body style="height:1500px;background-color: rgb(249, 249, 249);">
<?php 
    include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');
    if(session_id() == '' || !isset($_SESSION)) {
      {
        session_start();
      }
  }
 include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php') 
 ?>

<div class="container" style="margin-top:100px;">
  <h2>Nouvel Objet</h2>
  <div id="form_create_object">
  <form id="create_objet" action="http://localhost/Location/objetfile/actions/create_object.php" method="post" enctype="multipart/form-data">
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
            <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" / required>
            <label class="custom-file-label" for="image">Choisir l'image</label>
        </div>
    </div>
    <div class="form-group">
      <label for="prix">Prix <i class="fas fa-euro-sign"></i> (au mois):</label>
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


    <a href="http://localhost/Location/Accueil.php" class="btn btn-primary float-left"><i class="fas fa-undo-alt"></i> Retour</a>
    <button name="ok" type="submit" value="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i> Valider</button>
  </fieldset>
  </form>
</div>
</div>



   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script type="text/javascript" src="http://localhost/Location/front/FeuilleJs.js"></script>

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
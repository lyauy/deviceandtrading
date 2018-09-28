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
 $objid = $_GET['id_objet'];
 var_dump($objid);
 $req = $conn->query("SELECT * FROM objet");
 $objets = getObjet($req);

 foreach ($objets as $objet){
  if($objet->id_objet == $objid)
      $objetSelect = $objet;
 }
/* $objetSelect = unserialize($_POST['obj']);
 var_dump($objetSelect);*/
 include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php') 
 ?>

<div class="container" style="margin-top:100px;">
    <div class="text-center">
      <h3><?php echo $objetSelect->typeobjet." n°".$objetSelect->id_objet?></h3>
      <br />
      <?php echo "<img src='http://localhost/Location/images/".$objetSelect->image."' width='300' height='300'  />"; ?><br/><br/>
    </div>

<form action='http://localhost/Location/objetfile/actions/edit_objet.php' method='post'>
    <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" name="nom" value="<?php echo $objetSelect->nom ?>" required>
    </div>
    <div class="form-group">
        <label for="typeobjet">Catégorie:</label>
          <select id="typeobjet" name="typeobjet" class="custom-select">
            <?php if ($objetSelect->typeobjet = "tablette") {
              echo "<option value='pc_portable'>Ordinateur portable</option>
              <option value='smartphone'>Smartphone</option>
              <option value='tablette' selected='selected'>Tablette</option>";
            }
            elseif ($objetSelect->typeobjet = "pc_portable") {
              echo "<option value='pc_portable' selected='selected'>Ordinateur portable</option>
              <option value='smartphone'>Smartphone</option>
              <option value='tablette'>Tablette</option>";
            }
            else
            {
              echo "<option value='pc_portable'>Ordinateur portable</option>
              <option value='smartphone' selected='selected'>Smartphone</option>
              <option value='tablette'>Tablette</option>";
            }

            ?>
          </select>
    </div>
    <div class="form-group">
      <label for="prix">Prix <i class="fas fa-euro-sign"></i> (au mois):</label>
      <input type="number" class="form-control" id="prix" name="prix" placeholder="Saisir le prix par mois" value="<?php echo $objetSelect->prix ?>" required>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox">
          <?php
            if ($objetSelect->livraison)
              echo "<input checked='checked' type='checkbox' class='custom-control-input' id='livraison' name='livraison' value='1'>";
            else
              echo "<input type='checkbox' class='custom-control-input' id='livraison' name='livraison' value='1'>";
          ?>
          <label class="custom-control-label" for="livraison">Livraison possible ?</label>
        </div>  
    </div>  
    <div class="form-group">
        <label for="commentaire">Commentaire</label>
        <textarea class="form-control" id="commentaire" name="commentaire"  rows="10" cols="50"><?php echo $objetSelect->commentaire ?></textarea>
    </div>

      <input type='hidden' name='objSeria' value = <?php echo $objetSelect->id_objet ?>/>

      <?php 
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
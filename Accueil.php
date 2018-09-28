<!DOCTYPE html>
<html lang="en">
<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/front/head.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');
  ?>
<body style="height:1500px;background-color: rgb(249, 249, 249);">
<?php 

    if(session_id() == '' || !isset($_SESSION))
      {
        session_start();
      }

    $objets = $conn->query("SELECT * FROM objet ORDER BY id_objet DESC");
    $objets = getObjet($objets)
  
?>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php') ?>

<div class="container" style="margin-top:100px;">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://localhost/Location/image_site/display1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Locations entre particuliers</h5>
                    <p>Smartphones, Tablettes et PC portables échangés en quelques clics...</p>
                  </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://localhost/Location/image_site/display2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Louez votre appareil en ligne !</h5>
                    <p>Découvrez les objets déposés par nos utilisateurs...</p>
                  </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://localhost/Location/image_site/display3.jpg" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Déposez votre appareil</h5>
                    <p>Les utilisateurs peuvent louer ce que vous déposez.</p>
                  </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br><br><br><hr><br><br><br>
    <h2 align="center"> Les dernières nouveautés </h2><br><br><br><br>
      <div class="col-lg-9" style="margin-left:12.5%;">
        <div class="row">
        <?php foreach ($objets as $objet) {
                    echo "            
                    <div class='col-lg-4 col-md-6 mb-4'>
                      <div class='card h-100'>
                        <a href='http://localhost/Location/objetfile/views/show_object.php?id_objet=$objet->id_objet'><img height='250' class='card-img-top' src='http://localhost/Location/images/$objet->image'></a>
                        <div class='card-body text-center'>
                          <h4 class='card-title'>
                          $objet->nom
                          </h4>
                          <h5>$objet->prix € / mois</h5>
                          <hr>";
                          if ($objet->commentaire == '')
                          echo"<p class='card-text reducetext'><em>Aucun commentaire</em></p>
                        </div>
                      </div>
                    </div>";
                          else
                          echo"<p class='card-text reducetext'><em>$objet->commentaire</em></p>
                        </div>
                      </div>
                    </div>";
                    } ?>
        </div>
      </div>

<?php
  include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/userfile/auth/modalCo.php');
?>
</div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://localhost/Location/front/FeuilleJs.js"></script>

</body>
</html>
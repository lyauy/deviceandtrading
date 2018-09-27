<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./FeuilleStyle.css">

</head>
<body style="height:1500px;background-color: rgb(249, 249, 249);">
<?php 
    include_once("objetController.php");
    include_once('user.php');
    if(session_id() == '' || !isset($_SESSION))
      {
        session_start();
      }

    $objets = $conn->query("SELECT * FROM objet ORDER BY id_objet DESC");
    $objets = getObjet($objets)
  
?>

<?php include_once('navbar.php') ?>

<div class="container" style="margin-top:350px;">

  <h3>
    <p>
      Liste des dernières nouveautés :
    </p>
  </h3>
  <div class="row"> 
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
          <?php 
              $i = 1; 
              foreach ($objets as $objet) {

                if ($i == 1) {
                  echo '<div class="carousel-item col-md-3 active">
                    <img class="imgSlide mx-auto d-block" src="./images/'.$objet->image.'"  alt="slide '.$i.'"><a href="./show_object.php?id_objet='.$objet->id_objet.'">'.$objet->nom.'</a><p>'.$objet->prix.'€/mois </p>
                  </div>';
                }
                else {
                  echo '<div class="carousel-item col-md-3">
                    <img class="imgSlide mx-auto d-block" src="./images/'.$objet->image.'"  alt="slide '.$i.'"><a href="./show_object.php?id_objet='.$objet->id_objet.'">'.$objet->nom.'</a><p>'.$objet->prix.'€/mois </p>
                  </div>';
                }
                $i++;
              }
          ?>
          <div class="carousel-item col-md-3">
                <img class="imgSlide mx-auto d-block" src="//placehold.it/600x400?text=3" alt="slide 3">
            </div>
            <div class="carousel-item col-md-3">
                <img class="imgSlide mx-auto d-block" src="//placehold.it/600x400?text=4" alt="slide 4" width="500" height="600">
            </div>
            <div class="carousel-item col-md-3">
                <img class="imgSlide mx-auto d-block" src="//placehold.it/600x400?text=5" alt="slide 5" width="500" height="600">
            </div>
            <div class="carousel-item col-md-3">
                <img class="imgSlide mx-auto d-block" src="//placehold.it/600x400?text=6" alt="slide 6" width="500" height="600">
            </div>
            <!--<div class="carousel-item col-md-3 active">
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400/000/fff?text=1" alt="slide 1">
            </div>
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=2" alt="slide 2">
            </div>
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=3" alt="slide 3">
            </div>
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=4" alt="slide 4">
            </div>
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=5" alt="slide 5">
            </div>
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=6" alt="slide 6">
            </div>
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=7" alt="slide 7">
            </div>
            <div class="carousel-item col-md-3">
<<<<<<< HEAD
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=8" alt="slide 7">
            </div>-->
<!--                 <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=8" alt="slide 8">
              <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=8" alt="slide 8">
>>>>>>> d4b39ed405e84dd756b506021bd31c52794a4b73
            </div> -->

        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <i class="fas fa-chevron-left fa-3x"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
          <i class="fas fa-chevron-right fa-3x"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
  </div>
<?php
  include_once('modalCo.php');
?>
</div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="./FeuilleJs.js"></script>

</body>
</html>
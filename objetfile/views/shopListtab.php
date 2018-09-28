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

      $sth = $conn->query("SELECT * FROM objet");
      $sth->setFetchMode(PDO::FETCH_CLASS, 'objet');
      $objets = $sth->fetchall();
  }
 include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php');
 ?>

   <!-- Page Content -->
    <div class="container" style="margin-top:100px;">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Locations</h1>
          <div class="list-group">
            <a href="http://localhost/Location/objetfile/views/shopList.php" class="list-group-item">Tout</a>
            <a href="http://localhost/Location/objetfile/views/shopListpc.php" class="list-group-item">Ordinateur portable</a>
            <a href="http://localhost/Location/objetfile/views/shopListtab.php" class="list-group-item">Tablette</a>
            <a href="http://localhost/Location/objetfile/views/shopListsmartphone.php" class="list-group-item">Smartphone</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://localhost/Location/image_site/tab.jpg" alt="First slide">
              </div>
            </div>
          </div>

          <div class="row">

<!--             echo '<div class="carousel-item col-md-3 active">
                    <img class="imgSlide mx-auto d-block" src="./images/'.$objet->image.'"  alt="slide '.$i.'"><a href="./show_object.php?id_objet='.$objet->id_objet.'">'.$objet->nom.'</a><p>'.$objet->prix.'€/mois </p>
                  </div>'; -->


            <?php foreach ($objets as $objet) {
              if($objet->typeobjet == 'tablette') {
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
              }
            } ?>

          </div>

        </div>

      </div>

    </div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/userfile/auth/modalCo.php'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
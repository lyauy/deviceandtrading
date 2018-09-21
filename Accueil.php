<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
?>
<nav class="navbar navbar-expand-md bg-white navbar-white">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <a class="navbar-nav mx-auto nav-link" href="./Accueil.php">NomWebSite</a>
    </div>
    <div class="mx-auto order-0">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="//codeply.com">Codeply</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
               <?php 
                  if(isset($_SESSION['userCo'])) {
                    echo "<a href='create_object_form.php' id='object' class='nav-link'>Louer</a>";
                  }
                ?>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                  <?php
                  if(!isset($_SESSION['userCo']))
                    {?><button class="BtnToA nav-link" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fas fa-user"></i> Se connecter</button> <?php }
                  elseif(isset($_SESSION['userCo'])) {
                    /*echo "<a href='logout.php' id='Deconnexion' class='nav-link'><i class='fas fa-sign-out-alt'></i> Se déconnecter</a>";*/
                    ?>
                  <div class="dropdown">
                    <button class="BtnToA dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?php echo $_SESSION['userCo']->nom." ".$_SESSION['userCo']->prenom; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#"><i class="fas fa-user-cog fa-fw"></i> Modifier mon profil</a>

                    <?php
                    if($_SESSION['userCo']->admin)
                      echo "<a href='./admin.php' class='dropdown-item'><i class='fas fa-unlock-alt fa-fw'></i> Administration</a>";
                    ?>
                      <a href='logout.php' id='Deconnexion' class='dropdown-item'><i class='fas fa-sign-out-alt fa-fw'></i> Se déconnecter</a>
                    </div>
                  </div>

                    <?php
                  }
                  ?>

            </li>
<!--             <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li> -->
        </ul>
    </div>
</nav>

<div class="container" style="margin-top:350px;">

  <h3>
    <p>
      Liste des dernières nouveautés :
    </p>
  </h3>
  <div class="row"> 
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-md-3 active">
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
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=8" alt="slide 7">
            </div>
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

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="./action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Adresse E-mail</b></label>
      <input type="text" placeholder="Entrez votre adresse Email" name="email" required>

      <label for="psw"><b>Mot de passe</b></label>
      <input type="password" placeholder="Entrez votre mot de passe" name="password" required>
  
      <button class="button" type="submit">Se connecter</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Se rappeler de moi
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="button cancelbtn">Cancel</button>
      <span class="psw"><a href="./create_user_form.php">S'inscrire</a> / <a href="#">Mot de passe oublié ?</a></span>
    </div>
  </form>
</div>

</div>

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="./FeuilleJs.js"></script>
<!--   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
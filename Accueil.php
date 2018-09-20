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
    if(session_id() == '' || !isset($_SESSION)) {
      {include_once('user.php');
      session_start();}
  }
?>
<nav class="navbar navbar-expand-md bg-white navbar-white">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <a class="navbar-nav mx-auto nav-link" href="#">NomWebSite</a>
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
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                  <?php
                  if(!isset($_SESSION['userCo']))
                    {?><button class="BtnToA nav-link" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fas fa-user"></i> Se connecter</button> <?php }
                  elseif(isset($_SESSION['userCo'])) {
                    echo "<a href='logout.php' id='Deconnexion' class='nav-link'><i class='fas fa-sign-out-alt'></i> Se déconnecter</a>";
                  }
                  ?>

            </li>
<!--             <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li> -->
        </ul>
    </div>
</nav>


<div class="container" style="margin-top:50px;">

  <h3><!-- Vous êtes connecté en tant que : -->
<!--     echo $_SESSION['userCo']->nom." ". $_SESSION['userCo']->prenom;  -->
    <?php 
      if (isset($_SESSION['userCo'])) {
        echo "Vous êtes connecté en tant que : ".$_SESSION['userCo']->nom." ".$_SESSION['userCo']->prenom;
      }
      else
        echo "Vous n'êtes pas connecté."
    ?>
  </h3>
  <div class="row">
<!--     <div class="col-md-4">
      <p>
       <?php
        /*var_dump($_SESSION['userCo']);*/
       ?>
      </p>   
    </div> -->
<!--     <div class="col-md-4"> 
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
    </div>
    <div class="col-md-4"> 
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p> 
    </div> -->
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
      <span class="psw"><a href="#">S'inscrire</a> / <a href="#">Mot de passe oublié ?</a></span>
    </div>
  </form>
</div>

</div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="./FeuilleJs.js"></script>

</body>
</html>

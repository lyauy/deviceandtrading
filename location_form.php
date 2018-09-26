<?php
include_once('ConnexionBDD.php');
include_once('user.php');
include_once("userController.php");
include_once('location.php');
include_once("locationController.php");
include_once('objet.php');
include_once("objetController.php");

$userid = getAuthUserId($conn); 
if(isset($_SESSION)){

    $req2 = $conn->query("SELECT * FROM user WHERE id=$userid");
    $user = getUser($req2);
    var_dump($user);
}

$objid = $_GET['id_objet'];
$req = $conn->query("SELECT * FROM objet");
$objets = getObjet($req);

foreach ($objets as $objet){
    if ($objet->id_objet == $objid) {
        $unobjet = $objet;
    }
}

var_dump($unobjet);

$req3 = $conn->query("SELECT * FROM user");
$users = getUser($req3);

foreach ($users as $user){
    if ($user->id == $unobjet->id_user) {
        $unuser = $user;
    }
}

var_dump($unuser);
?>



<div id="form_location_objet">
<p>Louer </p>
<form action="./create_location.php?id_objet='<?php echo $objid ?>'" method="post">
  <fieldset>
    <legend>Choisissez le début et la fin de votre location:</legend>
    Début de location:
    <input type="date" name="debutloc">
    <br>
    Fin de location:
    <input type="date" name="finloc">
    <br>
    <input type="submit" value="Submit">
  </fieldset>
</form>

</div>
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

$xobjid = $_GET['id_objet'];
$objid = trim($xobjid,"'.");
var_dump($objid);
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
    <input id="debutloc" type="date" name="debutloc" max='2000-13-13' value="" onclick="this.value" onkeypress="this.value">
    <br>
    Fin de location:
    <input id="finloc" type="date" name="finloc" max='2000-13-13' value="" onclick="this.value" onkeypress="this.value">
    <br>
    Prix total:
    <input id="total" type="number" name="total" value="total" readonly>€
    <br>
    <input type="submit" value="Submit">
  </fieldset>
</form>

</div>

<script type="text/javascript">

    var prixjour = '<?php echo $unobjet->prix / 31 ?>';
    var daysxprixjour;

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

     if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;

    document.getElementById("debutloc").setAttribute("min", today);
    document.getElementById("finloc").setAttribute("min", today);

    document.getElementById("debutloc").value = today;
    document.getElementById("finloc").value = today;

    debutloc = document.getElementById("debutloc");
    finloc = document.getElementById("finloc");

    function parseDate(input) {
        
      var parts = input.match(/(\d+)/g);
      // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
      return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
    }

    debutloc.onclick = function(date) {
        calculatedateprix();
    }

    finloc.onclick = function(date) {

       calculatedateprix();
    }

    debut.onkeypress = function(date) {

       calculatedateprix();
    }

    finloc.onkeypress = function(date) {

       calculatedateprix();
    }

    
    function calculatedateprix() {

        var datex = document.querySelector('#debutloc').value;
        var datey = document.querySelector('#finloc').value;
        console.log(datex, 'DATEX', datey, 'DAETY')
        if(datex < datey){

        var timeDiff = Math.abs(parseDate(datey) - parseDate(datex));
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

        daysxprixjour = Math.round((prixjour * diffDays) * 100) / 100;

        } else {

            daysxprixjour = 0;
        }
        
            document.getElementById('total').value = daysxprixjour;
    }




</script>
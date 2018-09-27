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
       $userid = getAuthUserId($conn); 
        if(isset($_SESSION)){
             $req2 = $conn->query("SELECT * FROM user WHERE id=$userid");
            $user = getUser($req2);
        }
         $xobjid = $_GET['id_objet'];
        $objid = trim($xobjid,"'.");
        $req = $conn->query("SELECT * FROM objet");
        $objets = getObjet($req);
         foreach ($objets as $objet){
            if ($objet->id_objet == $objid) {
                $unobjet = $objet;
            }
        }
         $req3 = $conn->query("SELECT * FROM user");
        $users = getUser($req3);
         foreach ($users as $user){
            if ($user->id == $unobjet->id_user) {
                $unuser = $user;
            }
        }
   }
 include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/navbar.php');
 ?>
    <!-- Page Content -->
    <div class="container" style="margin-top:100px;">
        <h2><center>Choisissez le début et la fin de votre location</center></h2>
        <div id="form_location_objet">
            <form action="http://localhost/Location/locationfile/actions/create_location.php?id_objet='<?php echo $objid ?>'" method="post">
                <div class="form-group">
                  <label for="debutloc">Début de location:</label>
                  <input id="debutloc" class="form-control" type="date" name="debutloc" max='2000-13-13' value="" onclick="this.value" onkeypress="this.value">
                </div>
                <div class="form-group">
                  <label for="finloc">fin de location:</label>
                  <input id="finloc" class="form-control" type="date" name="finloc" max='2000-13-13' value="" onclick="this.value" onkeypress="this.value">
                </div>
                <div class="form-group">
                  <label for="total">Prix total (en €): </label>
                  <input id="total" class="form-control" type="number" name="total" value="total" readonly>
                </div>
                <button type='submit' class='btn btn-primary float-right'><i class='fas fa-check'></i> Valider</button>
            </form>
        </div>
    </div>
     <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/userfile/auth/modalCo.php'); ?>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
</body>
</html> 
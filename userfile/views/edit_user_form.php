<!-- <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

$getPseudo = $_GET['pseudo'];
$req = $conn->query("SELECT * FROM user WHERE pseudo = '$getPseudo'");
$user = getUser($req);

?>

<div id="form_edit_user">

<p>Editer un utilisateur</p>

<form action="./edit_user.php" method="post">
  <fieldset>
    <legend>Personal information:</legend>
    Pseudo:<br>
    <input type="text" name="pseudo" value="<?php echo $user->pseudo ?>">
    <br>
    Nom:<br>
    <input type="text" name="nom" value="<?php echo $user->nom ?>">
    <br>
    Prénom:<br>
    <input type="text" name="prenom" value="<?php echo $user->prenom ?>">
    <br><br>
    Email:<br>
    <input type="email" name="email" value="<?php echo $user->email ?>" readonly>
    <br>
    Adresse:<br>
    <input type="text" name="adresse" value="<?php echo $user->adresse ?>">
    <br><br>
    Ville:<br>
    <input type="text" name="ville" value="<?php echo $user->ville ?>">
    <br><br>
    Code postal:<br>
    <input type="number" name="cp" value="<?php echo $user->cp ?>">
    <br>
    Mot de passe:<br>
    <input type="password" name="password" value="<?php echo $user->password ?>">
    <br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>

</div> -->
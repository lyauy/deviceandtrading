<?php
include_once('ConnexionBDD.php');
include_once('user.php');
include_once("userController.php");

$getPseudo = $_GET['pseudo'];
$req = $conn->query("SELECT * FROM user WHERE pseudo = $getPseudo");
$user = getUser($req);

?>



<div id="user">

<p>Liste des utilisateurs</p>

<?php var_dump($user); ?>
<td><a href="./edit_user_form.php?pseudo='<?php echo $user->pseudo ?>'" class="button">Editer</a></td>

</div>
<?php
include_once('ConnexionBDD.php');
include_once('user.php');
include_once("userController.php");
$userid = getAuthUserId($conn);
$getPseudo = $_GET['pseudo'];
var_dump($getPseudo);
$req = $conn->query("SELECT * FROM user");
$users = getUser($req);

foreach($users as $user){
	if($user->pseudo == $getPseudo){
		$unuser = $user;
	}
}
?>



<div id="user">

<p>Liste des utilisateurs</p>

<?php var_dump($unuser);
var_dump($userid[0]);
if($userid[0] == $unuser->id){
	echo '<td><a href="./edit_user_form.php?pseudo=$unuser->pseudo" class="button">Editer</a></td>';
}

?>
</div>
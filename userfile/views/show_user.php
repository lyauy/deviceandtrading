<!-- <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

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
var_dump($userid);
if($userid == $unuser->id){
	echo '<td><a href="http://localhost/Location/userfile/views/edit_user_form.php?pseudo='.$unuser->pseudo.'" class="button">Editer</a></td>';
}

?>
</div> -->
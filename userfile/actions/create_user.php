<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

$userEmail = $_POST['email'];
$userPseudo = $_POST['pseudo'];

$req = $conn->query("SELECT * FROM user");
$users = getUser($req);
$check = true;

foreach ($users as $user) {
	var_dump($check);
	if($user->email == $userEmail || $user->pseudo == $userPseudo) {
		$check = false;
	}
}
if($check) {
	createUser($conn);
	session_start();

}
else {

	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Utilisateur ou mot de passe incorrect !');
    window.location.href=' http://localhost/Location/userfile/views/create_user_form.php';
    </script>");
}

?>
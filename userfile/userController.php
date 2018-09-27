<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

function redirectUser()
{
	header("Location: ./show_user_list.php");
	die();
}

function getAuthUserId ($conn) {

	  if(session_id() == '' || !isset($_SESSION))
      {
        session_start();
      }

	$useremail = $_SESSION['userCo']->email;
	$req = $conn->query("SELECT id FROM user WHERE email = '$useremail'");
	$userid = $req->fetch();
	return $userid[0];
}

function getUser ($sth) {

	$sth->setFetchMode(PDO::FETCH_CLASS, 'User');
	$users = $sth->fetchall();
	return $users;
}

function createUser($conn) {

	$newUser = new User($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], 0, $_POST['password']);
	$newUser->userToDB($conn);
	header("Location: http://localhost/Location/Accueil.php");
}

function editUser($conn) {

	$newUser = new User($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['admin'], $_POST['password']);
	$newUser->saveToDB($conn);
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='http://localhost/Location/Accueil.php';
    </script>");
    header("Location: http://localhost/Location/userfile/views/admin.php");
}

function DeleteUser($user){
	header("Location: http://localhost/Location/Accueil");
	die();
}
?>


<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');
	$user = unserialize($_POST['user']);

	$req = $conn->exec("DELETE FROM user WHERE email = '$user->email'");
	header("location: http://localhost/Location/userfile/views/admin.php"); 
?>
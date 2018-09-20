<?php
include_once('ConnexionBDD.php');
include_once('user.php');


function getUser () {

	$oneUser = $conn->query("SELECT * FROM user WHERE pseudo = ");

}

function castToUser ($user) {

	if (!$user instanceof User) {

		$qsd = new User($user[1], $user[2], $user[3], $user[4], $user[5], $user[6], $user[7], $user[8], $user[9]);
		return $qsd;
	}
}
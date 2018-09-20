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

include('user.php');

/*$test = new User();
var_dump($test);*/

$sth = $conn->query("SELECT * FROM user");
$sth->setFetchMode(PDO::FETCH_CLASS, 'User');
$user = $sth->fetch();

var_dump($user);

/*castToUser($test);

function castToUser ($user)
{
	if(is_object($user) && !$user instanceof User)
	{
		echo ("Objet");
		foreach ($user as $userP)
		{
		    
		}
	}
	else
	{
		echo ("Non objet");
	}
}*/

?>


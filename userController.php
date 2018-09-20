<?php

include_once('ConnexionBDD.php');
include_once('user.php');

$test = new User('t', 't', 't', 't', 't', 't', 95242, 0, 'rvge');
var_dump($test);


/*var_dump($user);*/

function getUser ($sth) {

	$sth->setFetchMode(PDO::FETCH_CLASS, 'User');
	$user = $sth->fetch();
	return $user;
}


/*$test = new User();
var_dump($test);*/
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


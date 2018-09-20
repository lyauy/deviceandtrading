<?php

include_once('ConnexionBDD.php');
include_once('user.php');


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


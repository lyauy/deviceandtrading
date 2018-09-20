<?php
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
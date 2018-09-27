<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

function redirectObjet()
{
	header("Location: http://localhost/Location/Accueil.php");
	die();
}

function getObjet ($sth) {

	$sth->setFetchMode(PDO::FETCH_CLASS, 'Objet');
	$objets = $sth->fetchall();
	return $objets;
}

?>

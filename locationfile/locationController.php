<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

function getLocation ($sth) {

	$sth->setFetchMode(PDO::FETCH_CLASS, 'Location');
	$locations = $sth->fetchall();
	return $locations;
}
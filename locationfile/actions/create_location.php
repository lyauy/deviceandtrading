<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

$userid = getAuthUserId($conn);
$zobjid = $_GET['id_objet'];
$objid = trim($zobjid,"'");

$newLocation = new Location(null, $objid, $userid, $_POST['debutloc'], $_POST['finloc'], $_POST['total']);

$req = $conn->exec("UPDATE objet SET disponibilite = 0 WHERE id_objet = $objid");
$newLocation->locToDB($conn);
header("Location: http://localhost/Location/Accueil.php");
die();
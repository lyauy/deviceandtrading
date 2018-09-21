<?php 

include_once('objet.php');

$test = new Objet(2, "mdr", "eagregege", 1, 1, 20, 1, "defze", 35);
var_dump($test);

$test->objetToDB($conn);

$sth = $conn->query("SELECT * FROM objet");
$sth->setFetchMode(PDO::FETCH_CLASS, 'Objet');
$objets = $sth->fetch();

echo $objets->nom;

var_dump($objets);

?>
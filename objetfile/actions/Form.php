<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

$test = new Objet(2, "mdr", "eagregege", 1, 1, 20, 1, "defze", 35);

$test->objetToDB($conn);

$sth = $conn->query("SELECT * FROM objet");
$sth->setFetchMode(PDO::FETCH_CLASS, 'Objet');
$objets = $sth->fetch();

echo $objets->nom;

?>
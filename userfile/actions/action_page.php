<?php

session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');


$email = $_POST["email"];
$password = $_POST["password"];


$sth = $conn->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");
$sth->setFetchMode(PDO::FETCH_CLASS, 'User');
$user = $sth->fetch();

if($user)
{
  $_SESSION['userCo'] = $user;
  header('Location: http://localhost/Location/Accueil.php');
}
else {

  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Utilisateur ou mot de passe incorrect !');
    window.location.href=' http://localhost/Location/Accueil.php';
    </script>");


}

?>
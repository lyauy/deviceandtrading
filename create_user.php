<?php
include("ConnexionBDD.php");
include("user.php");
include("userController.php");

createUser($conn);
session_start();

?>
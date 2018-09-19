<?php
include_once('ConnexionBDD.php');

class User {
	
	var $id;
	var $pseudo;
	var $nom;
	var $prenom;
	var $email;
	var $adresse;
	var $ville;
	var $cp;
	var $admin;
	var $password;

	function __construct($Ppseudo, $Pnom, $Pprenom, $Pemail, $Padresse, $Pville, $Pcp, $Padmin, $Ppassword) {
		$this->pseudo = $Ppseudo;
		$this->nom = $Pnom;
		$this->prenom = $Pprenom;
		$this->email = $Pemail;
		$this->adresse = $Padresse;
		$this->ville = $Pville;
		$this->cp = $Pcp;
		$this->admin = $Padmin;
		$this->password = $Ppassword;	
	}
<<<<<<< HEAD
	public function userToDB($conn)
=======

	public function redirectUser($user)
	{

		header("Location: ./show_user_list.php");
		die();
	}

	public function createUser($conn)
>>>>>>> b879981ae43be79988df90f37c5a2a902c270b3c
	{
		$req = $conn->exec("INSERT INTO user(pseudo, nom, prenom, email, adresse, ville, cp, admin, password) 
			VALUES('$this->pseudo', '$this->nom', '$this->prenom', '$this->email', '$this->adresse', '$this->ville', '$this->cp', '$this->admin', '$this->password')");
	}
	public function SaveToDB($conn)
	{
		$req = $conn->exec("UPDATE user SET pseudo = '$this->pseudo', nom = '$this->nom', prenom = '$this->prenom', email = '$this->email', adresse = '$this->adresse', ville = '$this->ville', cp = '$this->cp', admin = '$this->admin', password = '$this->password')");
	}
	public function deleteUser($conn) 
	{
		echo $this->email;
		$req = $conn->exec("DELETE FROM user WHERE email = '$this->email'");
		var_dump($req);
	}
	
}

?>
<?php
include_once('ConnexionBDD.php');

class User {
	
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

	public function redirectUser()
	{
	
	  echo var_dump($this);
	}

	public function createUser($conn)
	{
		$req = $conn->exec("INSERT INTO user(pseudo, nom, prenom, email, adresse, ville, cp, admin, password) 
			VALUES('$this->pseudo', '$this->nom', '$this->prenom', '$this->email', '$this->adresse', '$this->ville', '$this->cp', '$this->admin', '$this->password')");
	}

	public function deleteUser($conn) 
	{
		echo $this->email;
		$req = $conn->exec("DELETE FROM user WHERE email = '$this->email'");
		var_dump($req);
	}

}

?>
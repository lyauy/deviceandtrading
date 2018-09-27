<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/ConnexionBDD.php');

class User {
	
	var $pseudo;
	var $nom;
	var $prenom;
	var $email;
	var $tel;
	var $adresse;
	var $ville;
	var $cp;
	var $admin;
	var $password;

	function __construct() {

        $argv = func_get_args();
        if (func_num_args() == 10) 
        {
        	self::__construct2( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9] );
        }
        else
        {
        	self::__construct1();
        }
    }

    function __construct1() {	
	}

	function __construct2($Ppseudo, $Pnom, $Pprenom, $Pemail, $Ptel, $Padresse, $Pville, $Pcp, $Padmin, $Ppassword) {

		$this->pseudo = $Ppseudo;
		$this->nom = $Pnom;
		$this->prenom = $Pprenom;
		$this->email = $Pemail;
		$this->tel = $Ptel;
		$this->adresse = $Padresse;
		$this->ville = $Pville;
		$this->cp = $Pcp;
		$this->admin = $Padmin;
		$this->password = $Ppassword;	
	}


	public function userToDB($conn)
	{
		$req = $conn->exec("INSERT INTO user(pseudo, nom, prenom, email, tel, adresse, ville, cp, admin, password) 
			VALUES('$this->pseudo', '$this->nom', '$this->prenom', '$this->email', '$this->tel', '$this->adresse', '$this->ville', '$this->cp', '$this->admin', '$this->password')");
	}

	public function saveToDB($conn)
	{
		$req = $conn->exec("UPDATE user SET pseudo = '$this->pseudo', nom = '$this->nom', prenom = '$this->prenom', email = '$this->email', tel = '$this->tel', adresse = '$this->adresse', ville = '$this->ville', cp = '$this->cp', admin = '$this->admin', password = '$this->password' WHERE email = '$this->email'");
	}

	public function deleteUser($conn) 
	{
		echo $this->email;
		$req = $conn->exec("DELETE FROM user WHERE email = '$this->email'");
	}
	
}


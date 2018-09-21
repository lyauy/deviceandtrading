<?php
include_once('ConnexionBDD.php');

class Objet {

	var $id_objet;
	var $nom;
	var $typeobjet;
	var $image;
	var $disponibilite;
	var $livraison;
	var $nombre;
	var $commentaire;
	var $id_user;

	function __construct()
	{
        $argv = func_get_args();
        if (func_num_args() == 9) 
        {
        	self::__construct2( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8] );
        }
        else
        {
        	self::__construct1();
        }
	}

    function __construct1() {	

/*		$this->id_objet = null;
		$this->nom = $Pnom;
		$this->image = $Pimage;
		$this->disponibilite = $Pdisponibilite;
		$this->livraison = $Plivraison;
		$this->nombre = $Pnombre;
		$this->commentaire = $Pcommentaire;
		$this->id_user = $Pid_user;
		$this->typeobjet = $Ptypeobjet;*/
	}

	function __construct2($Pid_objet, $Pnom, $Ptypeobjet, $Pimage, $Pdisponibilite, $Plivraison, $Pnombre, $Pcommentaire, $Pid_user) {

		$this->id_objet = $Pid_objet;
		$this->nom = $Pnom;
		$this->typeobjet = $Ptypeobjet;
		$this->image = $Pimage;
		$this->disponibilite = $Pdisponibilite;
		$this->livraison = $Plivraison;
		$this->nombre = $Pnombre;
		$this->commentaire = $Pcommentaire;
		$this->id_user = $Pid_user;

	}

	public function objetToDB($conn)
	{
		$req = $conn->exec("INSERT INTO objet(nom, typeobjet, image, disponibilite, livraison, nombre, id_user, commentaire) 
			VALUES('$this->nom', '$this->typeobjet', '$this->image', '$this->disponibilite', '$this->livraison', '$this->nombre', '$this->id_user', '$this->commentaire')");
	}
}
?>
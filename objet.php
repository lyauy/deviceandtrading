<?php
include_once('ConnexionBDD.php');

class Location {

	var $id_objet;
	var $nom;
	var $image;
	var $disponibilité;
	var $livraison;
	var $nombre;
	var $typeobjet;
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

    function __construct1($id_objet=null, $Pnom, $Pimage, $Pdisponibilité, $Plivraison, $Pnombre, $Ptypeobjet, $Pcommentaire, $Pid_user) {	

		$this->id_objet = null;
		$this->nom = $Pnom;
		$this->image = $Pimage;
		$this->disponibilité = $Pdisponibilité;
		$this->livraison = $Plivraison;
		$this->nombre = $Pnombre;
		$this->commentaire = $Pcommentaire;
		$this->id_user = $Pid_user;
		$this->typeobjet = $Ptypeobjet;
	}

	function __construct2($Pid_objet, $Pnom, $Pimage, $Pdisponibilité, $Plivraison, $Pnombre, $Ptypeobjet, $Pcommentaire, $Pid_user) {

		$this->id_objet = $Pid_objet;
		$this->nom = $Pnom;
		$this->image = $Pimage;
		$this->disponibilité = $Pdisponibilité;
		$this->livraison = $Plivraison;
		$this->nombre = $Pnombre;
		$this->commentaire = $Pcommentaire;
		$this->id_user = $Pid_user;
		$this->typeobjet = $Ptypeobjet;
	}
}
?>
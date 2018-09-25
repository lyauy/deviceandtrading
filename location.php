<?php
include_once('ConnexionBDD.php');

class Location {

	var $id_location;
	var $id_objet;
	var $id_user;
	var $debutloc;
	var $finloc;


	function __construct()
	{
        $argv = func_get_args();
        if (func_num_args() == 5) 
        {
        	self::__construct2( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
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


	function __construct2($Pid_location, $Pid_objet, $Pid_user, $Pdebutloc, $Pfinloc)
	{
		$this->id_location = $id_location;
		$this->id_objet = $Pid_objet;
		$this->id_user = $Pid_user;
		$this->debutloc = $Pdebutloc;
		$this->finloc = $Pfinloc;	
	}

	public function locToDB($conn)
	{
		$req = $conn->exec("INSERT INTO location(id_location, id_objet, id_user, debutloc, finloc) 
			VALUES('$this->id_location', '$this->id_objet', '$this->id_user', '$this->debutloc', '$this->finloc')");
	}

	public function deleteLoc($conn)
	{
		echo $this->id_location;
		$req = $conn->exec("DELETE FROM location WHERE id_location = '$this->id_location'");
		var_dump($req);
	}
}
?>
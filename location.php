<?php
include_once('ConnexionBDD.php');

class Location {
	var $id_objet;
	var $id_user;
	var $debutloc;
	var $finloc;

	function __construct($Pdebutloc, $Pfinloc)
	{
		$this->id_objet = $Pid_objet;
		$this->id_user = $Pid_user;
		$this->debutloc = $Pdebutloc;
		$this->finloc = $Pfinloc;	
	}
}
?>
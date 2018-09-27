<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/ConnexionBDD.php');

class Location {

	var $id_location;
	var $id_objet;
	var $id_user;
	var $debutloc;
	var $finloc;
	var $total;


	function __construct()
	{
        $argv = func_get_args();
        if (func_num_args() == 6) 
        {
        	self::__construct2( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
        }
        else
        {
        	self::__construct1();
        }
	}

    function __construct1() {
	}


	function __construct2($Pid_location, $Pid_objet, $Pid_user, $Pdebutloc, $Pfinloc, $Ptotal)
	{
		$this->id_location = $Pid_location;
		$this->id_objet = $Pid_objet;
		$this->id_user = $Pid_user;
		$this->debutloc = $Pdebutloc;
		$this->finloc = $Pfinloc;
		$this->total = $Ptotal;	
	}

	public function locToDB($conn)
	{
		$req = $conn->exec("INSERT INTO location(id_objet, id_user, debutloc, finloc, total) 
			VALUES('$this->id_objet', '$this->id_user', '$this->debutloc', '$this->finloc', '$this->total')");
	}

	public function deleteLoc($conn)
	{
		echo $this->id_location;
		$req = $conn->exec("DELETE FROM location WHERE id_location = '$this->id_location'");
	}
}
?>
<?php
include_once('ConnexionBDD.php');

class Objet {

	var $id_objet;
	var $nom;
	var $typeobjet;
	var $image;
	var $disponibilite;
	var $livraison;
	var $commentaire;
	var $id_user;

	function __construct()
	{
        $argv = func_get_args();
        if (func_num_args() == 8) 
        {
        	self::__construct2( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7] );
        }
        else
        {
        	self::__construct1();
        }
	}

    function __construct1() {	
	}

	function __construct2($Pid_objet, $Pnom, $Ptypeobjet, $Pimage, $Pdisponibilite, $Plivraison, $Pcommentaire, $Pid_user) {

		$this->id_objet = $Pid_objet;
		$this->nom = $Pnom;
		$this->typeobjet = $Ptypeobjet;
		$this->image = $Pimage;
		$this->disponibilite = $Pdisponibilite;
		$this->livraison = $Plivraison;
		$this->commentaire = $Pcommentaire;
		$this->id_user = $Pid_user;

	}

	public function objetToDB($conn)
	{
		$req = $conn->exec("INSERT INTO objet(nom, typeobjet, image, disponibilite, livraison, id_user, commentaire) 
			VALUES('$this->nom', '$this->typeobjet', '$this->image', '$this->disponibilite', '$this->livraison', '$this->id_user', '$this->commentaire')");
	}

	public function objetsaveToDB($conn)
	{
		var_dump($this->email);
		$req = $conn->exec("UPDATE objet SET nom = '$this->nom', typeobjet = '$this->typeobjet', image = '$this->image', disponibilite = '$this->disponibilite', livraison = '$this->livraison', id_user = '$this->id_user', commentaire = '$this->commentaire' WHERE id_objet = '$this->id_objet'");
	}

	public function deleteObjet($conn) 
	{
		echo $this->id_objet;
		$req = $conn->exec("DELETE FROM objet WHERE id_objet = '$this->id_objet'");
		var_dump($req);
	}
}
?>
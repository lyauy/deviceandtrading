<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/ConnexionBDD.php');

class Objet {

	var $id_objet;
	var $nom;
	var $typeobjet;
	var $image;
	var $prix;
	var $disponibilite;
	var $livraison;
	var $commentaire;
	var $id_user;

	function __construct()
	{
        $argv = func_get_args();
        if (func_num_args() == 9) 
        {
        	self::__construct2( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8]  );
        }
        else
        {
        	self::__construct1();
        }
	}

    function __construct1() {	
	}

	function __construct2($Pid_objet, $Pnom, $Ptypeobjet, $Pimage, $Pprix, $Pdisponibilite, $Plivraison, $Pcommentaire, $Pid_user) {

		$this->id_objet = $Pid_objet;
		$this->nom = $Pnom;
		$this->typeobjet = $Ptypeobjet;
		$this->image = $Pimage;
		$this->prix = $Pprix;		
		$this->disponibilite = $Pdisponibilite;
		$this->livraison = $Plivraison;
		$this->commentaire = $Pcommentaire;
		$this->id_user = $Pid_user;

	}

	public function objetToDB($conn)
	{
		/*$req = $conn->exec("INSERT INTO objet(nom, typeobjet, image, prix, disponibilite, livraison, id_user, commentaire) 
			VALUES('$this->nom', '$this->typeobjet', '$this->image', '$this->prix', '$this->disponibilite', '$this->livraison', '$this->id_user', '$this->commentaire')");*/

		$req = $conn->prepare("INSERT INTO objet(nom, typeobjet, image, prix, disponibilite, livraison, id_user, commentaire) 
			VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

		$req->bindParam(1, $this->nom);
		$req->bindParam(2, $this->typeobjet);
		$req->bindParam(3, $this->image);
		$req->bindParam(4, $this->prix);
		$req->bindParam(5, $this->disponibilite);
		$req->bindParam(6, $this->livraison);
		$req->bindParam(7, $this->id_user);
		$req->bindParam(8, $this->commentaire);

		$req->execute();

		redirectObjet();
	}

	public function deleteObjet($conn) 
	{
		echo $this->id_objet;
		$req = $conn->exec("DELETE FROM objet WHERE id_objet = '$this->id_objet'");
	}
}
?>
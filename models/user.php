<?php

class user {

	public $id;
	public $nom;
	public $prenom;
	public $email;
	public $adresse;
	public $ville;
	public $cp;
	public $admin;
	public $password;

	public function setUser($id, $nom, $prenom, $email, $adresse, $ville, $cp, $admin, $password) {

		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->email = $email;
		$this->adresse = $adresse;
		$this->ville = $ville;
		$this->cp = $cp;
		$this->admin = $admin;
		$this->password = $password;
		
	}

}
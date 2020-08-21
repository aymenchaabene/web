<?php
class Client
{
	//attributs
	protected $nom;
	protected $prenom;
	protected $sexe;
	protected $cin;
	protected $date_naiss;
	protected $adresse;
	protected $email;
	protected $tel;
	protected $login;
	protected $mdp;
	protected $etat_civil;
	protected $profession;
	protected $confirm;
	//constructeur
	function __construct($login,$mdp,$cin,$nom,$prenom,$adresse,$tel,$email,$sexe,$date_naiss,$profession,$etat_civil)
	{
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->sexe=$sexe;
		$this->cin=$cin;
		$this->date_naiss=$date_naiss;
		$this->adresse=$adresse;
		$this->email=$email;
		$this->tel=$tel;
		$this->login=$login;
		$this->mdp=$mdp;
		$this->etat_civil=$etat_civil;
		$this->profession=$profession;
		//$this->confirm=$confirm;
	
	}
function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getSexe(){
		return $this->sexe;
	}
	function getCIN(){
		return $this->cin;
	}
	function getLogin(){
		return $this->login;
	}
	function getEtat_civil(){
		return $this->etat_civil;
	}
	function getProfession(){
		return $this->profession;
	}
	function getMdp(){
		return $this->mdp;
	}
	function getDate_naiss(){
		return $this->date_naiss;
	}
	function getTelephone(){
		return $this->tel;
	}
		function getAdresse(){
		return $this->adresse;
	}
	function getEmail(){
		return $this->email;
	}
	
	function getConfirm(){
		return $this->confirm;
	}
	
}


?>
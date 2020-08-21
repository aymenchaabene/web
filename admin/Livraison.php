<?php
class livraison{
	//attributs
	private $id_livraison;
	private $adresse_livraison;
	private $code_p_l;
	private $gouvernorat_livraison;
	private $prix_livraison;
	private $vehicule_livraison;
	private $email_livraison;
	private $mobile_livraison;
	//constructeur
	function __construct($id_livraison,$adresse_livraison,$code_p_l,$gouvernorat_livraison,$prix_livraison,$vehicule_livraison,$email_livraison,$mobile_livraison){
		$this->id_livraison=$id_livraison;
		$this->adresse_livraison=$adresse_livraison;
		$this->code_p_l=$code_p_l;
		$this->gouvernorat_livraison=$gouvernorat_livraison;
		$this->prix_livraison=$prix_livraison;
		$this->vehicule_livraison=$vehicule_livraison;
		$this->email_livraison=$email_livraison;
		$this->mobile_livraison=$mobile_livraison;
	}
	function getId(){
		return $this->id_livraison;
	}
	function getAdresse(){
		return $this->adresse_livraison;
	}
	function getCode(){
		return $this->code_p_l;
	}
	function getGouvernorat(){
		return $this->gouvernorat_livraison;
	}
	function getPrix(){
		return $this->prix_livraison;
	}
	function getVehicule(){
		return $this->vehicule_livraison;
	}
	function getEmail(){
		return $this->email_livraison;
	}
	function getMobile(){
		return $this->mobile_livraison;
	}
}


?>
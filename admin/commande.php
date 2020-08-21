<?php
class commande
{
	//attributs
	//id_commande	id_client 	date_commande 	montant_commande 	payement_commande
	private $id_commande;
	private $id_client;
	private $date_commande;
	private $montant;
	private $payement;
	private $status_commande;
	//constructeur
	function __construct($id_commande=0,$id_client='',$date_commande='',$montant=0,$payement='',$status_commande='')
	{
		$this->id_commande=$id_commande;
		$this->id_client=$id_client;
		$this->date_commande=$date_commande;
		$this->montant=$montant;
		$this->payement=$payement;	
		$this->status_commande=$status_commande;	
	}
	//constructeur sans ID
	public static function withoutID($id_c,$date_c,$montant_c) 
	{
    	$instance = new self();
    	$instance->loadByID($id_c,$date_c,$montant_c);
    	return $instance;
    }
    protected function loadByID( $id_c,$date_c,$montant_c) 
	{
    	$this->fill($id_c,$date_c,$montant_c);

    }

    protected function fill($id_c,$date_c,$montant_c) 
	{
    	$this->id_client=$id_c;
		$this->date_commande=$date_c;
		$this->montant=$montant_c;
    }
	//gets
	function getId_Commande()
	{
		return $this->id_commande;
	}
	function getId_Client()
	{
		return $this->id_client;
	}
	function getDate_Commande()
	{
		return $this->date_commande;
	}
	function getMontant()
	{
		return $this->montant;
	}
	function getPayement()
	{
		return $this->payement;
	}
	function getStatusCommande()
	{
		return $this->status_commande;
	}

	//sets
	function setId_Commande($id)
	{
		$this->id_commande=$id;
	}
	function setId_Client($id_c)
	{
		$this->id_client=$id_c;
	}
	function setDate_Commande($date)
	{
		$this->date_commande=$date;
	}
	function setMontant($montant)
	{
		$this->montant=$montant;
	}
	function setPayement($payement)
	{
		$this->payement=$payement;
	}

	
	
}


?>
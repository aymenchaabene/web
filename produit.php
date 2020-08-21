<?php
class produit{
	//attributs
	//id_produit 	nom_produit 	prix_produit 	qte_produit 	desc_produit 	date_produit 	ptsfid_produit 
	protected $id_produit;
	protected $nom_produit;
	protected $prix_produit;
	protected $qte_produit;
	protected $desc_produit;
	protected $date_produit;
	protected $Status_produit;
	protected $img_url;
	protected $ptsfid_produit ;
	//constructeur
	function __construct($id_produit=0,$nom_produit='',$prix_produit=0,$qte_produit=0,$desc_produit='',$date_produit='',$Status_produit='',$img_url='',$ptsfid_produit=0){
		$this->id_produit=$id_produit;
		$this->nom_produit=$nom_produit;
		$this->prix_produit=$prix_produit;
		$this->qte_produit=$qte_produit;
		$this->desc_produit=$desc_produit;
		$this->date_produit=$date_produit;
		$this->Status_produit=$Status_produit;
		$this->ptsfid_produit=$ptsfid_produit;
		$this->img_url=$img_url;
		
	}
	//gets
	function getId(){
		return $this->id_produit;
	}
	function getNom(){
		return $this->nom_produit;
	}
	function getPrix(){
		return $this->prix_produit;
	}
	function getQuantity(){
		return $this->qte_produit;
	}
	function getDesc(){
		return $this->desc_produit;
	}
	function getDate_produit(){
		return $this->date_produit;
	}
	function getStatus_produit(){
		return $this->Status_produit;
	}
	function getImg_produit(){
		return $this->img_url;
	}

	function getFid_pts(){
		return $this->ptsfid_produit;
	}
	//sets
	function setId($id){
		$this->id_produit=$id;
	}
	function setNom($nom){
		$this->nom_produit=$nom;
	}
	function setPrix($prix){
		$this->prix_produit=$prix;
	}
	function setQuantity($qte){
		$this->qte_produit=$qte;
	}
	function setDesc($desc){
		$this->desc_produit=$desc;
	}
	function setDate_produit($date){
		$this->date_produit=$date;
	}

	function setFid_pts($pts){
		$this->ptsfid_produit=$pts;
	}
	
	
	
}


?>
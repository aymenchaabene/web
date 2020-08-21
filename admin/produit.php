<?php
class produit{
	//attributs
	//id_produit 	nom_produit 	prix_produit 	qte_produit 	desc_produit 	date_produit 	ptsfid_produit 
	private $id_produit;
	private $id_categorie ;
	private $id_promotion;
	private $nom_produit;
	private $prix_produit;
	private $qte_produit;
	private $desc_produit;
	private $date_produit;
	private $Status_produit;
	private $img_url;
	private $ptsfid_produit ;
	//constructeur
	function __construct($id_produit=0,$id_categorie=0,$id_promotion=0,$nom_produit='',$prix_produit=0,$qte_produit=0,$desc_produit='',$date_produit='',$Status_produit='',$img_url='',$ptsfid_produit=0){
		$this->id_produit=$id_produit;
		$this->id_categorie=$id_categorie;
		$this->id_promotion=$id_promotion;
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
	function getIdcat(){
		return $this->id_categorie;
	}
	function getIdpromo(){
		return $this->id_promotion;
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
	function setIdCat($id_cat){
		$this->id_categorie=$id_cat;
	}
	function setIdPromo($id_promo){
		$this->id_promotion=$id_promo;
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
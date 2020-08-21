<?php
class commentaires{
	//attributs
	//id_promotion	nom_promotion
	private $id;
	private $id_produit;
	private $contenu;
	private $date_com ;
	private $id_client;

	//constructeur
	function __construct($id=0,$id_produit=0,$contenu='',$date_com='',$id_client=1){
		$this->id=$id;
		$this->id_produit=$id_produit;
		$this->contenu=$contenu;
		$this->date_com=$date_com;
		$this->id_client=$id_client;
	
		
	}
	//gets
	function getId(){
		return $this->id;
	}
	function getIdproduit(){
		return $this->id_produit;
	}
	function getContenu(){
		return $this->contenu;
	}
	function getDatecomm(){
		return $this->date_com;
	}
	function getIdClient(){
		return $this->id_client;
	}
	//sets
	function setId($id){
		$this->id=$id;
	}
	function setIdproduit($id_produit){
		$this->id_produit=$nom;
	}
	function setContenu($Contenu){
		$this->Contenu=$Contenu;
	}
	function setDatecomm($date_com){
		$this->date_com=$date_com;
	}
	function setIdClient($id_client){
		$this->id_client=$id_client;
	}
	
	
}


?>
<?php
class promotion{
	//attributs
	//id_promotion	nom_promotion
	private $id_promotion;
	private $nom_promotion;
	private $poucentage_promotion;

	//constructeur
	function __construct($id_promotion=0,$nom_promotion='',$poucentage_promotion=1){
		$this->id_promotion=$id_promotion;
		$this->nom_promotion=$nom_promotion;
		$this->poucentage_promotion=$poucentage_promotion;
	
		
	}
	//gets
	function getId(){
		return $this->id_promotion;
	}
	function getNom(){
		return $this->nom_promotion;
	}
	function getPourcentage(){
		return $this->poucentage_promotion;
	}
	//sets
	function setId($id){
		$this->id_promotion=$id;
	}
	function setNom($nom){
		$this->nom_promotion=$nom;
	}
	function setPourcentage($poucentage){
		$this->poucentage_promotion=$poucentage;
	}
	
	
	
}


?>
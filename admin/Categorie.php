<?php
class categorie{
	//attributs
	//id_categorie	nom_categorie
	private $id_categorie;
	private $nom_categorie;

	//constructeur
	function __construct($id_categorie=0,$nom_categorie=''){
		$this->id_categorie=$id_categorie;
		$this->nom_categorie=$nom_categorie;
	
		
	}
	//gets
	function getId(){
		return $this->id_categorie;
	}
	function getNom(){
		return $this->nom_categorie;
	}
	
	//sets
	function setId($id){
		$this->id_categorie=$id;
	}
	function setNom($nom){
		$this->nom_categorie=$nom;
	}
	
	
	
}


?>
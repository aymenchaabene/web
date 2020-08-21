<?php
class rating{
	
	
	private $id_produit;
	private $note;
	private $cin;
	
	
	
	
	
	function __construct($id_produit,$note,$cin){
		
		$this->id_produit=$id_produit;
		$this->note=$note;
		$this->cin=$cin;
		
		
		
	}
	
	function getid(){
		return $this->id_produit;
	}
	function getnote(){
		return $this->note;
	}
	function getcin(){
		return $this->cin;
	}
	
	
	
}


?>
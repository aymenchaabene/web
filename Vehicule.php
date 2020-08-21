<?php
class vehicule{
	//attributs
	private $id_v;
	private $gouvernorat;
	private $status_v;
	//constructeur
	function __construct($id_v,$gouvernorat,$status_v){
		$this->id_v=$id_v;
		$this->gouvernorat=$gouvernorat;
		$this->status_v=$status_v;
	}
	function getId(){
		return $this->id_v;
	}
	function getGouvernorat(){
		return $this->gouvernorat;
	}
	function getStatus(){
		return $this->status_v;
	}
}


?>
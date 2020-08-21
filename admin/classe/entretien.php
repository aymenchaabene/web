<?php
class entretien {
	
	
	private $e_mail_client;
	private $date_entretien;
	private $adresse;
    private $type_entretien ;
	private $cin_client;
	
	
	function __construct($e_mail_client,$date_entretien,$adresse,$type_entretien,$cin_client){
		
		
		$this->e_mail_client=$e_mail_client;
		$this->date_entretien=$date_entretien;
		$this->adresse=$adresse;
		$this->type_entretien=$type_entretien ;
        $this->cin_client=$cin_client ; 		
		
	}
	
	
	function getE_mail(){
		return $this->e_mail_client;
	}
	
	function getdat(){
		return $this->date_entretien;
	}
	
	function getadresse(){
		return $this->adresse;
	}
	
	function get_type(){
		return $this->type_entretien;
	}
	function get_cin(){
		return $this->cin_client;
	}
	
}


?>
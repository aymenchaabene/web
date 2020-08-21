<?php
class reclamation{
	
	
	private $contenu_reclamation;
	private $date_reclamation;
	private $e_mail_client;
	private $cin_client;
    private $statu_reclamation ;
	
	
	
	function __construct($date_reclamation,$e_mail_client,$contenu_reclamation,$cin_client,$statu_reclamation){
		
		$this->date_reclamation=$date_reclamation;
		$this->e_mail_client=$e_mail_client;
		$this->contenu_reclamation=$contenu_reclamation;
		$this->cin_client=$cin_client ; 
		$this->statu_reclamation=$statu_reclamation ; 
		
	}
	
	function getdat(){
		return $this->date_reclamation;
	}
	function getE_mail(){
		return $this->e_mail_client;
	}
	
	function getcontenu(){
		return $this->contenu_reclamation;
	}
	function get_cin(){
		return $this->cin_client;
	}
	function get_statue(){
		return $this->statu_reclamation;
	}
	
	
}


?>
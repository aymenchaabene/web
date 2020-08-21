<?php
class message{
	
	
	private $e_mail_client;
	private $date_msg;
	private $sujet_msg;
	private $cin_client;
    private $statu_msg ;
	private $reponse ;
	
	
	
	function __construct($e_mail_client,$date_msg,$sujet_msg,$cin_client,$statu_msg,$reponse){
		
		
		$this->e_mail_client=$e_mail_client;
		$this->date_msg=$date_msg;
		$this->sujet_msg=$sujet_msg;
		$this->cin_client=$cin_client ; 
		$this->statu_msg=$statu_msg ; 
		$this->reponse=$reponse; 
		
	}
	
	
	function getE_mail(){
		return $this->e_mail_client;
	}
	
	function getdat(){
		return $this->date_msg;
	}
	
	function getsujet(){
		return $this->sujet_msg;
	}
	function get_cin(){
		return $this->cin_client;
	}
	function get_statu(){
		return $this->statu_msg;
	}
	function get_rep(){
		return $this->reponse;
	}
	
}


?>
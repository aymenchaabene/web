<?php
class Newslettre{
	//
	//
	//
	
	private $id;
	private $subject;
	private $message;
	private $newslettre_date ; 

	//constructeur
	function __construct($id=0,$subject='',$message='',$newslettre_date=''){
		$this->id=$id;
		$this->subject=$subject;
		$this->message=$message;
		$this->newslettre_date=$newslettre_date;
	
	}
	//gets
	function getId(){
		return $this->id;
	}
	function getSubject(){
		return $this->subject;
	}
	function getmessage(){
		return $this->message;
	}
	function getnewslettre_date(){
		return $this->newslettre_date;
	}
	//sets
	function setId($id){
		$this->id=$id;
	}
	function setSubject($subject){
		$this->subject=$subject;
	}
	function setmessage	($message){
		$this->message=$message;
	}
	function setnewslettre_date($newslettre_date){
		$this->newslettre_date=$newslettre_date;
	}
	
	
	
}


?>
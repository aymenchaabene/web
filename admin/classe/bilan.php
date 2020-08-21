<?php
require_once ("../config.php");

class bilan{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function verifmal($conn){
$rq="SELECT COUNT(*) FROM rating WHERE note<3" ; 
$note_m=$conn->query($rq);
return $note_m; 
}
function verifbien($conn){
$rq="SELECT COUNT(*) FROM rating WHERE note>3" ; 
$note_b=$conn->query($rq);
return $note_b ;
}
function bilanmal($conn){
		$req="SELECT * FROM bilan where id=0";
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
function bilanbien($conn){
		$req="SELECT * FROM bilan  where id=1";
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	function bilanmoy($conn){
		$req="SELECT * FROM bilan  where id=2";
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	}
	

	

?>




<?php
require_once ("setup.php");
include ("classe/entretien.php");
class crudentretien{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function insertentretien($entr,$conn){

		$req1="INSERT INTO entretien (e_mail_client,date_entretien,adresse,type_entretien,cin_client) VALUES ('".$entr->getE_mail()."','".$entr->getdat()."','".$entr->getadresse()."','".$entr->get_type()."',".$entr->get_cin().")";
		$conn->query($req1);
	}
	function cinfromemail($email,$conn){
      $rq="select cin from utilisateur where mail='$email' limit 1" ; 
     $cin=$conn->query($rq);
	 return $cin->fetchall();
    }
	function recherche_entretien($conn,$cin,$date){
		$req="SELECT * FROM `entretien` WHERE cin_client='$cin' AND date_entretien='$date' limit 1";
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	function modifier_entretie($conn,$entr,$old_date){
		$req1="UPDATE entretien SET date_entretien='".$entr->getdat()."',adresse='".$entr->getadresse()."' WHERE cin_client=".$entr->get_cin()." AND date_entretien='".$old_date."'";
		$conn->query($req1);
		
	}
	function afficher_entretien($conn){
		$req="SELECT * FROM entretien ";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	function supprimer_entretien($conn,$id_entretien){
		$req1="DELETE FROM entretien where id_entretien=".$id_entretien;
		$conn->exec($req1);
		
	}
	function findcin($cin,$conn){
      $rq="select * from commandes where cin_client='$cin' limit 1" ; 
    $liste=$conn->query($rq);
		return $liste->fetchAll();	
    }
	
	function recherche_entretien2($conn,$id_entretien){
		$req="SELECT * FROM `entretien` WHERE  id_entretien=".$id_entretien;
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	function recherche_entretien3($conn,$cin){
		$req="SELECT * FROM `entretien` WHERE  cin_client='$cin'";
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
		function cinfromlogin($login,$password,$conn){
			
      $rq="select cin,mail from utilisateur where login='$login'  AND mdp = '$password' limit 1" ; 
      $cin=$conn->query($rq);
      return $cin->fetchall();


	  }
	  function verifdate($conn,$date){
  $rq="SELECT COUNT(*) FROM entretien WHERE date_entretien='$date' "; 
   $note_d=$conn->query($rq);
   return $note_d ;
}
	  
	
}
if (isset ($_GET['id']) && $_GET['id']==11)
	
	{
		
		
		if (isset ($_GET['id_entr']))
		$id_entretien_x= $_GET['id_entr'];
		
		
		$cc=new crudentretien(); 
		$cc->supprimer_entretien($cc->conn,$id_entretien_x);
		
 header('location:../table_entretien.php');

		die();
		
		
		
	}
?>
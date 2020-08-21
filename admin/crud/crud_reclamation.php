<?php
require_once ("setup.php");
include ("classe/reclamation.php");
class crudreclamation{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function insertreclamation($rec,$conn){
		
		$req1="INSERT INTO reclamation (date_reclamation,e_mail_client,contenu,cin_client) VALUES ('".$rec->getdat()."','".$rec->getE_mail()."','".$rec->getcontenu()."',".$rec->get_cin().")";
		$conn->query($req1);
	}
	function cinfromemail($email,$conn){
$rq="select cin from utilisateur where mail='$email' limit 1" ; 
$cin=$conn->query($rq);
return $cin->fetchall(); 
}
function afficher_reclamation($conn){
		$req="SELECT * FROM reclamation ";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	function supprimer_reclamation($id_reclamation,$conn){
		$req1="DELETE FROM reclamation where id_reclamation=".$id_reclamation;
		$conn->exec($req1);
		
	}
	function set_statu_reclamation($id_reclamation,$conn)
	{
		$req1="UPDATE reclamation SET statu_reclamation='traité' where id_reclamation=".$id_reclamation;
		$conn->exec($req1);
		
	}
	function recherche_reclamation($conn,$id_reclamation){
		$req="SELECT * FROM reclamation  where id_reclamation=".$id_reclamation;
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	function cinfromlogin($login,$password,$conn){
			
      $rq="select cin,mail from utilisateur where login='$login'  AND mdp = '$password' limit 1" ; 
      $cin=$conn->query($rq);
      return $cin->fetchall();


	  }
	  function affiche_reclamation_client($conn,$cin){
		$req="SELECT * FROM reclamation  where cin_client='$cin'";
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
}


if (isset ($_GET['id']) && $_GET['id']==10)
	
	{
		
		
		if (isset ($_GET['id_rec']))
		$id_reclamation_x=$_GET['id_rec'];
	
	
	
		$cc=new crudreclamation(); 
		$cc->supprimer_reclamation($id_reclamation_x,$cc->conn);
		
header('location:../table_rec.php');

		die();
		
		
		
	}
	if (isset ($_GET['id']) && $_GET['id']==11)
	
	{
		
		
		if (isset ($_GET['id_rec']))
		$id_reclamation_x=$_GET['id_rec'];
		
		
		$cc=new crudreclamation(); 
		$cc->set_statu_reclamation($id_reclamation_x,$cc->conn);
		
	header('location:../table_rec.php');

		die();
		
		
		
	}
	

?>




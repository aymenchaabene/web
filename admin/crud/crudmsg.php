<?php
require_once ("setup.php");
include ("classe/message.php");
class crudmsg{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function insertmsg($rec,$conn){

		$req1="INSERT INTO messages (e_mail_client,date_msg,sujet_msg,cin_client) VALUES ('".$rec->getE_mail()."','".$rec->getdat()."','".$rec->getsujet()."',".$rec->get_cin().")";
		$conn->query($req1);
	}
	function cinfromemail($email,$conn){
      $rq="select cin from utilisateur where mail='$email' limit 1" ; 
     $cin=$conn->query($rq);
     return $cin->fetchall(); 
    }
	function afficher_msg($conn){
		$req="SELECT * FROM messages ";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	function supprimer_message($id_msg,$conn){
		$req1="DELETE FROM messages where id_msg=".$id_msg;
		$conn->exec($req1);
		
	}
	function count_message($conn){
		$req1="SELECT COUNT(*) FROM messages";
		$conn->exec($req1);
		
	}
	function set_statu_msg($id_msg,$conn)
	{
		$req1="UPDATE messages SET statu_msg='lu' where id_msg=".$id_msg;
		$conn->exec($req1);
		
	}
	function recherche_msg($conn,$id_msg){
		$req="SELECT * FROM messages  where id_msg=".$id_msg;
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	function repondre($conn,$id_msg,$reponse){
		$req="UPDATE messages SET reponse='$reponse' where id_msg=".$id_msg;
		$conn->exec($req);
	}
	 function affiche_msg_client($conn,$cin){
		$req="SELECT * FROM messages  where cin_client='$cin'";
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	function cinfromlogin($login,$password,$conn){	
      $rq="select cin,mail from utilisateur where login='$login'  AND mdp = '$password' limit 1" ; 
      $cin=$conn->query($rq);
      return $cin->fetchall();
	  }
	
	
	
		
}
if (isset ($_GET['id']) && $_GET['id']==11)
	
	{
		
		
		if (isset ($_GET['id_message']))
		$id_msg_x=$_GET['id_message'];

		
		
		$cc=new crudmsg(); 
		$cc->supprimer_message($id_msg_x,$cc->conn);
		
header('location:../table_msg.php');

		die();
		
		
		
	}
	if (isset ($_GET['id']) && $_GET['id']==10)
	
	{
		
		
		if (isset ($_GET['id_message']))
		$id_msg_x=$_GET['id_message'];

		
		
		$cc=new crudmsg(); 
		$cc->set_statu_msg($id_msg_x,$cc->conn);
		
header('location:../table_msg.php');

		die();
		
		
		
	}
	if ( isset($_POST['id_msg']) and isset($_POST['reponse'])) 
{
	$cc=new crudmsg(); 
	$id_msg=$_POST['id_msg'];
	$reponse=$_POST['reponse'];
	
	
           $cc->repondre($cc->conn,$id_msg,$reponse);
         echo "<script> location.href='../table_msg.php?etat=done'</script>";
}

?>
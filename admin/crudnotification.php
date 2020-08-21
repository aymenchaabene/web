<?php
include ('notification.php');
require_once('setup.php');

class crudnotification
{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();

	}

	function Afficher_Notification($conn)
	{
		$req="SELECT * FROM notification where status='unread'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
	}
	
	function Ajouter_Notification($conn,$notification)
	{	
		$req1="INSERT INTO notification (content,time,type) VALUES ('".$notification->get_Content()."','".$notification->get_Time()."','".$notification->get_Type()."')";
		$conn->query($req1);
	}
		
	
	function Nombre_Notification($conn)
	{	
		$req1="SELECT COUNT(*) FROM notification where status='unread'";
		$result = $conn->prepare($req1); 
		$result->execute(); 
		$number_of_rows = $result->fetchColumn();
		return $number_of_rows;
	}	
	function Marquer_lu($conn)
	{	
		$req1="UPDATE notification SET status='read'";
		$conn->query($req1);		
	}

	





}

if (isset($_GET['id'])&& $_GET['id']==1)
{
	$crudnotification=new crudnotification();
	$crudnotification->Marquer_lu($crudnotification->conn);
	header('Location: ' . $_SERVER['HTTP_REFERER']);

	
}






















?>
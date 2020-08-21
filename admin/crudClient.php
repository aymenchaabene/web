<?php

//Pour insérer un chauffeur dans la base de données, une classe contenant les crud est crée
//en instanciant un objet de cette classe, la cnx avec la base de données est établie 
require_once ("setup.php");
include ("client.php");


class crudClient
{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	
	

	function modifierClient($client,$conn)
	{
		
		$req1="UPDATE utilisateur SET login='".$client->getLogin()."',mdp='".$client->getMdp()."',cin='".$client->getCin()."',nom='".$client->getNom()."',prenom='".$client->getPrenom()."',
		adresse='".$client->getAdresse()."',tel='".$client->getTelephone()."',mail='".$client->getEmail()."',sexe='".$client->getSexe()."',
		date_naiss='".$client->getDate_naiss()."',profession='".$client->getProfession()."' ,etat_civil='".$client->getEtat_civil()."'  WHERE cin=".$client->getCin();
		
		$conn->exec($req1);
		
	}
	
	function recupererClient($cin,$conn)
		{
		
		$req="SELECT * FROM utilisateur  WHERE cin=".$cin;
		$chauf=$conn->query($req);
		return $chauf->fetchAll();
		}
	
		function afficheClient($cin,$conn)
		{
		$req="select login,mdp,cin,nom,prenom,adresse,tel,mail,sexe,date_naiss,profession,etat_civil,pt_fid_acc from utilisateur where cin= '".$cin."'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
		}
		function affiche($conn)
		{
		$req="select login,mdp,cin,nom,prenom,adresse,tel,mail,sexe,date_naiss,profession,etat_civil,pt_fid_acc from utilisateur ";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
		}
		function supprimerClient($cin,$conn){
		$req1="DELETE FROM utilisateur where cin='".$cin."'";
		
		$conn->exec($req1);
		
	}
		function rechercheClient($cin,$conn)
		{
		$req="SELECT * FROM utilisateur where cin=".$cin;
		$liste=$conn->query($req);
		return ($liste->fetchAll());
	}
	
	
	
}
?>
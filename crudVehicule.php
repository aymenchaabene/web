<?php
include ("Vehicule.php");
include ("Livraison.php");
/*
include ("m.php");
include ("src/NexmoMessage.php" );
require('fpdf.php'); 
*/
class crudVehicule
{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function insertVehicule($vehicule,$conn){
		
		$req1="INSERT INTO vehicule (id_v,gouvernorat,status_v) 
		VALUES ('".$vehicule->getId()."','".$vehicule->getGouvernorat()."','Active')";
		$conn->query($req1);
	}
	
	function insertLivraison($livraison,$conn){
		
		$req1="INSERT INTO livraison (id_livraison,adresse_livraison,code_p_l,gouvernorat_livraison,prix_livraison,vehicule_livraison,email_livraison,mobile_livraison) 
		VALUES (0,'".$livraison->getAdresse()."','".$livraison->getCode()."','".$livraison->getGouvernorat()."','".$livraison->getPrix()."',0,'".$livraison->getEmail()."',".$livraison->getMobile().")";
		$conn->query($req1);
	}
	
	function afficheVehicule($conn){
		$req="SELECT * FROM vehicule";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	
	function afficheLivraison($conn){
	
		$req="SELECT * FROM livraison ";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	
	function recupererVehicule($id_v,$conn){
		
		$req="SELECT id_v,gouvernorat FROM vehicule WHERE id_v=".$id_v;
		$vehicule=$conn->query($req);
		return $vehicule->fetchAll();
	}
	
	function recupererLivraison($id_livraison,$conn){
		
		$req="SELECT id_livraison,adresse_livraison,code_p_l,gouvernorat_livraison,prix_livraison,email_livraison,mobile_livraison FROM livraison WHERE id_livraison=".$id_livraison;
		$livraison=$conn->query($req);
		return $livraison->fetchAll();
	}
	function modifierVehicule($vehicule,$conn){
		$req1="UPDATE vehicule SET id_v='".$vehicule->getId()."' , gouvernorat='".$vehicule->getGouvernorat()."' WHERE id_v=".$vehicule->getId();	
		$conn->exec($req1);
	}
	function modifierLivraison($livraison,$conn){
		$req1="UPDATE livraison SET vehicule_livraison=".$livraison->getVehicule()." WHERE id_livraison=".$livraison->getId();	
		$conn->exec($req1);
	}
	
	function supprimervehicule($id_v,$conn){
		$req1="DELETE FROM vehicule where id_v=".$id_v;
		$conn->exec($req1);
	}
	
	
		function change_Status($conn,$id_v,$status_v)
	{
		$req="UPDATE vehicule SET status_v='$status_v' where id_v=$id_v; "; 
		$conn->query($req);
		
		
	}

	
	function vehicule_disponible($conn)
	{
		$req="SELECT id_v FROM vehicule WHERE status_v ='Active'";
		$vehicule=$conn->query($req);
		return $vehicule->fetchAll();
	}

	
	
	
}

?>

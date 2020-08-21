<?php
require_once ('setup.php');
include ('lignedecommande.php');
class crudlignedecommande
{
	
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}

	
	function Ajouter_Ligne_Commande($conn,$lignedecommande)
	{	
		$req1="INSERT INTO lignedecommande VALUES (".$lignedecommande->getId().",".$lignedecommande->getId_Produit().",".$lignedecommande->getQte().",".$lignedecommande->getMontant().")";
		echo "Error: " . $req1 . "<br>" . $conn->error;
		$conn->query($req1);
	}

	function Supprimer_Ligne_Commande($conn,$id) 
	{
		$req3="delete from lignedecommande where id_commande=$id" ;
		$conn->query($req3);	
	}
	
	function Supprimer_Ligne_Produit($conn,$id) 
	{
		$req3="delete from lignedecommande where id_produit=$id" ;
		$conn->query($req3);	
	}

	
		function Affiche_Produits($conn,$id)
	{	
		$req5="SELECT id_produit,qte_produit,montant_produit FROM lignedecommande where id_commande=$id";
		$liste=$conn->query($req5); 
		return $liste->fetchAll(); 	
	}
	
		function Affiche_Quantites($conn,$id,$id1)
	{	
		$req5="SELECT qte_produit FROM lignedecommande where id_commande=$id and id_produit=$id1";
		$liste=$conn->query($req5); 
		return $liste->fetchAll(); 	
	}
	
	function Update_Ligne_Commande($conn,$qte,$id,$id_p)
	{
		$req1="UPDATE lignedecommande SET qte_produit=$qte where id_commande=$id and id_produit=$id_p";
		//echo "Error: " . $req1 . "<br>" . $conn->error;
		$conn->query($req1);	

	}
	function Afficher_1_Commande($conn,$id)
	{
		$req="SELECT * FROM commandes where id_commande=$id";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
	}
		function Rechercher_Commande_ID_Client($conn,$id)
	{
		$req5="SELECT * FROM commandes where id_client='$id'";
		$liste=$conn->query($req5); 
		return $liste->fetchAll(); 	
	}
	function updatequantity($conn,$qte,$id)
	{
	
	$req="Update produits SET qte_produit=qte_produit-$qte where id_produit=$id "; 
		$conn->query($req);	
	}



	
	
}




?>
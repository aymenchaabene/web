<?php
class lignedecommande
{
	//attributs
	//id_commande	id_produit 	qte_produit 	montant_produit
	private $id_commande;
	private $id_produit;
	private $qte_produit;
	private $montant_produit;
	//constructeur
	function __construct($id_commande=0,$id_produit=0,$qte_produit=0,$montant_produit=0)
	{
		$this->id_commande=$id_commande;
		$this->id_produit=$id_produit;
		$this->qte_produit=$qte_produit;
		$this->montant_produit=$montant_produit;
	}

	
	function getId()
	{
		return $this->id_commande;
	}
	function getId_Produit()
	{
		return $this->id_produit;
	}
	function getQte()
	{
		return $this->qte_produit;
	}
	function getMontant()
	{
		return $this->montant_produit;
	}
	
	
}
?>	
	
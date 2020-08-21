<?php
require_once ("config.php");
include ("classe/rating.php");
class crudrating{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function getproductid($cin,$conn){
		
		$req1="	SELECT DISTINCT(l.id_produit),c.id_client FROM lignedecommande as l JOIN commandes as c ON c.id_commande=l.id_commande WHERE c.id_client=$cin ";
		$liste=$conn->query($req1);
		return $liste->fetchAll();
		
	}

	function afficher_produit($id,$conn){
		
		$req1="SELECT * FROM produits where id_produit=".$id;
		$liste=$conn->query($req1);
		return $liste->fetchAll();
	}
	function insertrating($rat,$conn){
		
	
		$req1="INSERT INTO rating (id_produit,note,cin_client) VALUES (".$rat->getid().",".$rat->getnote().",".$rat->getcin().")";
		$conn->query($req1);
	}
	
	function verifrating($id,$conn){
      $rq="select * from rating where cin_client='$cin' limit 1" ; 
    $liste=$conn->query($rq);
		return $liste->fetchAll();	
    }
		function findcin($cin,$id,$conn){
      $rq="select * from rating where cin_client='$cin' and id_produit='$id' limit 1" ; 
    $liste=$conn->query($rq);
		return $liste->fetchAll();	
    }
	function afficher_rating($conn){
		
		$req1="SELECT * FROM rating ";
		$liste=$conn->query($req1);
		return $liste->fetchAll();
	}
	function getproductnote($id,$conn){
		
		$req1="	SELECT (SUM(note)/count(note)) FROM rating WHERE id_produit='$id' ";
		 $note_t=$conn->query($req1);
	     return $note_t->fetchall();

		
	}
	function cinfromlogin($login,$password,$conn){
			
      $rq="select cin,mail from utilisateur where login='$login'  AND mdp = '$password' limit 1" ; 
      $cin=$conn->query($rq);
      return $cin->fetchall();


	  }
	
}





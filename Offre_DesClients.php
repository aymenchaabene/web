	

<?php

//Pour ins�rer un chauffeur dans la base de donn�es, une classe contenant les crud est cr�e
//en instanciant un objet de cette classe, la cnx avec la base de donn�es est �tablie 
include ("config.php");
include ("ClasseOffre.php");



class crudOffre
{
	
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	
	
	function ajouterOffre_client($offre,$conn)
	{
		
		
	
		
		$req1="INSERT INTO offre_par_client(nom,nbre_pt_fid,debut_offre,fin_offre,description) values 
		('".$offre->getNom()."','".$offre->getNbre_pt_fid()."','".$offre->getDebut_offre()."','".$offre->getFin_offre()."','".$offre->getDescription()."')" ;
		$conn->exec($req1);
	
		header('location:index2.php');

	}
}
	?>
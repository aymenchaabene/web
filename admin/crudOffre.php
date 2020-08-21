

<?php

//Pour insérer un chauffeur dans la base de données, une classe contenant les crud est crée
//en instanciant un objet de cette classe, la cnx avec la base de données est établie 
include ("setup.php");
include ("ClasseOffre.php");
//include 'connexion.php';


class crudOffre
{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function ajouterOffre($offre,$conn)
	{
		
		
	
		
		$req1="INSERT INTO offre(nom,nbre_pt_fid,debut_offre,fin_offre,description) values 
		('".$offre->getNom()."','".$offre->getNbre_pt_fid()."','".$offre->getDebut_offre()."','".$offre->getFin_offre()."','".$offre->getDescription()."')" ;
		$conn->exec($req1);
	
	//	header('location:index2.php');

	}
	

	function modifierOffre($offre,$id,$conn)
	{
		
		$req1="UPDATE offre SET nom='".$offre->getNom()."',nbre_pt_fid=".$offre->getNbre_pt_fid().",debut_offre='".$offre->getDebut_offre()."',
		fin_offre='".$offre->getFin_offre()."',description='".$offre->getDescription()."'  WHERE id_offre=".$id;
		
		$conn->exec($req1);
		
	}
	
	

	
	
	function recupererOffre($id_offre,$conn)
	{
		
		$req="SELECT * FROM offre  WHERE id_offre=".$id_offre;
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	
	
	
		function afficheOffre($conn)
		{
		$req1="select id_offre,nom,nbre_pt_fid,debut_offre,fin_offre,description from offre ";
		$liste=$conn->query($req1);
		return $liste->fetchAll();	
		
	}
			/*function afficheOffre_par_client($cin,$conn)
		{
			$req="SELECT utilisateur.cin,utilisateur.nom,utilisateur.prenom,offre.nom,offre.debut_offre,offre.fin_offre FROM utilisateur join offre on ";
		$liste=$conn->query($req);
					
		return $liste->fetchAll();	
	
		
	}*/
	
			function afficheO($id_offre,$conn)
		{
		$req="select nom,nbre_pt_fid,debut_offre,fin_offre,description from offre where id_offre= '".$id_offre."'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
		function supprimerOffre($id_offre,$conn){
		$req1="DELETE FROM offre where id_offre=".$id_offre;
		
		$conn->exec($req1);
		
	}
	function afficheOffre_par_client($conn)
		{
			$req="SELECT * from offre_par_client  ";
		$liste=$conn->query($req);
					
		return $liste->fetchAll();	
	
		
	}
	
		function rechercheOffre($val,$column,$conn)
		{
		$req="SELECT * FROM offre where ".$column."='".$val."'";
		$liste=$conn->query($req);
		return ($liste->fetchAll());
	}
	/*		function rechercheOffre_Nom($nom,$conn)
		{
		$req="SELECT * FROM offre where nom=".$nom;
		$liste=$conn->query($req);
		return ($liste->fetchAll());
	}
		function rechercheOffre_nbre_pt($pt,$conn)
		{
		$req="SELECT * FROM offre where nbre_pt_fid=".$pt;
		$liste=$conn->query($req);
		return ($liste->fetchAll());
	}*/
	
	
	function offre_get_id($user,$conn)
	{
		
		$requete2="SELECT id_offre FROM offre WHERE login='".$user."'";
	    $sth=$conn->prepare($requete2);
		$sth->execute();
		while($row = $sth->fetch(PDO::FETCH_ASSOC))
		{
			$id_offre = $row['id_offre'];
			
		}
		return $id_offre;
	}
	
	
	
}
?>
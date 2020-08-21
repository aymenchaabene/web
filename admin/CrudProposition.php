

<?php

//Pour insérer un chauffeur dans la base de données, une classe contenant les crud est crée
//en instanciant un objet de cette classe, la cnx avec la base de données est établie 
include ("setup.php");
include ("ClassProposition.php");



class crudProposition
{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function ajouterProp($prop,$conn)
	{
		
		
	
		
		$req1="INSERT INTO proposition(contenu) values ('".$prop->getContenu()."')" ;
		$conn->exec($req1);
	
		header('location:index2.php');

	}
	function afficheprop($conn)
		{
		$req="select * from proposition";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
			function recherche_prop($id_prop,$conn)
		{
		$req="SELECT * FROM proposition where id_prop=".$id_prop;
		$liste=$conn->query($req);
		return ($liste->fetchAll());
	}
	
	
		function supprimer_prop($id_prop,$conn){
		$req1="DELETE FROM proposition where id_prop=".$id_prop;
		
		$conn->exec($req1);
		
	}
	
/*

	
	function client_get_cin($user,$conn)
	{
		
		$requete2="SELECT cin FROM utilisateur WHERE login='".$user."'";
	    $sth=$conn->prepare($requete2);
		$sth->execute();
		while($row = $sth->fetch(PDO::FETCH_ASSOC))
		{
			$cin = $row['cin'];
			
		}
		return $cin;
	}
	
	

	
	
			function afficheO($id_offre,$conn)
		{
		$req="select nom,nbre_pt_fid,debut_offre,fin_offre,description from offre where id_offre= '".$id_offre."'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	

	
	
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
	

			function get_pt_fid_acc($user,$conn)
	{
		
		$requete2="SELECT pt_fid_acc FROM utilisateur WHERE login='".$user."'";
	    $sth=$conn->prepare($requete2);
		$sth->execute();
		while($row = $sth->fetch(PDO::FETCH_ASSOC))
		{
			$pt_fid_acc = $row['pt_fid_acc'];
			
		}
		return $pt_fid_acc;
	}
	
	
	
	
		function get_row_offre($conn)
	{
		
		$requete2="SELECT nom FROM offre ";
	    $sth=$conn->prepare($requete2);
		$sth->execute();
		while($row = $sth->fetch(PDO::FETCH_ASSOC))
		{
			 $x = $row['nom'];
			
		}
		return   $x;
	}
	*/
	
	
}
?>
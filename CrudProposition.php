

<?php

//Pour insérer un chauffeur dans la base de données, une classe contenant les crud est crée
//en instanciant un objet de cette classe, la cnx avec la base de données est établie 
include ("config.php");
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
		
		
	
		
		$req1="INSERT INTO proposition(contenu,image,date_prop) values ('".$prop->getContenu()."','".$prop->getImage()."','".$prop->getDate_prop()."')" ;
		$conn->exec($req1);
	
		//header('location:index2.php');

	}
	function afficheprop($conn)
		{
		$req="select * from proposition";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
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
/*
	function modifierOffre($offre,$conn)
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
	
	function modif_pt_liv($cin,$conn)
	{
		$req="UPDATE utilisateur SET pt_fid_acc=pt_fid_acc-200 where cin=".$cin;
		$conn->exec($req);
	}
	
		function modif_pt_off_sup($cin,$conn)
	{
		$req="UPDATE utilisateur SET pt_fid_acc=pt_fid_acc-900 where cin=".$cin;
		$conn->exec($req);
	}
		function modif_pt_bon_achat($cin,$conn)
	{
		$req="UPDATE utilisateur SET pt_fid_acc=pt_fid_acc-500 where cin=".$cin;
		$conn->exec($req);
	}
			function modif_pt_entretient($cin,$conn)
	{
		$req="UPDATE utilisateur SET pt_fid_acc=pt_fid_acc-300 where cin=".$cin;
		$conn->exec($req);
	}
	*/
		
	/*
	
	
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
	
		function rechercheOffre($id_offre,$conn)
		{
		$req="SELECT * FROM offre where id_offre=".$id_offre;
		$liste=$conn->query($req);
		return ($liste->fetchAll());
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
	
	
				function afficheOff_selon_pt_fid($nbre_pt,$conn)
		{
		$req="select nom,nbre_pt_fid,debut_offre,fin_offre,description from offre where nbre_pt_fid <= '".$nbre_pt."'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
					function affiche_off_livraison($conn)
		{
		$req="select nom,nbre_pt_fid,debut_offre,fin_offre,description from offre where nom = 'Livraison gratuite'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	
						function affiche_off_entr($conn)
		{
		$req="select nom,nbre_pt_fid,debut_offre,fin_offre,description from offre where nom = 'Entretient gratuit'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	
							function affiche_off_bon_achat($conn)
		{
		$req="select nom,nbre_pt_fid,debut_offre,fin_offre,description from offre where nom = 'Bon d achat 50 DT'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	
								function affiche_off_surprise($conn)
		{
		$req="select nom,nbre_pt_fid,debut_offre,fin_offre,description from offre where nom = 'Offre surprise'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
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
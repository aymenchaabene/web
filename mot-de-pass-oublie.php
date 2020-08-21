<?php 

// Connect to server and select databse.
include 'tets.php';
//include 'connexion.php';

	include ("config.php");
	
class MDPOublie {
	
	public $conn;
		
	
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	
	function Recuperer_mdp($conn)
	{
if(isset($_POST['mail']))
	$mail = ($_POST['mail']);



$sql = "SELECT * FROM utilisateur WHERE mail = '$mail' ";
	
		$req = $conn->query($sql);
 
$count = $req->rowCount();

if($count == 0 )//si le nombre de lignes retourne par la requete != 1
{	
	echo("<script>alert('Erreur Ce Compte N'Existe Pas !')</script>");
	 header ("Refresh: 2;URL=index.php");
}

else
	
{
	$row1 = $req->fetch(PDO::FETCH_ASSOC);
			
	
	$requette="SELECT mdp FROM utilisateur WHERE mail = '$mail' ";
			   $retour = $conn->query($requette);

	
$row2 = $retour->fetch(PDO::FETCH_ASSOC);
	
	 
	$message = ' Bonjour, votre mot de passe est  : '.($row2['mdp']).'     Merci pour votre visite';
	
			   $to=$row1['mail'];
			   
			   mailing($to,$message);
	echo("<script>alert('Mot De Passe A Ete Envoyé vers votre adresse mail !')</script>");
}
			   header ("Refresh: 2;URL=index2.php");
	}

	}
	

?>
 
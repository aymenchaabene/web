

<?php

//Pour insérer un chauffeur dans la base de données, une classe contenant les crud est crée
//en instanciant un objet de cette classe, la cnx avec la base de données est établie 
include ("config.php");
include ("client.php");
//include 'connexion.php';
include 'tets.php';

class crudClient
{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function insertClient($client,$conn)
	{
	
	   
		
		
		$confirm=md5(uniqid(rand())); 
		$email=($_POST['email']);
			
			$requette="SELECT * FROM `client` WHERE `mail`='$email'";
			
			
			
	
		$resultat = $conn->query($requette);

		$count = $resultat->rowCount();
	
		
	if($count==0)
	{
		
		$req1="INSERT INTO client (login,mdp,cin,nom, prenom,adresse,  tel, mail, sexe, date_naiss,profession,etat_civil,confirm) values 
		('".$client->getLogin()."','".$client->getMdp()."','".$client->getCin()."','".$client->getNom()."','".$client->getPrenom()."',
		'".$client->getAdresse()."','".$client->getTelephone()."','".$client->getEmail()."','".$client->getSexe()."',
		'".$client->getDate_naiss()."','".$client->getProfession()."','".$client->getEtat_civil()."','$confirm' )" ;
			$conn->query($req1);
	
		$to=($_POST['email']);
		//$to='wiem.boudoukhane@esprit.tn';
			//$message = ' Bonjour, votre mot de passe : '.($row2['mdp']).'     Merci pour votre visite';
		//$message=" Bonjour, veuillez executer ce lien afin de confirmer votre inscription :  http://127.0.0.1/final/confirm.php?passkey=$confirm&email=$email  Merci pour votre confiance.";
		// send email
		
		
		$message = '<html><body>';
		$message .='Bonjour,<br><br> Veuillez executer ce lien afin de confirmer votre inscription :  http://127.0.0.1/final/confirm.php?passkey='.$confirm.'&email='.$email.'  ;<br><br>';
	
				$message .= '<img src="https://scontent-bru2-1.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/13076702_10207728690869213_6216681338505829388_n.jpg?oh=f99a1b466bf861298a7fbc44d3186658&oe=57AB22E2" height=200 width=500/><br>';

		$message .= "<i>Merci pour votre confiance.</i><br>";
		$message .= "<i>Cordialement,</i>";


		$message .= "</body></html>";
		
		mailing($to,$message);
		//header('location:indexconfirmation.php');
		echo" vous etes inscris";
	}
	else
		echo "erreur ";
		//header('location:index.php');
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
	
		function afficheClient($conn)
		{
		$req="select login,mdp,cin,nom,prenom,adresse,tel,mail,sexe,date_naiss,profession,etat_civil from utilisateur ";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	
			function afficheC($cin,$conn)
		{
		$req="select login,mdp,cin,nom,prenom,adresse,tel,mail,sexe,date_naiss,profession,etat_civil from utilisateur where cin= '".$cin."'";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	
		function supprimerClient($cin,$conn){
		$req1="DELETE FROM utilisateur where cin=".$cin;
		
		$conn->exec($req1);
		
	}
		function rechercheClient($cin,$conn)
		{
		$req="SELECT * FROM utilisateur where cin=".$cin;
		$liste=$conn->query($req);
		return ($liste->fetchAll());
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

	
	
	
}
?>
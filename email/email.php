<?php 

include ('m.php');
include ('../admin/crudlignedecommande.php');
include ('../admin/crudClient.php');

		
	if (isset($_GET['id_commande']))
	{
		$id_commande=$_GET['id_commande'];
	}
	
	$crud1=new crudlignedecommande();
	$liste=$crud1->Afficher_1_Commande($crud1->conn,$id_commande);

	

	if (isset($_GET['id_c']))
	{
		$id_client=$_GET['id_c'];
	}

	$crud2=new crudClient();
	$liste2=$crud2->recupererClient($id_client,$crud2->conn);
		foreach ($liste2 as $l2)
		{
			$nom=$l2['nom'].' '.$l2['prenom'];
		}

		$to='oussema.benghorbel@esprit.tn';
		//$to='wiem.boudoukhane@esprit.tn';
			//$message = ' Bonjour, votre mot de passe : '.($row2['mdp']).'     Merci pour votre visite';

		foreach ($liste as $l)
		{
		if (isset($_GET['id'])&& $_GET['id']==1)
		{
			
		$message = '<html><body>';
		$message .='Bonjour '.$nom.',<br><br>Votre commande a été confirmée.<br><br>Détails de votre commande:<br><br>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td><strong>A l'odre de:</strong> </td><td>".$nom."</td></tr>";
		$message .= "<tr><td><strong>Date de la commande:</strong> </td><td>".$l['date_commande']."</td></tr>";
		$message .= "<tr><td><strong>Adresse:</strong> </td><td>".$l['adresse_commande']."</td></tr>";
		$message .= "<tr><td><strong>Pour toutes informations complémentaires:</strong> </td><td>http;//localhost/projectweb/products.php</td></tr>";
		$message .= "</table>";
				$message .= '<img src="https://scontent-bru2-1.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/13076702_10207728690869213_6216681338505829388_n.jpg?oh=f99a1b466bf861298a7fbc44d3186658&oe=57AB22E2" height=200 width=500/><br>';

		$message .= "<i>Merci d'avoir choisi Meuble Ben Ghorbel</i><br>";
		$message .= "<i>Cordialement,</i>";


		$message .= "</body></html>";
		// send email
		mailing($to,$message);
		header("Location: ../admin/table.php");

	
		}
		if (isset($_GET['id'])&& $_GET['id']==2)
		{
		$message = '<html><body>';
		//$message .= '<img src="../images/logo.png" />';
		$message .='Bonjour '.$nom.',<br><br>Votre commande a été annulée.<br><br>Détails de votre commande:<br><br>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td><strong>A l'odre de:</strong> </td><td>".$nom."</td></tr>";
		$message .= "<tr><td><strong>Date de la commande:</strong> </td><td>".$l['date_commande']."</td></tr>";
		$message .= "<tr><td><strong>Adresse:</strong> </td><td>".$l['adresse_commande']."</td></tr>";
		$message .= "<tr><td><strong>Pour toutes informations complémentaires:</strong> </td><td>http;//localhost/projectweb/products.php</td></tr>";
		$message .= "</table>";
		$message .= "<i>Merci d'avoir choisi Meuble Ben Ghorbel</i><br>";
		$message .= "<i>Cordialement,</i>";

		$message .= "</body></html>";
		// send email
		mailing($to,$message);
		header("Location: ../admin/table.php");
	
		}
		}
?>
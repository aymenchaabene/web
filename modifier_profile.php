<?php
session_start();
	if(isset($_SESSION['login']) && isset($_SESSION['mdp']))
	{
		if(isset($_POST['sumit']) )
        {
			
				$user=$_SESSION['login'];
				include 'connexion.php';
				$login=($_POST['login']);
				$mdp=($_POST['mdp']);
				$cin=($_POST['cin']);
				$nom=($_POST['nom']);
				$prenom=($_POST['prenom']);
			    $adresse=($_POST['adresse']);
				$tel=($_POST['tel']);
				$mail=($_POST['email']);
				$sexe = ($_POST['sexe']);
				$date_naiss=($_POST['date']);
				
				
				
				$profession=($_POST['profession']);
				//$etat_civil=($_POST['etat_civil']);
	$etat_civil= 'celibataire';
				$requet="UPDATE `utilisateur` SET `login`='$login',`mdp`='$mdp' ,`cin`='$cin',`nom`='$nom',`prenom`='$prenom',`adresse`='$adresse',`tel`='$tel',`mail`= '$mail', `sexe`='$sexe', `date_naiss`='$date_naiss',`profession`='$profession',`etat_civil`='$etat_civil' WHERE `login`='$user'";
				
				
				
				mysqli_query($idcon,$requet);
				header('location:gestionprofile.php');
		}
	else
		{
			header('location:gestionprofile.php');
		}
	}

	else
	{
		header('location:../erreur.php');
	}

?>

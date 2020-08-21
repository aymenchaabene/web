

<?php
session_start();

		if(isset($_POST['sumit']) )
        {
	
				include 'connexion.php';
				$login=($_POST['login']);
				$mdp=($_POST['mdp']);
				$cin=($_POST['cin']);
				$nom=($_POST['nom']);
				$prenom=($_POST['prenom']);
			    $adresse=($_POST['adresse']);
				$tel=($_POST['tel']);
				$mail=($_POST['email']);
				$sexe ='female';
				$date_naiss=($_POST['date']);
				
				
				
				$profession=($_POST['profession']);
				$etat_civil=($_POST['liste']);
				
	         //  $etat_civil= 'celibataire';
				
			
				$requet="UPDATE `utilisateur` SET `login`='".$login."',`mdp`='".$mdp."' ,`cin`='".$cin."',`nom`='".$nom."',`prenom`='".$prenom."',`adresse`='".$adresse."',`tel`='".$tel."',`mail`='" .$mail."', `sexe`='".$sexe."', `date_naiss`='".$date_naiss."',`profession`='".$profession."',`etat_civil`='".$etat_civil."' WHERE `cin`=".$cin;
				
				
				
				if(mysqli_query($idcon,$requet))
		header("location:wiem.php");}
				else 
					echo "no";
	
	


?>

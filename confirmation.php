<?php

// Connect to server and select databse.
	include ("config.php");

// Passkey and email that got from link 
$passkey=($_GET['passkey']);
$email=($_GET['email']);

class Confirm{
	

	public $conn;
		
	
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	
	function confirmer($conn){
$passkey=($_GET['passkey']);
$email=($_GET['email']);
//Retrieve data from table register to know if he is activated before
$sql11="SELECT * FROM utilisateur WHERE mail ='$email'";
$result11 = $conn->query($sql11);


if($result11)
{
	$count1= $result11->rowCount();
	if($count1==1){
	echo "Your account is already active !";}
}



$sql1="SELECT * FROM client WHERE confirm='$passkey'";
$result1 = $conn->query($sql1);


if($result1)
{
	// Count how many row has this passkey
	$count= $result1->rowCount();
	
	if($count==1)
	{
           
			   while($rows = $result1->fetch())
			   {

		$cin=$rows[2];
		$adresse=$rows[5];
		$nom=$rows[3];
		$prenom=$rows[4];
		$date_naiss=$rows[9];
		$sexe=$rows[8];
		$mail=$rows[7];
		$telephone=$rows[6];
		$login=$rows[0];
		$mdp=$rows[1];
		$etat_civil=$rows[11];
		$profession=$rows[10];}
		?>
		<br>
		<?php
		$sql2="INSERT INTO `utilisateur` (`login`,`mdp`,`cin`,`nom`, `prenom`,`adresse`,  `tel`, `mail`, `sexe`, `date_naiss`,`profession`,`etat_civil`) values 
		('$login','$mdp','$cin','$nom','$prenom','$adresse','$telephone','$email','$sexe','$date_naiss','$profession','$etat_civil')" ;
				
		$sql3="INSERT INTO `bannis` (`login`,`mdp`,`cin`,`nom`, `prenom`,`adresse`,  `tel`, `mail`, `sexe`, `date_naiss`,`profession`,`etat_civil`) values 
		('$login','$mdp','$cin','$nom','$prenom','$adresse','$telephone','$email','$sexe','$date_naiss','$profession','$etat_civil')" ;
		
		$result2= $conn->query($sql2);
		$result3= $conn->query($sql3);
		
		
		if($result2)
		{
			echo "Your account has been activated";

		
			$sql3="DELETE FROM client WHERE confirm = '$passkey'";
			$result3=$conn->query($sql3);
		
			header("Refresh: 2; url=index2.php");
		}
	}

	   // if not found passkey, display message "Wrong Confirmation code" 
		else 
		{
			echo "Wrong Confirmation code";
			// header("Refresh: 2; url=index.php");
		}
}

	}
}
?>

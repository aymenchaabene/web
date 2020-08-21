<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php

include ("crudClient.php");
if ($_POST['er']=="false")
{
	header('location:account.php');
	}
ELSE {
$cc=new crudClient(); //cnx déjà établie dans le constructeur de la classe crudClient
//2-récupérer les informations depuis le formulaire et créer un objet  à insérer
//echo $_POST['er'];

$sexe="";


if (isset($_POST['choix'])){$sexe=$_POST['choix'];} else {$sexe="";};

 
if (isset($_POST['login']) and isset($_POST['mdp']) )
{
	
	$client = new Client ($_POST['login'],$_POST['mdp'],$_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['tel'],$_POST['email'],$_POST['choix'],$_POST['date'],$_POST['profession'],$_POST['liste']);	

$cc->insertClient($client,$cc->conn);
header('location:indexconfirmation.php');
echo "Insertion effectuée avec succès";
}


else {echo"no";}

}


?>

</body>
</html>
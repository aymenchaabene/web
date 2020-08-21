<?PHP
include ("crudClient.php");

$cc=new crudClient();


$sexe="";


if (isset($_POST['choix'])){$sexe=$_POST['choix'];} else {$sexe="";};

	
if(isset($_POST['sumit']) )

{


	$newClient=new Client ($_POST['login'],$_POST['mdp'],$_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['tel'],$_POST['email'],$_POST['choix'],$_POST['date'],$_POST['profession'],$_POST['liste']);	
	$cc->modifierClient($newClient,$cc->conn);
	
	header('location:crm.php');



}
else
		{
			header('location:crm.php');
		}
	

	
	
	
	


<?PHP
include ("crudClient.php");
$cc=new crudClient();


session_start();


$sexe="";


if (isset($_POST['choix'])){$sexe=$_POST['choix'];} else {$sexe="";};

	if(isset($_SESSION['login']) && isset($_SESSION['mdp']))
	{
if(isset($_POST['sumit']) )

{

//echo $_POST['liste'];
	$newClient=new Client ($_POST['login'],$_POST['mdp'],$_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['tel'],$_POST['email'],$_POST['choix'],$_POST['date'],$_POST['profession'],$_POST['liste']);	
	$cc->modifierClient($newClient,$cc->conn);
	
	header('location:gestionprofile.php');

	//	header('location:afficheChauffeur.php');

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

	
	
	

/*else
{
$cin=$_GET['cin'];
$client=$cc->recupererClient($cin,$cc->conn);
//var_dump($chauffeur);

?>
<form method="POST">
<table>
<?PHP foreach ($cline as $ch){ ?>
<tr>
<td>Nom <input type="text" name="nom" value="<?PHP echo $ch['nom'];  ?>"></td>
<td>Preom <input type="text" name="prenom" value="<?PHP echo $ch['prenom'];  ?>"></td>
<td>Matricule <input type="text" name="matricule" value="<?PHP echo $ch['matricule'];  ?>"></td>
<td>Sexe <input type="text" name="sexe" value="<?PHP echo $ch['sexe'];  ?>"></td>
<td>Vehicule <input type="text" name="vehicule" value="<?PHP echo $ch['vehicule'];  ?>"></td>
<td>Horaire <input type="text" name="horaire" value="<?PHP echo $ch['horaire'];  ?>"></td>
</tr>
<tr>
<td><input type="submit" value="enregistrer" name="enregistrerModif"> </td>
</tr>
<?PHP } ?>
</table>
</form>
<?PHP } ?>*/
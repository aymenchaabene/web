<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php
/*********************************************************************************************************************/
//1- établir la cnx avec la base de données
//2- récupérer les informations depuis le formulaire
//3- créer un objet chauffeur et l'insérer dans la base [méthode d'insertion dans la base dans la classe chauffeur ]
/*********************************************************************************************************************/
include ("crudVehicule.php");
$cc=new crudVehicule();
 //cnx déjà établie dans le constructeur de la classe crudChauffeur
//2-récupérer les informations depuis le formulaire et créer un objet chauffeur à insérer
/*$horaire="";
$sexe="";
$checked=0;
if (isset($_POST['jour'])){$horaire=$horaire."jour";$checked=1;}
if (isset($_POST['nuit'])){
	if ($checked==1){$horaire=$horaire.",";}
	$horaire=$horaire."nuit";
	}
if (isset($_POST['choix'])){$sexe=$_POST['choix'];} else {$sexe="";};
if (isset($_POST['nom']) and isset($_POST['prenom'])and isset($_POST['cin']) and isset($_POST['matricule']) and isset($_POST['vehicule']) ) //and isset($_POST['jour'])and isset($_POST['nuit']) )*/

$id=$_POST['id_v'];	
echo $id;
$veh= new vehicule($id,$_POST['gouvernorat']);	
//print_r($_POST['gouvernorat']);*
echo $veh->getId();
$cc->insertVehicule($veh,$cc->conn);

header ('location: form.php');

?>
<form action="afficheVehicule.php" method="POST">
</form>
</body>
</html>
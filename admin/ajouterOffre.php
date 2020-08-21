<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php

include ("crudOffre.php");

$cc=new crudOffre(); 

$date=date("Y-m-d");
echo $date ;

if (isset($_POST['nom']) and isset($_POST['nbre_pt_fid'])and isset($_POST['debut_offre']) and isset($_POST['fin_offre']) and isset($_POST['description']) ) 
{
$offre=new Offre ($_POST['nom'],$_POST['nbre_pt_fid'],$_POST['debut_offre'],$_POST['fin_offre'],htmlentities($_POST['description']));	

$cc->ajouterOffre($offre,$cc->conn);
echo "Insertion effectuée avec succès";

}
else
{
	echo "noooo";
}
header('location:off.php');

?>

</form>
</body>
</html>
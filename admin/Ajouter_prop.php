<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php

include ("crudProposition.php");

$cc=new crudProposition(); 



if (isset($_POST['contenu']) ) 
{
$prop=new Offre (htmlentities($_POST['contenu']));	

$cc->ajouterProp($offre,$cc->conn);
echo "Insertion effectuée avec succès";

}
else
{
	echo "noooo";
}
header('location:prop_back.php');

?>

</form>
</body>
</html>
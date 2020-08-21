<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php

include ("crudOffre.php");

$cc=new crudOffre(); 


$cin=$_GET['cin'];
$id_offre=$_GET['id'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$nom_offre=$_GET['nom_offre'];

$cc->ajouterOffre_client($cin,$nom,$prenom,$id_offre,$nom_offre,$cc->conn);
echo "Insertion effectuée avec succès";



header('location:gestionprofile.php');

?>

</form>
</body>
</html>
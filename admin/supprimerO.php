<?PHP
include ("crudOffre.php");

$cc=new crudOffre();


	$id_offre=$_GET['id_offre'];

	$cc->supprimerOffre($id_offre,$cc->conn);
	
	header('location:off.php');




?>

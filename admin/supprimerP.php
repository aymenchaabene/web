<?PHP
include ("crudProposition.php");

$cc=new crudProposition();


	$id_prop=$_GET['id_prop'];

//	$cc->supprimer_prop($id_prop,$cc->conn);
	
	header('location:prop_back.php');




?>
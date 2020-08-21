<?PHP
include ("crudClient.php");

$cc=new crudClient();


	$cin=$_GET['cin'];

	$cc->supprimerClient($cin,$cc->conn);
	
	header('location:crm.php');




?>

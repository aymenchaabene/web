<?PHP
include ("crudOffre.php");

$cc=new crudOffre();

//id_offre=
	
if(isset($_POST['sumit']) )

{


	$newOffre = new Offre ($_POST['nom'],$_POST['nbre_pt_fid'],$_POST['debut_offre'],$_POST['fin_offre'],$_POST['description']);	
	$cc->modifierOffre($newOffre,$_GET['id'],$cc->conn);
	
	header('location:off.php');



}
else
		{
			
			header('location:off.php');
		}
	

	
	
	
	

?>
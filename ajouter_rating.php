<?php

session_start();

if(!(isset($_SESSION['login']) && isset($_SESSION['mdp'])  ))
	{
		header('Location: account.php');
	}
else
{
	 $login= $_SESSION['login']	;	
	 $mdp= $_SESSION['mdp']	;
}
 ?>
<?php

include ("admin/crud_rating.php");


$cc=new crudrating(); 

if(isset($_POST['rate']))
{
	$liste1=$cc->cinfromlogin($login,$mdp,$cc->conn);
	
foreach($liste1 as $l)
{
$cin=$l["cin"];
}	
	$id=$_POST['id_produit'];
	$note=$_POST['rate'];
	if ($cc->findcin($cin,$id,$cc->conn))
	{
	$liste=$cc->findcin($cin,$id,$cc->conn);
	
foreach($liste as $l)
{
$cin=$l["cin_client"];
$id=$l["id_produit"];

}  
	echo "<script> location.href='affichage_produit_client.php?etat=no'</script>";
	}
else	
{
	$rate=new rating($id,$note,$cin);
	
	$cc->insertrating($rate,$cc->conn);

	echo "<script> location.href='affichage_produit_client.php?etat=done'</script>";
}	
	 
		
}



?>


<?php 
session_start();
if(!(isset($_SESSION['login']) && isset($_SESSION['mdp'])  ))
	{
		header('Location: account.php');
	}
else
{
	$login= $_SESSION['login']	;	
	$password= $_SESSION['mdp']	;
 
}
include ("admin/crudentretien.php");
    $old_date=$_GET['date'];
    $cc=new crudentretien();

	$entr=new entretien('mjlkj',$_POST['date_entretien'],$_POST['adresse'],'oihohoh',$_POST['cin_client']);
	$cc->modifier_entretie($cc->conn,$entr,$old_date);
	echo "<script> location.href='choisir_entretien.php?etat=done'</script>";
	
?>
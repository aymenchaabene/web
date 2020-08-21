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
	
 ?>
<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php


include ("admin/crud_reclamation.php");
$login= $_SESSION['login']	;	
$password= $_SESSION['mdp']	;
 
$cc=new crudreclamation(); 

if ( isset($_POST['date_reclamation']) and isset($_POST['e_mail_client'])and isset($_POST['contenu_reclamation'] ) )
{
	
	if ($cc->cinfromlogin($login,$password,$cc->conn))
	{
	$liste=$cc->cinfromlogin($login,$password,$cc->conn);
	
foreach($liste as $l)
{
$cin=$l["cin"];

}


 
$rec=new reclamation($_POST['date_reclamation'],$_POST['e_mail_client'],htmlentities($_POST['contenu_reclamation'],ENT_QUOTES),$cin,'non_traité');	


$cc->insertreclamation($rec,$cc->conn);
echo "<script> location.href='ajout_reclamation.php?etat=done'</script>";

	}
	
else 
 echo "<script> location.href='ajout_reclamation.php?etat=email_non_valide'</script>";

}
else{
	echo "<script> location.href='ajout_reclamation.php?etat=probléme'</script>";
	
}


?>

</body>
</html>
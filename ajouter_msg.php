<?php

session_start();

if(!(isset($_SESSION['login']) && isset($_SESSION['mdp'])  ))
	{
		header('Location: account.php');
	}
else
{
	 $esem= $_SESSION['login']	;	
	 $mdp= $_SESSION['mdp']	;
}
	
 ?>

<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php

include ("admin/crudmsg.php");
$login= $_SESSION['login']	;	
	$password= $_SESSION['mdp']	;

$cc=new crudmsg(); 

if ( isset($_POST['e_mail_client']) and isset($_POST['date_msg'])and isset($_POST['sujet_msg'])  ) 
{
	
	if ($cc->cinfromlogin($login,$password,$cc->conn))
	{
	$liste=$cc->cinfromlogin($login,$password,$cc->conn);
	
foreach($liste as $l)
{
$cin=$l["cin"];
}
 


$msg=new message($_POST['e_mail_client'],$_POST['date_msg'],htmlentities($_POST['sujet_msg'],ENT_QUOTES),$cin,'non_lu','vide');	

$cc->insertmsg($msg,$cc->conn);
echo "<script> location.href='ajout_message.php?etat=done'</script>";

	}
	echo "<script> location.href='ajout_message.php?etat=email_non_valide'</script>";


}
else{
	echo "<script> location.href='ajout_message.php?etat=probléme'</script>";
	
}



?>


</body>
</html>

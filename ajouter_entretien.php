<html>
<head>
<meta charset="utf8">
</head>
<body>

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

$cc=new crudentretien();
 $login=$_POST['login'];
 $password=$_POST['password']; 
 $date=$_POST['date_entretien'];

if ( isset($_POST['e_mail_client']) and isset($_POST['date_entretien'])and isset($_POST['adresse']) and isset($_POST['type_entretien']) ) 
{
	
	if ($cc->cinfromlogin($login,$password,$cc->conn))
	{
	$liste=$cc->cinfromlogin($login,$password,$cc->conn);
	
foreach($liste as $l)
{
$cin=$l["cin"];


}

 if ($cc->findcin($cin,$cc->conn))
 { 
$liste2=$cc->verifdate($cc->conn,$date);	
foreach($liste2 as $l)
{
$note_d=$l["0"];
} 
	if ($note_d<10)
	{	
$entr=new entretien($_POST['e_mail_client'],$_POST['date_entretien'],$_POST['adresse'],$_POST['type_entretien'],$cin);	
$cc->insertentretien($entr,$cc->conn);

	
echo "<script> location.href='entretien(2).php?etat=done'</script>";
}
else 	
  echo "<script> location.href='entretien(2).php?etat=date'</script>";
   }
   
 else 	
  echo "<script> location.href='entretien(2).php?etat=entretien_par_commande'</script>";

 

	}
	
else  
  echo "<script> location.href='entretien(2).php?etat=email_non_valide'</script>";

}

else{
	echo "<script> location.href='entretien(2).php?etat=probléme'</script>";
	 
	
}

 
?>

</form>
</body>
</html>
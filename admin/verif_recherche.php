<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php







if ($_GET['action']=="Livraison gratuite" ) 
{

header('location:confirmliv.php');



}
if ($_GET['action']=="Entretient gratuit" ) 
{

header('location:confirm_ent.php');
}
if ($_GET['action']=="Bon d achat 50 DT" ) 
{

header('location:confirm_bon_achat.php');
}
if ($_GET['action']=="Offre surprise" ) 
{

header('location:confirm_off_surp.php');
}


?>

</form>
</body>
</html>
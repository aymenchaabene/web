<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
include ("crudVehicule.php");
$cc=new crudVehicule();
	$list=$cc->afficheLivraison($cc->conn);
	header('location:form.php');
	?> 
	
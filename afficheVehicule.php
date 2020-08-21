<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
include ("crudVehicule.php");
$cc=new crudVehicule();
	$list=$cc->afficheVehicule($cc->conn);
	var_dump($list);
	header('location:form.php');
	?> 
	
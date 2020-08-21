<?php
require_once 'crudVehicule.php';
echo $_POST['id_v']."<br>";
var_dump($_POST);

$cv = new crudVehicule();
$cv->supprimervehicule($_GET['id_v'], $cv->conn);
	header("Location: form.php");
	
?>
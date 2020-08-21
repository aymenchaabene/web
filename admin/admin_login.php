<?php 
session_start();
include ('crudproduit.php');
$crud=new crudproduit(); 
if(isset($_POST['username']) && isset($_POST['password']))
{
	$test=false ; 
	$username=$_POST['username'] ;
	$password=$_POST['password'] ;
	$liste=$crud->check_admin($crud->conn,$username,$password);
	foreach ($liste as $l)
	{
	if ($l['username']===$username && $l['password']===$password)
		$test=true ; 
	}
	
	if($test==true)
	{ $_SESSION['admin_login']=$username;
		header('location:index.php') ; 
	}
	else header('location:login.php?login=failed');
}

if (isset($_GET['action'])&& $_GET['action']=='disconnect')
{
	session_unset($_SESSION['admin_login']); 
	header('location:login.php');
	
	
	
}
?>
<?php
	     session_start();

		include ("config.php");
       // include ("client.php");
class login {
	
	public $conn;
		
	
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	
	function loginn($conn){
	if(isset($_POST['login']) && isset($_POST['mdp']))
	{
		$login = ($_POST['login']);
		$password = ($_POST['mdp']);
		
	$requete = "SELECT * FROM utilisateur WHERE login = '$login' AND mdp = '$password'";
	
		$resultat = $conn->query($requete);
		$result=$resultat->fetch() ; 
		$count = $resultat->rowCount();
		
		if($count==1)
		{
			$_SESSION['cin']= $result['cin']; 
			$_SESSION['login'] = $login;
			$_SESSION['mdp'] = $password;
			
			header("location:gestionprofile.php");
		
		//var_dump($_SESSION); 
		}
		
		else
		{
		
		     header('location:erreur.php');
			
		}
	}
	else
	{
		echo'no';
		//header('location:../erreur.php');
	}
	}
	}
?>
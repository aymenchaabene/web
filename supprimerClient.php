<?php
session_start();

	if(isset($_SESSION['login']) && isset($_SESSION['mdp']))
	{
		
				include("connexion.php");
				$cin=$_GET['cin'];
				$requete="delete from utilisateur where cin= $cin ";

				
				if (mysqli_query($idcon,$requete))
				header("location:wiem.php");
				else 
				echo "Suppression effectuee avec succees". mysql_error();
			}
			else
			{
				echo"yebta chwaya";
				//header('location:login.php');
			}
	
	else
	{	echo"yebta chwaya";
		//header('location:login.php');
	}	
?>
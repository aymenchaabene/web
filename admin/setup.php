<?php
class config
{
	function getConnexion()
	{
		$servername="localhost";
		$dbname="projetwebintegre";
		$username="knurd";
		$password="123456789";
		$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
		if ($conn)
		{
		echo "";}
		
		return $conn;
	}
}

?>
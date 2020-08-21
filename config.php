<?php
class config{
	function getConnexion(){
		$servername="localhost";
		$dbname="projetwebintegre";
		$username="root";
		$password="";
		$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
		return $conn;
	}
}


?>
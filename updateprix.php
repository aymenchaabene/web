<?php
if(isset($_GET['gouvernorat']))
{
	if ($_GET['gouvernorat'] == "Ben Arous" || $_GET['gouvernorat'] == "Tunis" || $_GET['gouvernorat'] == "Ariana" || $_GET['gouvernorat'] == "Manouba"){$prix = 10;}
	 
	elseif ($_GET['gouvernorat'] == "Zaghouan" || $_GET['gouvernorat'] == "Nabeul" || $_GET['gouvernorat'] == "Bizerte" || $_GET['gouvernorat'] == "Beja" || $_GET['gouvernorat'] == "Jendouba" || $_GET['gouvernorat'] == "Kef" || $_GET['gouvernorat'] == "Siliana"){$prix = 15;}
	 
	elseif ($_GET['gouvernorat'] == "Monastir" || $_GET['gouvernorat'] == "Sousse" || $_GET['gouvernorat'] == "Kairaouane" || $_GET['gouvernorat'] == "Mahdia" || $_GET['gouvernorat'] == "Sfax" || $_GET['gouvernorat'] == "Sidi Bouzid" || $_GET['gouvernorat'] == "Gafsa"){$prix = 20;}
	
	elseif ($_GET['gouvernorat'] == "Kebili" || $_GET['gouvernorat'] == "Gabes" || $_GET['gouvernorat'] == "Tozeur" ){$prix = 20;}
	
	elseif ($_GET['gouvernorat'] == "Tataouine" || $_GET['gouvernorat'] == "Mednine" ){$prix = 25;}
	echo $prix;
		
}

?>

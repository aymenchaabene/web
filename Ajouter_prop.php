<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php

include ("crudProposition.php");

$cc=new crudProposition(); 



if (isset($_POST['contenu']) ) 
{if(isset($_FILES['file']))
{
	$filename="C://xampp/htdocs/final/upload/".$_FILES['file']["name"];
	var_dump($_FILES);
	echo $filename;
	
move_uploaded_file($_FILES['file']['tmp_name'],$filename); 


	$img_url="upload/".$_FILES["file"]["name"];
	

}
//else if(!isset($_FILES['file'])){$img_url='';}

$prop=new Proposition(htmlentities($_POST['contenu']),$img_url,date("Y-m-d"));	


$cc->ajouterProp($prop,$cc->conn);
echo "Insertion effectuée avec succès";

}
else
{
	echo "noooo";
}
header('location:propositions.php');

?>

</form>
</body>
</html>
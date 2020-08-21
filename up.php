<?php
if(isset($_FILES['file']))
{
	$filename="C://xampp/htdocs/final/upload/".$_FILES['file']["name"];
	var_dump($_FILES);
	echo $filename;
	
move_uploaded_file($_FILES['file']['tmp_name'],$filename); 


	$img_url="/upload/".$_FILES["file"]["name"];
	
	echo $img_url;
}



 ?>

<?php

include ('Newslettre.php');
require_once('setup.php');
class crudnewslettre{
	
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function afficherlesnewslettres($conn)
{
		$req="SELECT * FROM Newslettre";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}

function Ajouter_Newslettre($conn,$Newslettre)
{
	
		$req1="INSERT INTO Newslettre VALUES (".$Newslettre->getId().",'".$Newslettre->getSubject()."','".$Newslettre->getmessage()."','".$Newslettre->getnewslettre_date()."')";
		
		if($conn->query($req1))
			echo 'done' ;
		
	
}

function Supprimer_Newslettre ($conn,$id) 
{
	echo $id ; 
				
				$req3="delete from Newslettre where id=$id" ;

						$conn->query($req3) ; 
		
	 

}


function update_Newslettre($conn,$cat)
{
		$req="Update Newslettre SET nom_Newslettre='".$cat->getNom()."' where id_Newslettre=".$cat->getId()." ";
		$conn->query($req);
		
}
	function afficheronenewslettre($conn,$id)
{
		$req="SELECT * FROM Newslettre where id=$id";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}
	function getemails($conn)
{
		$req="SELECT mail FROM utilisateur";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}
}



if (isset($_GET['id'])&& $_GET['id']==1)
{//ajouter



$subject="";
$message="";
$newslettre_date=date("d/m/y");

					if(isset($_POST))
					{
						$subject=($_POST['subject']);
						$message=addslashes($_POST['message']);
					
		
					
					
						$crud=new crudnewslettre();
						$Newslettre=new Newslettre($id=0,$subject,$message,$newslettre_date);
						$crud->Ajouter_Newslettre($crud->conn,$Newslettre);
						
						header('location:newslettre_ui.php') ; 
					}
}
/**
if (isset($_GET['id'])&& $_GET['id']==2 )
{
	
	//update un produit 
	if(isset($_POST['id_Newslettre_edit']))
	{
							$id_Newslettre=($_POST['id_Newslettre_edit']);

					

$nom_Newslettre="" ; 

		
		if(isset($_POST['nom_Newslettre']))
						$nom_Newslettre=($_POST['nom_Newslettre']);
		
		$crud=new crudNewslettre();
						$Newslettre=new Newslettre($id_Newslettre,$nom_Newslettre);
						$crud->update_Newslettre($crud->conn,$Newslettre);
	
	var_dump($_POST);
	var_dump($Newslettre);


 header('location:productmanagment.php');

}
}**/



if (isset($_GET['id'])&& $_GET['id']==4)
{//supprimer 
				$id_delete="";
				if(isset($_GET['id_Newslettre']))
						$id_delete=($_GET['id_Newslettre']);
					echo $id_delete ;
						$crud=new crudNewslettre();
					
						$crud->Supprimer_Newslettre($crud->conn,$id_delete);
						
						  header('Location: productmanagment.php');      
						}
						
						
if (isset($_GET['id'])&& $_GET['id']==5)
{//sendnewslettre 
				if(isset($_POST) && isset($_GET['id_newslettre']))
						$crud=new crudNewslettre();
				if (!empty($crud->afficheronenewslettre($crud->conn,$_GET['id_newslettre'])))
					$newslettre=$crud->afficheronenewslettre($crud->conn,$_GET['id_newslettre']);
				foreach ($newslettre as $newslettr)
				{
					$message=$newslettr['message']; 
					$subject=$newslettr['subject'];
				}
				$getmails=$crud->getemails($crud->conn);
				foreach($getmails as $g)
				{
					$maillist[]=$g['mail'];
				}
				
				require_once('smtp.php');
				//sendnewslettre();
var_dump($maillist);
				sendnewslettre($subject,$fromname='Ben Ghorbel Meubles',$maillist,$message);
				
			
						
						
						  //header('Location:newslettre_ui.php');      
}
if (isset($_GET['id'])&& $_GET['id']==6)
{//supprimer 


				$id_delete="";
				if(isset($_GET['id_newslettre']))
						$id_delete=($_GET['id_newslettre']);
					echo $id_delete ;
						$crud=new crudNewslettre();
					
						$crud->Supprimer_Newslettre($crud->conn,$id_delete);
						
						  header('Location: newslettre_ui.php');   

}




						
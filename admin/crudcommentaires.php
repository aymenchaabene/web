<?php
session_start();
include ('commentaires.php');
require_once('setup.php');
class crudcommentaires{
	
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function Afficher_commentaires($conn)
{
		$req="SELECT * FROM commentaires";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}

function Ajouter_commentaires($conn,$commentaires)
{
	
		$req1="INSERT INTO commentaires VALUES (".$commentaires->getId().",".$commentaires->getIdproduit().",'".$commentaires->getContenu()."','".$commentaires->getDatecomm()."',".$commentaires->getIdClient().");" ;
echo $req1;
		if($conn->query($req1))
				

			echo 'done' ;
		
	
}

function Supprimer_commentaire ($conn,$id) 
{
	echo $id ; 
				
				$req3="delete from commentaires where id=$id" ;
				if ($conn->query($req3))
						echo "done" ;
		
	 

}
function Afficher_products_commentaire($conn,$id)
{
		$req="SELECT * FROM commentaires where id_produit=$id";
		$liste=$conn->query($req);
			 return $liste->fetchAll();
}
/**
function update_categorie($conn,$cat)
{
		$req="Update categorie SET nom_categorie='".$cat->getNom()."' where id_categorie=".$cat->getId()." ";
		$conn->query($req);
		
}**/
}



if (isset($_GET['id'])&& $_GET['id']==1)
{//ajouter

$id_client=$_SESSION['cin'];
echo $id_client;
$id_produit=0;
$contenu='';
$date_com=date("d-m-Y");
if (isset($_POST['ajouter_commentaire']))
{
$id_produit=$_POST['id_produit'];
$contenu=$_POST['contenu'];
$contenu=addslashes($contenu);




					
				
					
		
					
					
						$crud=new crudcommentaires();
						$commentaire=new commentaires($id=0,$id_produit,$contenu,$date_com,$id_client);
						var_dump($commentaire);
						$crud->Ajouter_commentaires($crud->conn,$commentaire);

						
						header('location:../singleproduct.php?id='.$id_produit) ; 
}					
}
if (isset($_GET['id'])&& $_GET['id']==2)
{//afficher

$id_produit=$_GET['id_produit'];
					
					
						$crud=new crudcommentaires();
				
						$liste=$crud->Afficher_products_commentaire($crud->conn,$id_produit);
						
						echo $id_produit;
						var_dump($liste);

						//header('location:productmanagment.php') ; 
				
}
if (isset($_GET['id'])&& $_GET['id']==3 )
{
	
	//update un produit 
	if(isset($_GET['id_commentaire']))
	{
							$id_commentaire=($_GET['id_commentaire']);
							$id_produit=$_GET['id_produit'];

		
		$crud=new crudcommentaires();
						
						$crud->Supprimer_commentaire($crud->conn,$id_commentaire);
	
	var_dump($_POST);
	


header('location:../singleproduct.php?id='.$id_produit);

}
}



if (isset($_GET['id'])&& $_GET['id']==4)
{//supprimer 
				$id_delete="";
				if(isset($_GET['id_categorie']))
						$id_delete=($_GET['id_categorie']);
					echo $id_delete ;
						$crud=new crudcategorie();
					
						$crud->Supprimer_categorie($crud->conn,$id_delete);
						
						  header('Location: productmanagment.php');      
						}
						
<?php

include ('categorie.php');
require_once('setup.php');
class crudcategorie{
	
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function Afficher_categorie($conn)
{
		$req="SELECT * FROM categorie";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}

function Ajouter_categorie($conn,$categorie)
{
	
		$req1="INSERT INTO categorie VALUES (".$categorie->getId().",'".$categorie->getNom()."')";
		
		if($conn->query($req1))
			echo 'done' ;
		
	
}

function Supprimer_categorie ($conn,$id) 
{
	echo $id ; 
				$req2="UPDATE produits SET id_categorie=0 where id_categorie=$id" ;
				$req3="delete from categorie where id_categorie=$id" ;
				if ($conn->query($req2))
						$conn->query($req3) ; 
		
	 

}
function Afficher_products_categorie($conn,$id)
{
		$req="SELECT `id_produit`,produits.id_categorie,promotion.nom_promotion,promotion.Pourcentage_promotion,`nom_produit`,`prix_produit`,`qte_produit`,`desc_produit`,`date_produit`,`Status`,`img_url`,`ptsfid_produit`,`nom_categorie`,promotion.id_promotion FROM produits join categorie on produits.id_categorie=categorie.id_categorie join promotion on produits.id_promotion=promotion.id_promotion where produits.id_categorie=$id";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}
function similar_products($conn,$id)
{
		$req="SELECT `id_produit`,produits.id_categorie,promotion.nom_promotion,promotion.Pourcentage_promotion,`nom_produit`,`prix_produit`,`qte_produit`,`desc_produit`,`date_produit`,`Status`,`img_url`,`ptsfid_produit`,`nom_categorie`,promotion.id_promotion FROM produits join categorie on produits.id_categorie=categorie.id_categorie join promotion on produits.id_promotion=promotion.id_promotion where produits.id_categorie=$id order by rand() limit 3";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}

function update_categorie($conn,$cat)
{
		$req="Update categorie SET nom_categorie='".$cat->getNom()."' where id_categorie=".$cat->getId()." ";
		$conn->query($req);
		
}
}



if (isset($_GET['id'])&& $_GET['id']==1)
{//ajouter



$nom_categorie="";


					if(isset($_POST['nom_categorie']))
						$nom_categorie=($_POST['nom_categorie']);
					
		
					
					
						$crud=new crudcategorie();
						$categorie=new categorie($id=0,$nom_categorie);
						$crud->Ajouter_categorie($crud->conn,$categorie);
						
						header('location:productmanagment.php') ; 
						
}
if (isset($_GET['id'])&& $_GET['id']==2 )
{
	
	//update un produit 
	if(isset($_POST['id_categorie_edit']))
	{
							$id_categorie=($_POST['id_categorie_edit']);

					

$nom_categorie="" ; 

		
		if(isset($_POST['nom_categorie']))
						$nom_categorie=($_POST['nom_categorie']);
		
		$crud=new crudcategorie();
						$categorie=new categorie($id_categorie,$nom_categorie);
						$crud->update_categorie($crud->conn,$categorie);
	
	var_dump($_POST);
	var_dump($categorie);


 header('location:productmanagment.php');

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
						
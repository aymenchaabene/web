<?php

include ('promotions.php');
require_once('setup.php');
class crudpromotion{
	
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function Afficher_promotion($conn)
{
		$req="SELECT * FROM promotion";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}

function Ajouter_promotion($conn,$promotion)
{
	
		$req1="INSERT INTO promotion VALUES (".$promotion->getId().",'".$promotion->getNom()."',".$promotion->getPourcentage().")" ;
		
		if($conn->query($req1))
			echo 'done' ;
		
	
}

function Supprimer_promotion ($conn,$id) 
{
	echo $id ; 
				$req2="UPDATE produits SET id_promotion=0 where id_promotion=$id" ;
				$req3="delete from promotion where id_promotion=$id" ;
				if ($conn->query($req2))
						$conn->query($req3) ; 
		
	 

}
function Afficher_products_promotion($conn,$id)
{
		$req="SELECT * FROM produits where id_promotion=$id";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}

function original_price ($conn,$id) 
{
	$test=false ; 
	$current_promo=0;
	$req0="select produits.id_promotion,prix_produit, `Pourcentage_promotion` from produits join promotion on produits.`id_promotion`=promotion.`id_promotion` where id_produit=$id ";
	$liste=$conn->query($req0);
	$l1=$liste->fetchAll();	
	foreach ($l1 as $l)
	{
		$current_promo=$l['id_promotion']; 
		$current_pourcentage=$l['Pourcentage_promotion']; 
		$current_prix=$l['prix_produit']; 
		
		
	}
				
	 $prix=$current_prix*100/(100-$current_pourcentage); 
	$prix=round($prix) ; 
	 $req_init="update produits SET id_promotion=1,prix_produit=$prix where id_produit=$id";
	 if($conn->query($req_init))
		 $test=true ; 
	 else $test=false ; 
	echo $test ; 
	 return $test ; 
}



function affecter_products_promotion($conn,$id,$id_promo)
{
		
		$req="update produits SET id_promotion=$id_promo where id_produit=$id";
		$req2="update produits SET prix_produit=prix_produit -((SELECT `Pourcentage_promotion` from promotion where `id_promotion`=$id_promo)*prix_produit/100 ) where id_produit=$id ";
		if($conn->query($req))
			$conn->query($req2);
		
			
}
}



if (isset($_GET['id'])&& $_GET['id']==1)
{//ajouter



$nom_promotion="";


					if(isset($_POST['nom_promotion'])&& isset($_POST['Pourcentage'])) {
						$nom_promotion=($_POST['nom_promotion']);
					$poucentage_promotion=$_POST['Pourcentage'] ;
		
					
					
						$crud=new crudpromotion();
						$promotion=new promotion($id_promotion=0,$nom_promotion,$poucentage_promotion);
						var_dump($promotion);
						$crud->Ajouter_promotion($crud->conn,$promotion);
						
						
					
					var_dump($promotion);
					var_dump($_POST);}
header('location:promo.php') ; 					
}



if (isset($_GET['id'])&& $_GET['id']==4)
{//supprimer 
				$id_delete="";
				if(isset($_GET['id_promotion']))
						$id_delete=($_GET['id_promotion']);
					echo $id_delete ;
						$crud=new crudpromotion();
					
						$crud->Supprimer_promotion($crud->conn,$id_delete);
						
						  header('Location: promo.php');      
						}
						
						
if (isset($_GET['id'])&& $_GET['id']==2)
{//attribuer 
				var_dump($_POST);
				
if(!empty($_POST['check_liste'])) {
	$crud= new crudpromotion();
				$id_promo=$_POST['promo2set']; 
    foreach($_POST['check_liste'] as $check) {
		
			
		$crud->original_price ($crud->conn,$check);
        $crud->affecter_products_promotion($crud->conn,$check,$id_promo);

			
    }
}							
								
						
						
				  header('Location: promo.php');      
						

}

if (isset($_GET['id'])&& $_GET['id']==3)
{//attribuer 
				
		$crud=new crudpromotion();
		
		

}
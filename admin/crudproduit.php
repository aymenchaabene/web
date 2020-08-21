<?php
require_once ('setup.php');
include ('produit.php');
//require_once('crudnotification.php'); 


class crudproduit{
	
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function Afficher_Produit($conn)
{
		$req="SELECT `id_produit`,produits.id_categorie,promotion.nom_promotion,promotion.Pourcentage_promotion,`nom_produit`,`prix_produit`,`qte_produit`,`desc_produit`,`date_produit`,`Status`,`img_url`,`ptsfid_produit`,`nom_categorie`,promotion.id_promotion FROM produits join categorie on produits.id_categorie=categorie.id_categorie join promotion on produits.id_promotion=promotion.id_promotion ";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
}

function Afficher_1_Produit($conn,$id)
{
		$req="SELECT `id_produit`,produits.id_categorie,promotion.nom_promotion,promotion.Pourcentage_promotion,`nom_produit`,`prix_produit`,`qte_produit`,`desc_produit`,`date_produit`,`Status`,`img_url`,`ptsfid_produit`,`nom_categorie`,promotion.id_promotion FROM produits join categorie on produits.id_categorie=categorie.id_categorie join promotion on produits.id_promotion=promotion.id_promotion where produits.id_produit=$id";
		$liste=$conn->query($req);
					
		return $liste->fetchAll();	
}

	function Ajouter_Produit($conn,$produit)
{
	
		$req1="INSERT INTO produits VALUES (".$produit->getId().",".$produit->getIdcat().",".$produit->getIdpromo().",'".$produit->getNom()."',".$produit->getPrix().
		",".$produit->getQuantity().",'".$produit->getDesc()."','".$produit->getDate_produit()."','".$produit->getStatus_produit()."','".$produit->getImg_produit()."',".$produit->getFid_pts().")";
		
		if($conn->query($req1))
			echo 'done' ;
		
	
}

	function Rechercher_Produit($conn,$id)
{
	$req5="SELECT `id_produit`,produits.id_categorie,promotion.nom_promotion,promotion.Pourcentage_promotion,`nom_produit`,`prix_produit`,`qte_produit`,`desc_produit`,`date_produit`,`Status`,`img_url`,`ptsfid_produit`,`nom_categorie`,promotion.id_promotion FROM produits join categorie on produits.id_categorie=categorie.id_categorie join promotion on produits.id_promotion=promotion.id_promotion where nom_produit like ('%".$id."%')";
	$liste=$conn->query($req5); 
	return $liste->fetchAll(); 
		
}
	
	function Supprimer_Produit ($conn,$id) 
{
				$req1="delete from lignedecommande where id_produit=$id";
				$req3="delete from produits where id_produit=$id" ;
				if ($conn->query($req1))	
					$conn->query($req3);
	 
}
	function Update_produit($conn,$produit)
	{
		$req1="UPDATE produits SET id_categorie=".$produit->getIdcat().",id_promotion=".$produit->getIdpromo().",nom_produit='".$produit->getNom()."',prix_produit='".$produit->getPrix()."',qte_produit='".$produit->getQuantity()."',desc_produit='".$produit->getDesc()."',img_url='".$produit->getImg_produit()."',ptsfid_produit='".$produit->getFid_pts()."' WHERE id_produit=".$produit->getId()."";
		$conn->query($req1) ; 
		
		
	}
	
	function change_Status($conn,$id,$Status)
	{
		$req="UPDATE produits SET Status='$Status' where id_produit=$id; "; 
		$conn->query($req);
		
		
	}
	function statproduit($conn)
{
	$req5="select sum(lignedecommande.`qte_produit`) as 'nombre',nom_produit from lignedecommande join produits on lignedecommande.id_produit=produits.id_produit group by lignedecommande.`id_produit`";
	$liste=$conn->query($req5); 
	return $liste->fetchAll(); 
		
}
	function check_admin($conn,$username,$password)
	{
		$req="select username,password from admin where username='$username' AND password='$password' ; "; 
		$liste=$conn->query($req);
		return $liste->fetchAll() ;
	
		
		
	}
	function random_6_produits($conn)
{
	$req5="select`id_produit`,produits.id_categorie,promotion.nom_promotion,promotion.Pourcentage_promotion,`nom_produit`,`prix_produit`,`qte_produit`,`desc_produit`,`date_produit`,`Status`,`img_url`,`ptsfid_produit`,`nom_categorie`,promotion.id_promotion FROM produits join categorie on produits.id_categorie=categorie.id_categorie join promotion on produits.id_promotion=promotion.id_promotion order by rand() limit 6";
	$liste=$conn->query($req5); 
	return $liste->fetchAll(); 
		
}
	function bestsales($conn)
{
	$req5="select sum(lignedecommande.`qte_produit`) as 'nombre',produits.id_produit,produits.nom_produit,produits.img_url,produits.prix_produit,promotion.Pourcentage_promotion from lignedecommande join produits on lignedecommande.id_produit=produits.id_produit join promotion on produits.id_promotion=promotion.id_promotion  group by lignedecommande.`id_produit` ORDER BY `nombre` DESC limit 6 ";
	$liste=$conn->query($req5); 
	return $liste->fetchAll(); 
		
}
		
	function promoscroll($conn)
{
	$req5="select`id_produit`,produits.id_categorie,promotion.nom_promotion,promotion.Pourcentage_promotion,`nom_produit`,`prix_produit`,`qte_produit`,`desc_produit`,`date_produit`,`Status`,`img_url`,`ptsfid_produit`,`nom_categorie`,promotion.id_promotion FROM produits join categorie on produits.id_categorie=categorie.id_categorie join promotion on produits.id_promotion=promotion.id_promotion where promotion.Pourcentage_promotion>1  order by promotion.Pourcentage_promotion DESC";
	$liste=$conn->query($req5); 
	return $liste->fetchAll(); 
		
}


function updatequantity($conn,$qte,$id)
{
	
	$req="Update produits SET qte_produit=qte_produit-$qte where id_produit=$id "; 
	$conn->query($req);
	$req="Select nom_produit,qte_produit from produits where id_produit=$id"; 
	
	$liste=$conn->query($req); 
	return $liste->fetchAll(); 
	
	foreach($liste as $l)
	{
		if($l['qte_produit']>10)
		{
									
						$content_notification="quantité de ".$l['nom_produit']." est presque epuisée";
			$type_notification="o";
			$time_notification = date('Y-m-d H:i:s');
			
			$notification=new notification($content_notification,$time_notification,$type_notification);
			$crudnotification=new crudnotification();
			$crudnotification->Ajouter_Notification($crudnotification->conn,$notification);
			
		}
		
	}
		
		
	
}		
}

if (isset($_GET['id'])&& $_GET['id']==1)
{//ajouter

if (isset($_FILES["fileInput"]))
					{
$filename="C://wamp/www/projetwebintegre2/uploads/" . $_FILES["fileInput"]["name"] ; 
							
				move_uploaded_file($_FILES["fileInput"]["tmp_name"],$filename);
					echo $filename." photo uploaded";} 

$id_categorie=0 ; 
$id_promotion=1 ; 
$nom_produit="";

$prix_produit=0;
$qte_produit=0;
$desc_produit="";
$date_produit=date("d/m/Y");
$ptsfid_produit=0;
$Status_produit='Active';
$img_url=$_FILES["fileInput"]["name"] ; 
					if(isset($_POST['id_categorie']))
						$id_categorie=($_POST['id_categorie']);
					if(isset($_POST['promoselect']))
						$id_promotion=($_POST['promoselect']);
					if(isset($_POST['nom_produit']))
						$nom_produit=($_POST['nom_produit']);
					if(isset($_POST['prix_produit']))
						$prix_produit=($_POST['prix_produit']);
					if(isset($_POST['qte_produit']))
						$qte_produit=($_POST['qte_produit']);
					if(isset($_POST['desc_produit']))
						$desc_produit=($_POST['desc_produit']);
				
					if(isset($_POST['ptsfid_produit']))
						$ptsfid_produit=($_POST['ptsfid_produit']);
				
					echo $desc_produit ; 
					
					
						$crud=new crudproduit();
						$produit=new produit($id=0,$id_categorie,$id_promotion,$nom_produit,$prix_produit,$qte_produit,$desc_produit,$date_produit,$Status_produit,$img_url,$ptsfid_produit);
						$crud->Ajouter_Produit($crud->conn,$produit);
						
					

					
									
						$content_notification="Nouveau produit";
			$type_notification="o";
			$time_notification = date('Y-m-d H:i:s');
			
			$notification=new notification($content_notification,$time_notification,$type_notification);
			$crudnotification=new crudnotification();
			$crudnotification->Ajouter_Notification($crudnotification->conn,$notification);
			
			header('location:productmanagment.php'); 
						
}

if (isset($_GET['id'])&& $_GET['id']==2)
{//afficher
				
						$crud=new crudproduit();
					
						$liste=$crud->Afficher_Produit($crud->conn);
						foreach($liste as $l)
						{
						echo $l['nom_produit'];
						echo $l['prix_produit'];
						echo $l['qte_produit'];
						echo $l['desc_produit'];
						echo $l['date_produit'];
						echo $l['Status_produit'];
						echo $l['img_url'];
						echo $l['ptsfid_produit'];
						
						}
							
}
if (isset($_GET['id'])&& $_GET['id']==3)
{//supprimer par nom
				$nom_produit="";
				if(isset($_POST['nom_produit']))
						$nom_produit=($_POST['nom_produit']);
					
						$crud=new crudproduit();
					
						$crud->Supprimer_Produit($crud->conn,$nom_produit);
						
						
						}
						
if (isset($_GET['id'])&& $_GET['id']==4)
{//supprimer par id
				$id_delete="";
				if(isset($_GET['id_produit']))
						$id_delete=($_GET['id_produit']);
					echo $id_delete ;
						$crud=new crudproduit();
					
						$crud->Supprimer_Produit($crud->conn,$id_delete);
						
								$content_notification="le produit ayant l'id=$idelete a été supprimé";
			$type_notification="o";
			$time_notification = date('Y-m-d H:i:s');
			
			$notification=new notification($content_notification,$time_notification,$type_notification);
			$crudnotification=new crudnotification();
			$crudnotification->Ajouter_Notification($crudnotification->conn,$notification);
						
						 header('Location: productmanagment.php');      
						}
						

if (isset($_GET['id'])&& $_GET['id']==5 )
{
	
	//update un produit 
	if(isset($_POST['id_produit_edit']))
	{
							$id_produit=($_POST['id_produit_edit']);
if (isset($_FILES["fileInput"])&& $_FILES['fileInput']['error']!=4)
					{
$filename="C://wamp/www/projetwebintegre2/uploads/" . $_FILES["fileInput"]["name"] ; 
							
				move_uploaded_file($_FILES["fileInput"]["tmp_name"],$filename);
					echo $filename." photo uploaded";
					$img_url=$_FILES["fileInput"]["name"] ; 
					}
					
					elseif (isset($_POST['currentimage']))
						$img_url=$_POST['currentimage'];
$id_categorie=0 ; 
$id_promotion=1;
$nom_produit="" ; 
$prix_produit=0;
$qte_produit=0;
$desc_produit="";
$date_produit="";
$ptsfid_produit=0;
$Status_produit='';
		
					if(isset($_POST['id_categorie']))
						$id_categorie=($_POST['id_categorie']);
					if(isset($_POST['promoselect']))
						$id_promotion=($_POST['promoselect']);
					if(isset($_POST['nom_produit']))
						$nom_produit=($_POST['nom_produit']);
					if(isset($_POST['prix_produit']))
						$prix_produit=($_POST['prix_produit']);
					if(isset($_POST['qte_produit']))
						$qte_produit=($_POST['qte_produit']);
					if(isset($_POST['desc_produit']))
						$desc_produit=($_POST['desc_produit']);
					if(isset($_POST['ptsfid_produit']))
						$ptsfid_produit=($_POST['ptsfid_produit']);
					
		
		$crud=new crudproduit();
								$produit=new produit($id_produit,$id_categorie,$id_promotion,$nom_produit,$prix_produit,$qte_produit,$desc_produit,$date_produit,$Status_produit,$img_url,$ptsfid_produit);
	$crud->Update_produit($crud->conn,$produit);
	
		$content_notification="le produit $nom_produit a été modifié";
			$type_notification="o";
			$time_notification = date('Y-m-d H:i:s');
			
			$notification=new notification($content_notification,$time_notification,$type_notification);
			$crudnotification=new crudnotification();
			$crudnotification->Ajouter_Notification($crudnotification->conn,$notification);

  header('location:productmanagment.php');

}
}

if (isset($_GET['id'])&& $_GET['id']==6 )
	
	{
		
		$Status='Active' ; 
		 
		//status update
		if (isset($_GET['id_produit']))
		{
			if (isset($_GET['Status']))
			{
				
				if ($_GET['Status']==='Active')
				{
					echo "curent = active " ; 
					$Status='Inactive';
				}
					
			}
			
				$crud=new crudproduit();
				$crud->change_Status($crud->conn,$_GET['id_produit'],$Status) ; 
				
				
		}
		
		header('location:productmanagment.php');
		
	}
	
	if (isset ($_GET['id'])&& $_GET['id']==7)
	{
		if (isset($_GET['search']) && $_GET['search'] != '') {  
		$search=$_GET['search'];
		$crud=new crudproduit();
		
		$liste=$crud->Rechercher_Produit($crud->conn,$search);
		
		foreach ($liste as $l)
		{
			
			echo  "<a href='singleproduct.php?id=".$l['id_produit']."'> <img src='uploads/".$l['img_url']."' /><a href='singleproduct.php?id=".$l['id_produit']."'></br> ".$l['nom_produit']." </a></a>\n" ; 
		}
	}
	}



?>
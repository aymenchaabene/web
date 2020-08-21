<?php
include ('commande.php');
include ('../fonctions-panier.php');
include ('crudlignedecommande.php');
include ('crudnotification.php');
include ('crudVehicule.php');


class crudcommande
{
	
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function Afficher_Commande($conn)
	{
		$req="SELECT * FROM commandes";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
	}
	function Afficher_Archive_Commande($conn)
	{
		$req="SELECT * FROM archivecommandes";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
	}

	
	function Afficher_1_Commande($conn,$id)
	{
		$req="SELECT * FROM commandes where id_commande=$id";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
	}
	
	function Ajouter_Commande($conn,$commande)
	{	
		$req1="INSERT INTO commandes (id_client,date_commande,montant_commande) VALUES ('".$commande->getId_Client()."','".$commande->getDate_Commande()."',".$commande->getMontant().")";
		$conn->query($req1);
		
			echo "Error: " . $req1 . "<br>" . $conn->error;

			
	}
	
	function id_commande_inc($conn)
	{
			$req5="SELECT id_commande FROM commandes ORDER BY id_commande DESC LIMIT 1";			
			$liste=$conn->query($req5); 
			return $liste->fetchAll(); 	

	}


	
	function Rechercher_Commande_ID($conn,$id)
	{
		$req5="SELECT * FROM commandes where id_commande LIKE '$id%'";
		$liste=$conn->query($req5); 
		
		return $liste->fetchAll(); 	
		
	}

		function Rechercher_Commande_Date($conn,$date)
	{
		$req5="SELECT * FROM commandes where date_commande='$date'";
		$liste=$conn->query($req5); 
		return $liste->fetchAll(); 	
	}
		
	function Supprimer_Commande($conn,$id) 
	{		
		$req2="insert into archivecommandes select * from commandes where id_commande=$id";
		$conn->query($req2);	
		$req3="delete from commandes where id_commande=$id" ;
		$conn->query($req3);	
	}
	function Supprimer_Archive_Commande($conn,$id_commande)
	{
		$req3="delete from archivecommandes where id_commande=$id" ;
		$conn->query($req3);	
		
	}
	function Update_Commande($conn,$commande)
	{
		$req1="UPDATE commandes SET id_client='".$commande->getId_Client()."',date_commande='".$commande->getDate_Commande()."',montant_commande=".$commande->getMontant().",
		payement_commande='".$commande->getPayement()."',status_commande='".$commande->getStatusCommande()."' WHERE id_commande=".$commande->getId_Commande();
		$conn->query($req1);
		//echo "Error: " . $req1 . "<br>" . $conn->error;
	}
	
	function getDate_commande($conn,$id)
	{
		$req3="SELECT date_commande from commandes where id_commande=$id" ;
		$value=$conn->query($req3);	
		return $value->fetchAll();
	}
	
		function Total_Commande($conn,$id)
	{
		$req3="SELECT qte_produit,montant_produit from lignedecommande where id_commande=$id" ;
		$value=$conn->query($req3);	
		return $value->fetchAll();
		
	}
	function Adresse_commande($conn,$id_to_use,$adresse)
	{
		$req1="UPDATE commandes SET adresse_commande='".$adresse."' WHERE id_commande=$id_to_use";
		$conn->query($req1);
		
	}
				
}

if (isset($_GET['id'])&& $_GET['id']==1)
{
//mise à jour
		$id_commande=$_GET['id_commande'];
		
		$side=0;
		$id_client="91027853";
		$date_commande="";
		$montant_commande=0;
		$payement_commande="";
		$status_commande="";
		if(isset($_POST['id_client']))
			$id_client=($_POST['id_client']);
		if(isset($_POST['date_commande']))
			$date_commande=($_POST['date_commande']);
		if(isset($_POST['montant_commande']))
			$montant_commande=($_POST['montant_commande']);
		if(isset($_POST['payement_commande']))
		{
		
		$payement_commande=($_POST['payement_commande']);
			if ($payement_commande=='Payée')
			{
				$payement_commande="Pay&#233e";
			}

		}
		if(isset($_POST['status_commande']))
		{
			$status_commande=($_POST['status_commande']);
			if ($status_commande=='Confirmée')
			{
				$status_commande="Confirm&#233e";
				$side=1;
			}
			else 
				$side=2;
		}
		
			$commande=new commande($id_commande,$id_client,$date_commande,$montant_commande,$payement_commande,$status_commande);
			$crud=new crudcommande();
			$crud->Update_Commande($crud->conn,$commande);
			
			if ($side==1)
			{
			$ch="email.php?id=1&id_c=".$id_client."&id_commande=".$id_commande;
			header("Location: ../email/".$ch);
			}
			else if ($side==2)
			{
			$ch="email.php?id=2&id_c=".$id_client."&id_commande=".$id_commande;
			header("Location: ../email/".$ch);
			}
			
			//header("Location: table.php");

						
}
if (isset($_GET['id'])&& $_GET['id']==2)
{
	//afficher
				
						$crud=new crudcommande();
					
						$liste=$crud->Afficher_Commande($crud->conn);
						foreach($liste as $l)
						{
						echo $l['id_commande'];
						echo $l['id_client'];
						echo $l['date_commande'];
						echo $l['montant_commande'];
						echo $l['payement_commande'];
						echo $l['status_commande'];
						}
						
}

						
if (isset($_GET['id'])&& $_GET['id']==3)
{
	//supprimer
						if(isset($_GET['id_commande']))
						$id_commande=($_GET['id_commande']);
					
						$crud=new crudcommande();
						$crud1=new crudlignedecommande();

						$crud1->Supprimer_Ligne_Commande($crud1->conn,$id_commande);
						$crud->Supprimer_Commande($crud->conn,$id_commande);
					

						header("Location: table.php");
						
						
						
						
}

if (isset($_GET['id'])&& $_GET['id']==4)
{
	//recherche ID commande
				$id_commande=0;
				/*if(isset($_POST['id_commande']))
						$id_commande=($_POST['id_commande']);
						*/
						if(isset($_GET['ID_commande_recherche']))
						$id_commande=($_GET['ID_commande_recherche']);
					
						$crud=new crudcommande();
					
						$liste=$crud->Rechercher_Commande_ID($crud->conn,$id_commande);
						
						foreach($liste as $l)
						{
						echo $l['id_commande'];
						echo $l['id_client'];
						echo $l['date_commande'];
						echo $l['montant_commande'];
						echo $l['payement_commande'];
						echo $l['status_commande'];
						}
						
						
						
						
}
if (isset($_GET['id'])&& $_GET['id']==5)
{
	//recherche client
						$id_client=0;
						/*if(isset($_POST['id_commande']))
						$id_commande=($_POST['id_commande']);
						*/
						if(isset($_GET['ID_client_recherche']))
						$id_client=($_GET['ID_client_recherche']);
					
						$crud=new crudcommande();
					
						$liste=$crud->Rechercher_Commande_ID_Client($crud->conn,$id_client);
						
						foreach($liste as $l)
						{
						echo $l['id_commande'];
						echo $l['id_client'];
						echo $l['date_commande'];
						echo $l['montant_commande'];
						echo $l['payement_commande'];
						echo $l['status_commande'];
						}
						
						
						
						
						
}
if (isset($_GET['id'])&& $_GET['id']==7)
{
	//recherche date
						$date_commande='';
						/*if(isset($_POST['id_commande']))
						$id_commande=($_POST['id_commande']);
						*/
						if(isset($_GET['Date_recherche']))
						$date_commande=($_GET['Date_recherche']);
					
						$crud=new crudcommande();
					
						$liste=$crud->Rechercher_Commande_Date($crud->conn,$date_commande);
						
						foreach($liste as $l)
						{
						echo $l['id_commande'];
						echo $l['id_client'];
						echo $l['date_commande'];
						echo $l['montant_commande'];
						echo $l['payement_commande'];
						echo $l['status_commande'];
						}
						
						
											
						
}





if (isset($_GET['id'])&& $_GET['id']==6)
{
	//ajout de commande
		session_start();	

			$id_commande=0;
			$id_client=$_SESSION['cin'];;
			$montant_commande=0;
			$payement_commande="x";
			$status_commande="x";
			
			$content_notification="Nouvelle commande";
			$type_notification="o";
			$time_notification = date('Y-m-d H:i:s');

			$time_notification = strtotime($time_notification);

			if(isset($_POST['Rue']))
				$Rue=($_POST['Rue']);
			if(isset($_POST['Ville']))
				$Ville=($_POST['Ville']);
			if(isset($_POST['query']))
				$Etat=($_POST['query']);
			if(isset($_POST['Codepostal']))
				$Code=($_POST['Codepostal']);
			if(isset($_POST['mobile']))
				$mobile_liv=($_POST['mobile']);
			if(isset($_POST['email']))
				$email_liv=($_POST['email']);
			
			//livraison
			$adresse_liv=$Rue.' '.$Ville.' '.$Etat.' '.$Code;
			$cc=new crudVehicule();
			$id_liv = 0;
			$prix_liv = 0;
			$gouvernorat = $Etat;
			if ($gouvernorat == "Ben Arous" || $gouvernorat == "Tunis" || $gouvernorat == "Ariana" || $gouvernorat == "Manouba"){$prix_liv = 10;}

			elseif ($gouvernorat == "Zaghouan" || $gouvernorat == "Nabeul" || $gouvernorat == "Bizerte" || $gouvernorat == "Beja" || $gouvernorat == "Jendouba" || $gouvernorat == "Kef" || $gouvernorat == "Siliana"){$prix_liv = 15;}

			elseif ($gouvernorat == "Monastir" || $gouvernorat == "Sousse" || $gouvernorat == "Kairaouane" || $gouvernorat == "Mahdia" || $gouvernorat == "Sfax" || $gouvernorat == "Sidi Bouzid" || $gouvernorat == "Gafsa"){$prix_liv = 20;}

			elseif ($gouvernorat == "Kebili" || $gouvernorat == "Gabes" || $gouvernorat == "Tozeur" ){$prix_liv = 20;}

			elseif ($gouvernorat == "Tataouine" || $gouvernorat == "Mednine" ){$prix_liv = 25;}

			$liv = new livraison($id_liv,$adresse_liv,$Code,$gouvernorat,$prix_liv,0,$email_liv,$mobile_liv);	
			$cc->insertLivraison($liv,$cc->conn);
			//fin livraison
				
				
			if(isset($_POST['montant_commande']))
				$montant_commande=($_POST['montant_commande']);
					
					
					$montant_commande+=$prix_liv;
		
			$date_commande=date('d/m/Y');	
			
			
			$commande=commande::withoutID($id_client,$date_commande,$montant_commande);
			$crud=new crudcommande();
			$crud->Ajouter_Commande($crud->conn,$commande);
			
			$listex=$crud->id_commande_inc($crud->conn);
			
			foreach ($listex as $l0)
			{
				$id_to_use=$l0['id_commande'];
			}
			
			
			$crud->Adresse_commande($crud->conn,$id_to_use,$adresse_liv);
			
			for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
			{
					
					$lignedecommande= new lignedecommande($id_to_use,$_SESSION['panier']['id_produit'][$i],$_SESSION['panier']['qte_produit'][$i],$_SESSION['panier']['prix_produit'][$i]);
					//echo "\n";
					//echo ($lignedecommande->getQte());
					$crud1=new crudlignedecommande();
					$crud1->Ajouter_Ligne_Commande($crud1->conn,$lignedecommande);
					$crud1->updatequantity($crud1->conn,$_SESSION['panier']['qte_produit'][$i],$_SESSION['panier']['id_produit'][$i]);
			}
			
			
			
			//notification
			$notification=new notification($content_notification,$time_notification,$type_notification);
			$crudnotification=new crudnotification();
			$crudnotification->Ajouter_Notification($crudnotification->conn,$notification);

		

			
	sleep(0.1);

	$ch="check-out.php?click=true&id_c=".$id_to_use;
		header("Location: ../".$ch);

	
}


if (isset($_GET['id'])&& $_GET['id']==50)
{
	
	//modification de panier "backoffice" suppresion d'un produit
	if (isset($_GET['id_p']))
		$id_p=$_GET['id_p'];
	$crud1=new crudlignedecommande();
	$crud1->Supprimer_Ligne_Produit($crud1->conn,$id_p);
	header('Location: ' . $_SERVER['HTTP_REFERER']);

	
}


if (isset($_GET['id'])&& $_GET['id']==51)
{
	//modification de panier "backoffice" modification des quantités
	if (isset($_POST['qte']))
		$qte=$_POST['qte'];
	if (isset($_GET['id_commande']))
		$id=$_GET['id_commande'];	
	if (isset($_GET['id_produit']))
		$id_p=$_GET['id_produit'];	

	$crud1=new crudlignedecommande();
	$crud1->Update_Ligne_Commande($crud1->conn,$qte,$id,$id_p);
	header('Location: ' . $_SERVER['HTTP_REFERER']);

	
}
if (isset($_GET['id'])&& $_GET['id']==30)
{
		if(isset($_GET['id_commande']))
		$id_commande=($_GET['id_commande']);
					
		$crud=new crudcommande();
	
		$crud->Supprimer_Archive_Commande($crud->conn,$id_commande);
		
		header("Location: archive.php");
	
	
}



						
?>
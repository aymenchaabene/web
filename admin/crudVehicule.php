<?php
include ("Vehicule.php");
include ("Livraison.php");
require_once ('setup.php');

include ("mail/m.php");

include ("src/NexmoMessage.php" );
//require_once('../pdf/fpdf.php'); 

class crudVehicule
{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function insertVehicule($vehicule,$conn){
		
		$req1="INSERT INTO vehicule (id_v,gouvernorat,status_v) 
		VALUES ('".$vehicule->getId()."','".$vehicule->getGouvernorat()."','Active')";
		$conn->query($req1);
	}
	//edit
	function insertLivraison($livraison,$conn){
		
		$req1="INSERT INTO livraison (id_livraison,adresse_livraison,code_p_l,gouvernorat_livraison,prix_livraison,vehicule_livraison,email_livraison,mobile_livraison) 
		VALUES (0,'".$livraison->getAdresse()."','".$livraison->getCode()."','".$livraison->getGouvernorat()."','".$livraison->getPrix()."',0,'".$livraison->getEmail()."',".$livraison->getMobile().")";
		$conn->query($req1);
	}
	
	function afficheVehicule($conn){
		$req="SELECT * FROM vehicule";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	
	function afficheLivraison($conn){
	
		$req="SELECT * FROM livraison ";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	
	function recupererVehicule($id_v,$conn){
		
		$req="SELECT id_v,gouvernorat FROM vehicule WHERE id_v=".$id_v;
		$vehicule=$conn->query($req);
		return $vehicule->fetchAll();
	}
	
	function recupererLivraison($id_livraison,$conn){
		
		$req="SELECT id_livraison,adresse_livraison,code_p_l,gouvernorat_livraison,prix_livraison,email_livraison,mobile_livraison FROM livraison WHERE id_livraison=".$id_livraison;
		$livraison=$conn->query($req);
		return $livraison->fetchAll();
	}
	function modifierVehicule($vehicule,$conn){
		$req1="UPDATE vehicule SET id_v='".$vehicule->getId()."' , gouvernorat='".$vehicule->getGouvernorat()."' WHERE id_v=".$vehicule->getId();	
		$conn->exec($req1);
	}
	function modifierLivraison($livraison,$conn){
		$req1="UPDATE livraison SET vehicule_livraison=".$livraison->getVehicule()." WHERE id_livraison=".$livraison->getId();	
		$conn->exec($req1);
	}
	
	function supprimervehicule($id_v,$conn){
		$req1="DELETE FROM vehicule where id_v=".$id_v;
		$conn->exec($req1);
	}
	
	
		function change_Status($conn,$id_v,$status_v)
	{
		$req="UPDATE vehicule SET status_v='$status_v' where id_v=$id_v; "; 
		$conn->query($req);
		
		
	}

	
	function vehicule_disponible($conn)
	{
		$req="SELECT id_v FROM vehicule WHERE status_v ='Active'";
		$vehicule=$conn->query($req);
		return $vehicule->fetchAll();
	}

	
	
	
}

	if(isset($_GET['id']) && $_GET['id'] == 1 )
	{
				$id_v=0;
		
		if (isset($_POST['id_v']))
			$id_v=$_POST['id_v'];
		if (isset($_POST['gouvernorat']))
			$gv=$_POST['gouvernorat'];

		
		$vehicule=new vehicule($id_v,$gv);

		
		$cc=new crudVehicule();
		$cc->modifierVehicule($vehicule,$cc->conn);
		
		header('Location: form.php'); 	
		
	}
	
	if(isset($_GET['id']) && $_GET['id'] == 2 )
	{
				$id_livraison=0;
		
		if (isset($_POST['id_livraison']))
			$id_livraison=$_POST['id_livraison'];
		if (isset($_POST['adresse_livraison']))
			$adresse_livraison=$_POST['adresse_livraison'];
		if (isset($_POST['code_p_l']))
			$code_p_l=$_POST['code_p_l'];
		if (isset($_POST['gouvernorat_livraison']))
			$gouvernorat_livraison=$_POST['gouvernorat_livraison'];
		if (isset($_POST['prix_livraison']))
			$prix_livraison=$_POST['prix_livraison'];
		if (isset($_POST['id_vehicule']))
			$vehicule_livraison=$_POST['id_vehicule'];
		if (isset($_POST['email_livraison']))
			$email_livraison=$_POST['email_livraison'];
		if (isset($_POST['mobile_livraison']))
			$mobile_livraison=$_POST['mobile_livraison'];
		
		$livraison=new livraison($id_livraison,$adresse_livraison,$code_p_l,$gouvernorat_livraison,$prix_livraison,$vehicule_livraison,$email_livraison,$mobile_livraison);

		$cc=new crudVehicule();
		$cc->modifierLivraison($livraison,$cc->conn);
		$Status='Active' ; 
		
		
		if (isset($_POST['enregistrerModif']))
		{
				//Status
				$status_v='Inactive';
				$crud=new crudVehicule();
				$crud->change_Status($crud->conn,$_POST['id_vehicule'],$status_v) ;
				
				//Email
				$text=$_POST['textarea2'];
				$email=$_POST['email_livraison'];
				mailing ($email,$text);	
				
				//SMS
				$mobile=$_POST['mobile_livraison'];
				$nexmo_sms = new NexmoMessage('3d222852', 'd499894b08193574');
				$info = $nexmo_sms->sendText( $mobile, 'BenGhorbel', 'Merci de consulter votre email');
				echo $nexmo_sms->displayOverview($info);

		}	
				header ('Location: form.php');

		if(isset($_POST['id_livraison']))
		{
		$id_livraison = $_POST["id_livraison"]; 
		$pdf=new PDF(); 
		$pdf->AliasNbPages(); 
		$pdf->AddPage(); 
		$pdf->SetFont('Times','B',12); 
		if (isset($id_livraison)){
		$pdf->Cell(50,10,'ID Livraison:',0,1);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(50,10,$id_livraison,0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,10,'Adresse livraison:',0,1);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(50,10,$adresse_livraison,0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,10,'Code Postal:',0,1);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(50,10,$code_p_l,0,1);
		$pdf->SetFont('Times','B',12);	
		$pdf->Cell(50,10,'Gouvernorat livraison:',0,1);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(50,10,$gouvernorat_livraison,0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,10,'Prix livraison:',0,1);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(50,10,$prix_livraison."TND",0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,10,'Email:',0,1);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(50,10,$email_livraison,0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(50,10,'Mobile:',0,1);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(50,10,$mobile_livraison,0,1);
		$pdf->SetFont('Times','B',12);
		
		$pdf->Ln();
		}
		$pdf->Output(); 
		}
			
						
		
		
		header ('Location: form.php');
		
	}
	
	if (isset($_GET['id'])&& $_GET['id']==6 )
	
	{
		
		$Status='Active' ; 
		 
		//status update
		if (isset($_GET['id_v']))
		{
			if (isset($_GET['status_v']))
			{
				
				if ($_GET['status_v']==='Active')
				{
					echo "curent = active " ; 
					$status_v='Inactive';
				}
				else if ($_GET['status_v']==='Inactive')
				{
					echo "curent = inactive " ;
					$status_v='Active';
				}
			
				$crud=new crudVehicule();
				$crud->change_Status($crud->conn,$_GET['id_v'],$status_v) ; 
			}	
		}
		
		header('location:form.php');
		
	}
	if (isset($_GET['id'])&& $_GET['id']==3 )
	
	{
	//$Status='active' ; 
		 
		//status update
		//if (isset($_POST['enregistrerModif']))
		//{
			
					$status_v='Active';
			
			
				$crud=new crudVehicule();
				$crud->change_Status($crud->conn,111,$status_v) ;
				
		//}	
		
		
		header ('Location:testmail.php');
			
	}
	

?>

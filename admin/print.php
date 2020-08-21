<?php 

include ('crudproduit.php');
require_once ('crudcommande.php');
include ('crudClient.php');
include ('../pdf/PDF.php');
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetTitle('Facture');

$crud=new crudcommande();

if (isset($_GET['id_commande']))
	$id_commande=$_GET['id_commande'];

$liste=$crud->Afficher_1_Commande($crud->conn,$id_commande);
	$crud2=new crudClient();


foreach ($liste as $l)
{
	$date=$l['date_commande'];
	$id_commande=$l['id_commande'];
	$id_client=$l['id_client'];
	$montant=$l['montant_commande'];	
	$adresse=$l['adresse_commande'];

}
	$liste2=$crud2->recupererClient($id_client,$crud2->conn);
		foreach ($liste2 as $l2)
		{
			$nom=$l2['nom'].' '.$l2['prenom'];
		}
 


	$pdf->Cell(0,10,"Rue Salambo, Hammem-lif																					
																														
																											Date de la commande: " .$date,0,0);
	$pdf->Ln(8);
	$pdf->Cell(0,10,"Ben Arous, Tunisie																					
																														
																																									Ref de la commande: ".$id_commande,0,0);
	$pdf->Ln(8);
	$pdf->Cell(0,10,"ZIP: 2097 																			
																																																		
																																						Nom du Client: ".$nom,0,0);
	$pdf->Ln(10);
	$pdf->Ln(10);
	$pdf->Ln(5);




		

				$pdf->SetFont('Times','B',12);
				$pdf->Cell(0,10,"Adresse shipping: 		".$adresse,0,1);
	$pdf->Ln(10);
	$pdf->Ln(10);


		$crud2=new crudproduit();
		$crud3=new crudlignedecommande();
		$pdf->Cell(0,10,"Panier de la commande: ",0,1);

		
		$liste1=$crud3->Affiche_Produits($crud3->conn,$id_commande);
						$pdf->SetFont('Times','',12);

			$pdf->Cell(40,7,'Nom produit',1);
			$pdf->Cell(40,7,'Prix de produit',1);
			$pdf->Cell(40,7,'Quantite',1);
			$pdf->Cell(40,7,'Prix final',1);


			$pdf->Ln();

			foreach ($liste1 as $l1)
			{
				$l=$crud2->Afficher_1_Produit($crud2->conn,$l1['id_produit']);
				$l2=$crud3->Affiche_Quantites($crud3->conn,$id_commande,$l1['id_produit']);
				foreach ($l2 as $l3)
				{
					$x=$l3['qte_produit'];
				}
			foreach ($l as $l0)
			{		
			$y=$x*$l0 ['prix_produit'];
			$pdf->SetFont('Times','',12);
			$pts=$l0['ptsfid_produit']*$x;
			$pdf->Cell(40,6,$l0['nom_produit'],1);
			$pdf->Cell(40,6,$l0 ['prix_produit'],1);
			$pdf->Cell(40,6,$x,1);
			$pdf->Cell(40,6,$y,1);


			$pdf->Ln();
			}
		
			}
	
		
				$pdf->Cell(120);

				$pdf->Cell(40,6,"Total: ".$montant." TND",1);

				
				
				
				
		$pdf->Ln(120);
	
		$pdf->SetFont('Times','I',11);

		$pdf->Cell(0,10,"Si vous penez que il y'a eu un probleme lors de la generation de votre facture, contactez notre service",0,1);
		$pdf->Cell(0,10,"apres-vente via la page des reclamations.",0,1);
		$pdf->Cell(0,10,"Merci pour choisir Meuble Ben Ghorbel.",0,1);


$pdf->Output();
/*
    foreach($header as $col)
    $this->Cell(40,7,$col,1);
    $this->Ln();
	
	   foreach($data as $row)
    {
        foreach($row as $col)
        $this->Cell(40,6,$col,1);
        $this->Ln();
    }
*/



?>
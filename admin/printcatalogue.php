<?php 

include ('crudproduit.php');

include ('../pdf/PDF.php');
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','I',25);
$pdf->SetTextColor(247,33,33);
$pdf->cell(40,40,'                       Catalogue de produits');

$pdf->SetTitle('Catalogue');

$crud=new crudproduit();

$pdf->SetFont('Times','I',11);
	$pdf->SetTextColor(0,0,0);

$liste=$crud->Afficher_Produit($crud->conn);
$nombre=0;
	foreach ($liste as $l)
{ $nombre++;
}
$x_start=20; 
$y_start=15;

$i=0;
foreach ($liste as $l)
{ 
if($i/8==1){$pdf->AddPage(); $x_start=20;$y_start=20;}
$x_start=20; 
	$nom_produit=$l['nom_produit'];
	
	$img_url='../uploads/'.$l['img_url'];
	$prix_produit=$l['prix_produit'];
	$Pourcentage_promotion=$l['Pourcentage_promotion'];	
	
if($i%2==0)
{
	$x_start=20+100 ; 
	$y_start=$y_start+50;}
$pdf->Image($img_url,$x_start,$y_start,65,30);
$pdf -> SetY($y_start+35); 
$pdf -> SetX($x_start+20); 
$pdf->cell(0,10,$nom_produit." ".$prix_produit."TND");



	
 
$i++;
}
				
				
	


$pdf->Output();




?>
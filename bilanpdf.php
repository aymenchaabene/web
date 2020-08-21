<?php 
require('fpdf.php'); 

class PDF extends FPDF 
{ 
//En-tête 
function Header() 
{ 
 // Logo
$this->Image('img/Ben Ghorbel.png',30,6,30);
$this->SetFont('Arial','B',15); 
//Décalage à droite 
$this->Cell(80); 
//Titre 
$this->Cell(60,10, 'bilan des statestique',1,0,'C'); 
//Saut de ligne 
$this->Ln(20); 

} 



//Pied de page 
function Footer() 
{ 
//Positionnement à 1,5 cm du bas 
$this->SetY(-15); 
//Police Arial italique 8 
$this->SetFont('Arial','I',8); 

} 
} 

//Instanciation de la classe dérivée
 
if(isset($_GET['id_livraison']))
{
$id_livraison = $_GET["id_livraison"]; 
$pdf=new PDF(); 
$pdf->AliasNbPages(); 
$pdf->AddPage(); 
$pdf->SetFont('Times','B',12); 

if (isset($id_livraison)){
	$pdf->Cell(50,10,'la date du bilan:',0,1);
	$pdf->SetFont('Times','',12);
$pdf->Cell(50,10,$id_livraison,0,1);
$pdf->SetFont('Times','B',12); 
$pdf->Ln();
}
$pdf->Output(); 
}
?> 

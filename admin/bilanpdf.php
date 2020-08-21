<?php 
require('fpdf.php'); 

class PDF extends FPDF 
{ 
//En-tête 
function Header() 
{ 
 // Logo
$this->Image('../images/logo.png',10,6,30);
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
if(isset($_POST['date'])and isset($_POST['contenu_bilan']))
{
$date = $_POST["date"]; 
$bilan=$_POST["contenu_bilan"];
$pdf=new PDF(); 
$pdf->AliasNbPages(); 
$pdf->AddPage(); 
$pdf->SetFont('Times','B',12); 

if (isset($date) and isset($bilan)){
	$pdf->Cell(50,10,'la date du bilan:',0,1);
	$pdf->SetFont('Times','',12);
$pdf->Cell(50,10,$date,0,1);
$pdf->SetFont('Times','B',12); 
 $pdf->Cell(50,10,'le bilan :',0,1);
	$pdf->SetFont('Times','',12);
$pdf->MultiCell(150,10,$bilan,0,'J');
$pdf->Ln();
} 
$pdf->Output(); 
}
?> 

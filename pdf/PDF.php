<?php
require('fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    // Police Arial gras 15
	$this->SetFont('Times','B',12);
	$this->Image('logo.png',10,6,30);
	$this->Ln(8);





    // Décalage à droite
	/*
    $this->Cell(30,10,'xazaea',1,0,'C');

    // Titre
	 $this->Ln(20);
    $this->Cell(30,10,'Facture',1,0,'C');
    // Saut de ligne
    $this->Ln(20);
	*/
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
?>
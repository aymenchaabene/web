<?php 



include ('crudClient.php');
include ('../pdf/PDF.php');
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetTitle('Liste des clients');



$cc=new crudClient();
$l=$cc->affiche($cc->conn);
	


				
	
				$pdf->Cell(30,6,"Nom",1);
			$pdf->Cell(20,6,"Prenom",1);
			$pdf->Cell(20,6,"Cin",1);
			$pdf->Cell(20,6,"Adresse",1);
			$pdf->Cell(35,6,"Date de naissance",1);
			$pdf->Cell(20,6,"Profession",1);
			$pdf->Cell(20,6,"Telephone",1);
			$pdf->Cell(20,6,"Etat_civil",1);
			
				$pdf->Ln(8);
			
			
			foreach ($l as $l0)
			{		
		
			$pdf->SetFont('Times','',12);
	       // $pdf=Cell(40,6,$l0['cin'],1);
			$pdf->Cell(30,6,$l0['nom'],1);
			$pdf->Cell(20,6,$l0 ['prenom'],1);
			$pdf->Cell(20,6,$l0 ['cin'],1);
			$pdf->Cell(20,6,$l0 ['adresse'],1);
				$pdf->Cell(35,6,$l0 ['date_naiss'],1);
					$pdf->Cell(20,6,$l0 ['profession'],1);
			$pdf->Cell(20,6,$l0 ['tel'],1);
			$pdf->Cell(20,6,$l0 ['etat_civil'],1);
		
				$pdf->Ln(8);
			}
		

 


	

		

	



			$pdf->Ln();

			
	
		
				$pdf->Cell(120);

				
				
				
				
				
		$pdf->Ln(120);
	
		$pdf->SetFont('Times','I',13);

		
		$pdf->Cell(0,10,"Administration",0,1);
		$pdf->Cell(0,10,"Meuble Ben Ghorbel.",0,1);


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
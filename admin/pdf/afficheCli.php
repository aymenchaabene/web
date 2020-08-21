
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	
		
</head>

<body>
	
			
		
			<!-- start: Content -->
			<div id="content" class="span10">
			
	
			
		<!--mena bdina -->	
			
		<!--

					<php
					include('fpdf.php');
					$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=20;$i++)
	
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
	
							
							
						
							

$pdf->Output();
					?>-->
					
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
			  
			   
				
				<div class="controls">
		
			
				  <tr>
								  <th> Login</th>
								  <th>Mot de passe </th>
								  <th>CIN</th>
								   <th>Nom</th>
								  <th>Prenom</th>
								  <th>Adresse</th>
								  <th>Telephone</th>
								  <th>E-mail</th>
							      <th>Sexe</th>
								  <th>Date-naissance</th>
								  <th>Profession</th>
								  <th>Etat-civil</th>
								    <th>pt_fid_acc</th>
								
							  </tr>
			    </thead>


		
						  <tbody>
					
					
						 
							<?php
							include("crudClient.php");
							$cc=new crudClient();
							$list=$cc->affiche($cc->conn);
							?> 
						
							<?php
							foreach ($list as $l1){
							?>
					  
							
					
							<tr>
								<td ><?php echo $l1[0]; ?> </td>
								<td ><?php echo $l1[1]; ?> </td>
								<td ><?php echo $l1[2];?></td>
								<td class="center"><?php echo $l1[3]; ?></td>
								<td class="center"><?php echo $l1[4]; ?></td>
                                <td class="center"><?php echo $l1[5]; ?> </td>
								<td class="center"><?php echo $l1[6]; ?> </td>
								<td class="center"><?php echo $l1[7];?></td>
								<td class="center"><?php echo $l1[8]; ?></td>
								<td class="center"><?php echo $l1[9]; ?></td>
                                <td class="center"><?php echo $l1[10]; ?></td>
								<td class="center"><?php echo $l1[11]; ?></td>
							   <td class="center"><?php echo $l1[12]; ?></td>
							
							
							
							</tr>
							
					
						<?php
						}
						?>
						
						
					
						
						
						

					</table>
                </div>	
					
					      </tbody>
					
					
					
						 
			 	
						
						 
						 
						
	
	
	
	
	
	
	

	
	
</body>
</html>

				
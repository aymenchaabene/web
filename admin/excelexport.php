
<html lang="en">
<head>
	

</head>

<body>
		<!-- start: Header -->

	<!-- start: Header -->
	
	
			
			
		<!--mena bdina -->	
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Liste des Clients</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>

				<div class="box-content">
					
				

					
					
				<table class="table table-striped table-bordered bootstrap-datatable datatable" id="t01">
			  <thead>
			  
			    <div class="control-group">
				
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
							
							header("Content-type: application/vnd-ms-excel");
							header("Content-Disposition: attachment;filename=fiche_clients.xls");
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
						
						
					
						
						
											      </tbody>


					</table>
                </div>	
					
					
					
					
						 
			 	
						
						 
					
	
</body>
</html>

				
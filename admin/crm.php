<?php 
session_start();
include ('../fonctions-panier.php');

if(!isset($_SESSION['admin_login']))
	header('location:login.php');
else {
	
	include("crudClient.php");
							$cc=new crudClient();
}
?>
<html lang="en">
<head>
	
	<?php include('_interface.php'); ?>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			<?php $list=$cc->affiche($cc->conn); ?>
			<?php $i=0;

			foreach ($list as $full)
			{
				
			?>
<div class="container">
				
				<div class="modal hide fade" id="modalproduct<?php echo $i ;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
         <p >    cin : <?php echo  $full['cin'] ?> </p>
            <p > Adresse :<?php echo  $full['adresse'] ?> </p>
			  <p > Téléphone : <?php echo  $full['tel'] ?> </p>
			  <p > Sexe : <?php echo  $full['sexe'] ?> </p>
			  <p > Date de naissance : <?php echo  $full['date_naiss'] ?> </p>
			  <p > Profession : <?php echo  $full['profession'] ?> </p>
			  <p > Etat_civil :<?php echo  $full['etat_civil'] ?> </p>
			   <p > Nombre_pt_fid :<?php echo  $full['pt_fid_acc'] ?> </p>
			  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
		</div>	
			
     <script>
			$(document).ready(function(){
   
    $("#produit<?php echo $i; ?>").click(function(){
        $("#modalproduct<?php echo $i; ?>").modal({backdrop: true});
   });

			});
</script>
		<?php $i++;} ?>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Clients</a></li>
			</ul>

			
					<a href="pdf/print2.php" > <button class="btn btn-primary"> PDF</button> </a>
					<a href="excelexport.php" > <button class="btn btn-primary">Excel</button> </a>

			
		<!--mena bdina -->	
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Clients</h2>
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
								  
								 
								   <th>Nom</th>
								  <th>Prenom</th>
								  
								  <th>E-mail</th>
							   
								  <th>Actions</th>
							  </tr>
			    </thead>


		
						  <tbody>
					
					
						 
							<?php
							
							$list=$cc->affiche($cc->conn);
							?> 
						
							<?php
							$i=0;
							foreach ($list as $l1){
							?>
					  
							
					
							<tr>
								<td ><?php echo $l1[0]; ?> </td>
								
							
								<td class="center"><?php echo $l1[3]; ?></td>
								<td class="center"><?php echo $l1[4]; ?></td>
                               
								<td class="center"><?php echo $l1[7];?></td>
								
							<td class="center">
									
									<a class="btn btn-info" href="modification.php?cin=<?php echo $l1[2] ; ?>">
									
				
										
										
										<i class="halflings-icon white edit" ></i>  
										
									</a>
								
								
								<a class="btn btn-success" id="produit<?php echo $i; ?>" data-target="#modalproduct<?php echo $i; ?>">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
								
								
									<a class="btn btn-danger" href="supprimerC.php?cin=<?php echo $l1[2] ; ?>" onclick="return confirmActionBan()"  >
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							
							
							</tr>
							
					
						<?php
						$i++;}
						?>
						
						
					
						
						
											      </tbody>


					</table>
                </div>	
					
					
					
					
						 
			 	
						
						 
						 
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
					</div>
			<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	
	
	
	
	
	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>
			
		</p>

	</footer>
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
 <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
<script type="text/javascript" charset="utf8" src="DataTables/buttons-1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="DataTables/pdfmake-0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="DataTables/pdfmake-0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="DataTables/buttons-1.1.2/js/buttons.html5.min.js"></script>
 

	
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	
</body>
</html>

				
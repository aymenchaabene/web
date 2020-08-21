<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	
	session_start();

	include ('crudcommande.php');
	include ('../pdf/PDF.php');

	if(!isset($_SESSION['admin_login']))
	header('location:login.php');





	
			
	
	
    $crud=new crudcommande();
    $liste=$crud->Afficher_Archive_Commande($crud->conn);
	
	
	

	
	
	?>
	<!-- start: Meta -->
<?php include ('_interface.php'); ?>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.php">Acceuil</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="table.php">Archive Commandes</a></li>
			</ul>

			
								

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Commandes</h2>
						
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>-->
							<a href="table.php" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<!--<a href="" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						   <div class="control-group">
						   
								<!--<td> <label class="control-label" for="focusedInput">Recherche:</label></td>-->
								<div class="controls">
						<!--
						<tr>
						  <form method="POST" action="table.php?id=4">
								 
								<td> <input class="input-medium focused" id="focusedInput" placeholder="ID Commande..." name="ID_commande_recherche" pattern="[0-9]{1,}" title="ID commande doit être composé que des chiffres" hidden>
								
								</td>
								</div>
								</div>
								</form>

						  <form method="POST" action="table.php?id=5">
						  <div class="controls">
						<td><input class="input-medium focused" id="focusedInput" placeholder="ID Client..." name="ID_client_recherche" pattern="[0-9]{8}" title="ID client doit être composé de 8 chiffres" maxlength="8" hidden>
						</td>
						</div>
						</form>
						  <form method="POST" action="table.php?id=7">

							<div class="controls">
						<td><input class="input-medium focused" id="focusedInput" placeholder="Date Commande..." name="Date_recherche" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" maxlength="10" title="Les dates doivent être sous le format: JJ-MM-YYYY" hidden>
						<!--<button type="submit" class="btn-mini btn-info">	<i class="halflings-icon white zoom-in"></i>  </button>		
						</td>
						<td></td>						<td></td>
						<td></td>
						<td></td>
							
						</div>
						</form>	
						</tr>
						-->
							  <tr>
								  <th>ID</th>
								  <th>ID Client</th>
								  <th>Date</th>
								  <th>Montant</th>
								  <th>Payement</th>
								  <th>Status </th>
								  <th>Adresse </th>
								  <th>Modifier</th>
							  </tr>
						  </thead>   
						  <tbody>
<?php 
							
						  foreach ($liste as $l)
				{
							?>
							<tr>
								<td><?php echo $l['id_commande']; ?> </td>
								<td><?php echo $l['id_client']; ?> </td>
								<td class="center"><?php echo $l['date_commande'];?></td>
								<td class="center"><?php echo $l['montant_commande']; ?></td>
								<td class="center">
								<?php if ($l['payement_commande']=='Pay&#233e'){ ?>
								<span class="label label-success"><?php echo $l['payement_commande']; ?></span> <?php } ?>
								<?php if ($l['payement_commande']!='Pay&#233e') {?><span class="label label-important"><?php echo $l['payement_commande'];?></span> <?php } ?>
								</td>

								<td class="center">
								<?php if ($l['status_commande']=='Confirm&#233e'){ ?>
								<span class="label label-success"><?php echo $l['status_commande']; ?></span> <?php } ?>
								<?php if ($l['status_commande']!='Confirm&#233e') {?><span class="label label-important"><?php echo $l['status_commande'];?></span> <?php } ?>
								</td>
								<td class="center"><?php echo $l['adresse_commande'] ?></td>
								<td class="center">
								
								<a class="btn btn-danger" href="crudcommande.php?id_commande= <?php echo $l['id_commande']; ?> &id=30" onclick="return confirmAction()">
										<i class="halflings-icon white trash"></i> 
									</a>

								</td>
							</tr>
							<?php } ?>
							
							  </tbody>
							

						 </table>  
						 <!--
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
						  </ul>
						</div> 
						-->						
					</div>
				</div><!--/span-->
			


    

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
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
			<span style="text-align:left;float:left">Copyrights WebCrafters 20Copyrights WebCrafters 2016</span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

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
	<!-- end: JavaScript-->
	
</body>
</html>

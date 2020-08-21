<?php
include ('../fonctions-panier.php');
include ("crudVehicule.php");
$cc = new crudVehicule();
$list=$cc->afficheVehicule($cc->conn);


//var_dump($list1);
?>
<!DOCTYPE html>

<html lang="en">
 <head>
	<?php include ('_interface.php');?>

			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="ajoutVehicule.php">
						  <fieldset>
						  <div class="control-group">
							  <label class="control-label" for="typeahead">ID Vehicule </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="id_v"  data-provide="typeahead" data-items="4" required>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Matricule </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="gouvernorat"  data-provide="typeahead" data-items="4" pattern="[0-9]{1,3}[A-Z]{2}[0-9]{1,4}" required>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Ajouter Vehicule</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Affichage Vehicule</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID Vehicule</th>
								  <th>Matricule</th>
								  <th>Status</th>
								  <th>Actions</th>
								  <th></th>
							  </tr>
							  </thead>
							  <tbody>
				<?php
				
				
				foreach ($list as $l) {
				
				 ?>
							  <tr>
								<td><?php echo $l['id_v']?></td>
								<td class="center"><?php echo $l['gouvernorat']?></td>
								<td class="center">
								<?php if ($l['status_v']=='Active'){ ?>
								<a href="crudVehicule.php?id=6&id_v=<?php echo $l['id_v']; ?>&status_v=<?php echo $l['status_v']; ?>" ><span class="label label-success"><?php echo $l['status_v']; ?></span></a> <?php } ?>
								<?php if ($l['status_v']!='Active') {?><a href="crudVehicule.php?id=6&id_v=<?php echo $l['id_v']; ?>&status_v=<?php echo $l['status_v']; ?>" ><span class="label label-important"><?php echo $l['status_v'];?></span> </a><?php } ?>
								</td>
								<td class = "center">
									<a class="btn btn-info" href="vehiculemodif.php?id_v=<?php echo $l['id_v'] ?>">
										<i class="halflings-icon white edit"></i>  
								</td>
								<td class="center">
									<a class="btn btn-danger" href="supprimerVehicule.php?id_v=<?php echo $l['id_v'] ?>" >
										<i class="halflings-icon white trash" name="supprimer"></i> 
									
									</a>
								</td>
							</tr>
						   
						  
						  
						  <?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>	
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Affichage Livraison</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID Livraison</th>
								  <th>Adresse Livraison</th>
								  <th>Code Postal</th>
								  <th>Gouvernorat</th>
								  <th>Prix</th>
								  <th>Vehicule</th>
								  <th>Email</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
							  </thead>
							  <tbody>
				<?php
				$list=$cc->afficheLivraison($cc->conn);
				foreach ($list as $l) {
				
				 ?>
							  <tr>
								<td class="center"><?php echo $l['id_livraison']?></td>
								<td class="center"><?php echo $l['adresse_livraison']?></td>
								<td class="center"><?php echo $l['code_p_l']?></td>
								<td class="center"><?php echo $l['gouvernorat_livraison']?></td>
								<td class="center"><?php echo $l['prix_livraison']?></td>
								<td class="center"><?php echo $l['vehicule_livraison']?></td> 
								<td class="center"><?php echo $l['email_livraison']?></td> 
								<td class="center">
								<?php if ($l['vehicule_livraison']!=0){ ?>
									<span class="label label-success">Envoyee</span> <?php } ?>
								<?php if ($l['vehicule_livraison']==0){ ?>
								<span class="label label-warning">En Attente</span> <?php } ?>
								</td>
								<td class="center">
									<a class="btn btn-info" href="formulaire_modif_liv.php?id_livraison=<?php echo $l['id_livraison'] ?>">
										<i class="halflings-icon white edit"></i>  
								</td>
								
							</tr>
						   
						  
						  
						  <?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>
</div>
		

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
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2016 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">Ben Ghorbel Responsive Dashboard</a></span>
			
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

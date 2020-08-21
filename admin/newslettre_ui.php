
<?php 
		 session_start();
include ('../fonctions-panier.php');

if(!isset($_SESSION['admin_login']))
	header('location:login.php');

			include ('crudnewslettre.php');
	
    $crud=new crudnewslettre();
    $liste=$crud->afficherlesnewslettres($crud->conn);
	
    
	  
	
	?>
<!DOCTYPE html>
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
			
			
			<!-- start: Content -->
			
			
	

			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.php">Acceuil</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Newslettre</a></li>
			</ul>

			
			<div class="row-fluid sortable">	
		
				<div class="box span12">
				


					<div class="box-header" data-original-title>
					
						<h2><i class="halflings-icon book white"></i><span class="break"></span>Newslettres</h2>
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
								  <th>id</th>
								  <th>subject</th>
								  <th>date</th>
								  <th>actions </th>
								  
							  </tr>
						  </thead>
 <tbody>						  
						 

										
										
	
									  <?php




						  foreach ($liste as $l)
			{ 
				
				?>
				
							<tr>
								<td><?php echo $l['id']; ?> </td>
								<td><?php echo $l['subject']; ?> </td>
								<td class="center"><?php echo $l['newslettre_date'];?></td>
							

								
								
								<td class="center">
									<a class="btn btn-success" id="" data-target="" href="crudnewslettre.php?id=5&id_newslettre=<?php echo $l['id'] ?>">
										<i class="icon-envelope"></i>  
									</a>
									
									<a class="btn btn-danger" href="crudnewslettre.php?id=6&id_newslettre=<?php echo $l['id']; ?>" onclick="return confirmAction();">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							

							<?php } ?>
							
							  </tbody>
						 </table>  
						
					</div>
				</div><!--/span-->
				
				
			</div><!--/row-->
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Ajouter Newslettre</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content" style="display: none;">
						<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="crudnewslettre.php?id=1">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">subject</label>
							  <div class="controls">
								<input type="text" name="subject" class="span6 typeahead" id="typeahead"   data-provide="typeahead" data-items="4" required >
							  </div>
							</div>
							
							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Message</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="message"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add newslettre</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   


					</div>
				</div><!--/span-->

			</div><!--/row-->
			
				
			
			
			
			

			
    

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<!--
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
	</div>-->
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2016 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">Ben ghorbel meubles backoffice</a></span>
			
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

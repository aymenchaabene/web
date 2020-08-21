<?php 
include ('../fonctions-panier.php');

include("crudOffre.php");
?>

<html lang="en">
<head>
	
	<!-- start: Meta -->
	<?php include('_interface.php') ?>
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
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Offres Par Client</a></li>
			</ul>
				

				<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Offres par clients</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>

					
			<table class="table table-striped table-bordered bootstrap-datatable datatable" id="t01">
			 
			  
			    <div class="control-group">
				
				<div class="controls">
			  
			   
		  <thead>
			
				  <tr>
				   <th>ID_Offre_Par_Client</th>
								  <th>CIN Client</th>
								  <th>Nom Client</th>
								  <th>Prenom Client</th>
								   <th>Id_Offre_choisi</th>
								  <th>Nom_offre_choisi</th>
								
							  </tr>
			    </thead>


		
						  <tbody>
					
					
						 
							<?php
					        $cc=new crudOffre();
							$list=$cc->afficheOffre_par_client($cc->conn);
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
                               <td class="center"><?php echo $l1[5]; ?></td>
			
							
							
							
							</tr>
							
					
						<?php
						}
						?>
						
						
					
						
						
											      </tbody>


				</table>				
						
							
							
 </div>	
					 </div>	</div>	
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
	
			<!--<script type="text/javascript" id="servicewb_133978">
(function() {
var cv = document.createElement("script"); cv.type = "text/javascript"; cv.async = true;
cv.src = "http://www.compteur-visite.com/service.php?v=1.1&id=133978&k=82fc55da11e615b97d42e2587023690f&c="+document.cookie;
var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(cv, s);
})();
</script>
<noscript><a href="http://www.compteur-visite.com/">Services gratuits pour webmasters</a></noscript>-->
	
</body>
</html>
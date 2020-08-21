<?php
include ('../fonctions-panier.php');

session_start();

if(!isset($_SESSION['admin_login']))
	header('location:login.php');

include("crudOffre.php");
$cc=new crudOffre();
$list=$cc->afficheOffre($cc->conn);



?>
<html lang="en">
<head>
	
	<?php include('_interface.php'); ?>
			
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
				<li><a href="#">Offres</a></li>
			</ul>

			
		
			

			
				
			
			
		<!--mena bdina -->	
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Offres</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>

					
				<div class="box-content">
					  <form method="POST" action="ajoutO.php">
					 <td  ></td><input type="submit"  class="btn-mini btn-success"  value="Ajouter Offre"  ></td>
					</form>	
					
					<form method="GET" action="RechercherO.php" >
					<tr>
					<select name="op" id="select">
<option value="id_offre">Par Id_Offre</option>
<option value="nom">Par Nom_Offre</option>
<option value="nbre_pt_fid">Par Nbre_pt_fid</option>

</select>
               <td  ></td><td><input type="text" name="id_offre" value="" required placeholder="ID offre..."></td><td  > 
		       <input type="submit"  class="btn-mini btn-success"  value="Recherche" name="recherche" ></td>
			   
              </tr></form >
					
              
					
					
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
			  
			    <div class="control-group">
				
				<div class="controls">
		
			
				  <tr>
								   <th> ID offre</th>
								  <th>Nom offre </th>
								  <th>Nbre_pt_fid</th>
								   <th>Debut_offre</th>
								  <th>Fin_offre</th>
								  <th>Description</th>
								
								  <th>Actions</th>
							  </tr>
			    </thead>


		
						  <tbody>
					
					
						 
							
							<?php
							foreach ($list as $l1){
							?>
					  
							
					
							<tr>
								<td ><?php echo $l1[0]; ?> </td>
								<td ><?php echo $l1[1]; ?> </td>
								<td ><?php echo $l1[2];?></td>
								<td class="center"><?php echo $l1[3]; ?></td>
								<td class="center"><?php echo $l1[4]; ?></td>
                                <td > <?php echo $l1[5]; ?> </td>
						          
										  
							<td class="center">
									
									<a class="btn btn-info" href="modificationO.php?id_offre=<?php echo $l1[0] ; ?>">
									
				
										
										
										<i class="halflings-icon white edit" ></i>  
										
									</a>
								
									<a class="btn btn-danger" href="supprimerO.php?id_offre=<?php echo $l1[0] ; ?>"  onclick="return confirmActiondeleteoffre()"   >
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							
							
							</tr>
							
					
						<?php
						}
						?>
						
						
					
						
						
						

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

				
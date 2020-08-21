<?php session_start();
include ('../fonctions-panier.php');

if(!isset($_SESSION['admin_login']))
	header('location:login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include ('crudproduit.php');
	include('crudcategorie.php');
	include ('crudpromotion.php');
	$crud_cat=new crudcategorie(); 
    $crud=new crudproduit();
    $liste=$crud->Afficher_Produit($crud->conn);
	$liste_categories=$crud_cat->Afficher_categorie($crud->conn);
	
	  
	
	$crud_promo=new crudpromotion();
	$categorie=$crud_cat->Afficher_categorie($crud_cat->conn);
	$promotions=$crud_promo->Afficher_promotion($crud_cat->conn);
	if (isset($_GET['action']) &&$_GET['action']==='rechercher' && isset($_POST['rechercheinput']) && $_POST['rechercheinput']!=''  )
{
	
	$liste=$crud->Rechercher_Produit($crud->conn,$_POST['rechercheinput']) ;
	
}


	?>
	<?php include('_interface.php'); ?>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			<?php $i=0;

			foreach ($liste as $full)
			{
				
			?>
			
			<!-- start: Content -->
			
				<div class="container">
				
				<div class="modal hide fade" id="modalproduct<?php echo $i ;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
          <p><h1><?php echo $full['nom_produit']; ?></h1></p>
          <img src="<?php echo $full['img_url']; ?>" class="img-responsive" />
		  <h2> Prix : <?php echo $full['prix_produit']; ?> </h2>
		  <p><h4><?php echo $full['desc_produit']; ?> </h4> </p>
		  <p><h4>Quantity :<?php echo $full['qte_produit']; ?> </h4> </p>
		  <p><h4>Date:<?php echo $full['date_produit']; ?> </h4> </p>
		  <p><h4>Status:<?php if ($full['Status']=='Active'){ ?>
								<span class="label label-success"><?php echo $full['Status']; ?></span> <?php } ?>
								<?php if ($full['Status']!='Active') {?><span class="label label-important"><?php echo $full['Status'];?></span> <?php } ?> </h4> </p>

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

<div class="container">
<div class="modal hide fade" id="editproduct<?php echo $i ;?>" role="dialog">
<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
		<form method="POST" enctype="multipart/form-data" action="crudproduit.php?id=5">
		<div class="table-responsive" >
<table class="table">
<tr>
<tr>
<td>id_produit</td>
<td><input type="text" name="id_produit_edit" value="<?php echo $full['id_produit']; ?>" readonly  ></td>
</tr>
<tr>
<td>nom_produit</td>
<td><input type="text" name="nom_produit" value="<?php echo $full['nom_produit'];  ?>" pattern="^[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*"></td>
</tr>
<tr>
<td>prix_produit</td>
<td><input type="text" name="prix_produit" value="<?php echo $full['prix_produit'];  ?>"pattern="[1-9]{1,4}"></td>
</tr>
<tr>
<td>qte_produit</td>
<td><input type="text" name="qte_produit" value="<?php echo $full['qte_produit'];  ?>"pattern="[1-9]{1,4}"></td>
</tr>
<tr>
<td>desc_produit</td>
<td><input type="text" name="desc_produit"value="<?php echo $full['desc_produit'];  ?>"></td>
</tr>

<tr>
<td>ptsfid_produit</td>
<td><input type="text" name="ptsfid_produit"value="<?php echo $full['ptsfid_produit'];  ?>" pattern="[1-9]{1,4}"></td>
</tr>
<tr>
<td>Categorie</td>
	<td>	
		<select name="id_categorie">
		<?php 
			foreach($liste_categories as $LLC)
		{ ?>
			<option value="<?php echo $LLC['id_categorie']; ?>" <?php if($LLC['id_categorie']===$full['id_categorie'] ) echo "selected" ?> > <?php echo $LLC['nom_categorie']; ?> </option>
		<?php } ?>
		</select>
	</td>
</tr>



								<tr>
<td>Promotion</td>
	<td>	
		<select class="form-control" name="promoselect" >
								<?php foreach ($promotions as $promo){  ?>
								<option value="<?php echo $promo['id_promotion']; ?>" <?php if ($promo['id_promotion']===$full['id_promotion']) echo "selected"; ?> ><?php echo $promo['nom_promotion'] ; if ($promo['Pourcentage_promotion']>1) echo " (".$promo['Pourcentage_promotion']."%)" ; ?> </option>
								<?php } ?>
								</select>
	</td>
</tr>
<tr>
<td>image</td>
<td><img name="image" src="<?php echo $full['img_url']; ?> " ><input hidden name="currentimage" value="<?php echo $full['img_url']; ?>" /></td>
</tr>
<tr>
<td>upload</td>
<td><input type="file" name="fileInput"></td>
</tr>
<tr>
<td> <input type="submit" class="btn btn-info" value="update"></td>
</tr>

						  
</table>
 </div>
</form>

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
   
    $("#produitedit<?php echo $i; ?>").click(function(){
        $("#editproduct<?php echo $i; ?>").modal({backdrop: true});
   });

			});

</script>

			<?php $i++;} ?>
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.php">Acceuil</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Promotions</a></li>
			</ul>
<div>
<form method="POST" action="productmanagment.php?action=rechercher">
<input type="text" name="rechercheinput" pattern="[1-9]{1,4}" >
<input type="submit" name="recherchesubmit" value="rechercher" class="btn-info">
</form>
</div>	
			<div class="row-fluid sortable">	
		
				<div class="box span12">
				


					<div class="box-header" data-original-title>
					
						<h2><i class="halflings-icon book white"></i><span class="break"></span>Produits</h2>
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
								  <th>nom Promotion</th>
								  <th>Pourcentage</th>
								  <th>supprimer</th>
								  
							  </tr>
						  </thead>
 <tbody>						  
						 

										
										
	
									  <?php
$i=0;



						  foreach ($promotions as $P)
			{ 
				
				?>
				
							<tr>
								<td><?php echo $P['id_promotion']; ?> </td>
								<td><?php echo $P['nom_promotion']; ?> </td>
								<td class="center"><?php echo $P['Pourcentage_promotion']."%";?></td>
							

								
								
								
								<td class="center">
									
									<a class="btn btn-danger" href="crudpromotion.php?id=4&id_promotion=<?php echo $P['id_promotion'];?>" onclick="return confirmAction();">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							

							<?php $i++; } ?>
							
							  </tbody>
						 </table>  
						 
					</div>
				</div><!--/span-->
				
				
			</div><!--/row-->
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Ajout Promotion</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content" style="display: none;">
						<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="crudpromotion.php?id=1">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nom</label>
							  <div class="controls">
								<input type="text" name="nom_promotion" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" pattern="^[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*" required >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Pourcentage</label>
							  <div class="controls">
								
								<select name="Pourcentage">
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="25">25</option>
								<option value="30">30</option>
								<option value="35">35</option>
								<option value="40">40</option>
								<option value="45">45</option>
								<option value="50">50</option>
								</select>
							  </div>
							</div>
							
							
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
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
					
						<h2><i class="halflings-icon book white"></i><span class="break"></span>Attribuer la promotion : </h2> 
						
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					
					<div class="box-content">
					<h3> Select the promotion </h3>
					<form method="POST" action="crudpromotion.php?id=2">
					<select class="" name="promo2set" >
								<?php foreach ($promotions as $promo_att){ ?>
								<option value="<?php echo $promo_att['id_promotion']; ?>" ><?php echo $promo_att['nom_promotion'] ;?> </option>
								<?php } ?>
								</select>
						<table class="table table-striped table-bordered bootstrap-datatable datatable ">
						  <thead>
							  <tr>
								  <th>  </th>
								  <th>id</th>
								  <th>nom</th>
								  <th>prix</th>
								  <th>quantité</th>
								  <th>Date</th>
								  <th>Categorie</th>
								   <th>Promotion</th>
							  </tr>
						  </thead>   
						

										<tbody>
										
	
									  <?php
$i=0;



						  foreach ($liste as $l)
			{ 
				
				?>
				  
							<tr>
								<td><input type="checkbox" name="check_liste[]"  value="<?php echo $l['id_produit']?>" /></td>
								<td><?php echo $l['id_produit']; ?> </td>
								<td><?php echo $l['nom_produit']; ?> </td>
								<td class="center"><?php echo $l['prix_produit'];?></td>
								<td class="center"><?php echo $l['qte_produit']; ?></td>
								<td class="center"><?php echo $l['date_produit']; ?></td>
								<td class="center"><?php echo $l['nom_categorie']; ?></td>

								<td class="center">
								
								<a href="#" ><span class="label label-success"><?php echo $l['nom_promotion']; ?></span></a> 
								
								</td>
								
								
							</tr>
							

							<?php $i++; } ?>
							
							
							  </tbody>
							  
						 </table>  
<div class="form-actions">
							  <button type="submit" class="btn btn-primary">attribuer la promotion</button>
							 
							</div>
							</form>
						   
					</div>
				</div><!--/span-->
				
				
			</div><!--/row-->
	
			
			

			
    

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
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>
			
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

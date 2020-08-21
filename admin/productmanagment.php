<?php session_start();
include ('../fonctions-panier.php');

if(!isset($_SESSION['admin_login']))
	header('location:login.php');

$upload="../"

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<?php 
	include ('crudproduit.php');
	include('crudcategorie.php');
	include ('crudpromotion.php');
	$crud_cat=new crudcategorie(); 
    $crud=new crudproduit();
    $liste=$crud->Afficher_Produit($crud->conn);
	$liste_categories=$crud_cat->Afficher_categorie($crud->conn);
	
	  
	
	$crud_promo=new crudpromotion();
	$categorie=$crud_cat->Afficher_categorie($crud_cat->conn);
	$promotions=$crud_promo->Afficher_promotion($crud_cat->conn);
	


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
          <img src="<?php echo "../uploads/".$full['img_url']; ?>" class="img-responsive" />
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
<td>id</td>
<td><input type="text" name="id_produit_edit" value="<?php echo $full['id_produit']; ?>" readonly  ></td>
</tr>
<tr>
<td>nom</td>
<td><input type="text" name="nom_produit" value="<?php echo $full['nom_produit'];  ?>" pattern="^[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*"></td>
</tr>
<tr>
<td>prix</td>
<td><input type="text" name="prix_produit" value="<?php echo $full['prix_produit'];  ?>" pattern="[-+]?[0-9]*[.,]?[0-9]+"></td>
</tr>
<tr>
<td>quantite</td>
<td><input type="text" name="qte_produit" value="<?php echo $full['qte_produit'];  ?>" pattern="\d{1,3}"></td>
</tr>
<tr>
<td>description</td><td> <?php echo $full['desc_produit'];  ?> </td>
</tr>
<tr>
<td> modifier la description</td>

<td><input type="text" name="desc_produit"value="<?php echo $full['desc_produit'];  ?>"></td>
</tr>

<tr>
<td>points de fidelite</td>
<td><input type="text" name="ptsfid_produit"value="<?php echo $full['ptsfid_produit'];  ?>" pattern="\d{1,3}"></td>
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
			<option value="<?php echo $promo['id_promotion']; ?>" <?php if ($promo['nom_promotion']===$full['nom_promotion']) echo "selected"; ?> > <?php echo $promo['nom_promotion']; ?> </option>
			<?php } ?>
								</select>
	</td>
</tr>
<tr>
<td>image</td>
<td><img name="image" src="<?php echo "../uploads/".$full['img_url']; ?> " ><input hidden name="currentimage" value="<?php echo "../uploads/".$full['img_url']; ?>" /></td>
</tr>
<tr>
<td>modifier l'image</td>
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
					<a href="dead/dead.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Produits</a></li>
			</ul>

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
								  <th>nom</th>
								  <th>prix</th>
								  <th>quantity</th> 
								  <th>Date</th>
								  <th>Categorie</th>
								   <th>Status</th>
								   <th>Actions</th>
							  </tr>
						  </thead>   
						

										<tbody>
										
	
									  <?php
$i=0;



						  foreach ($liste as $l)
			{ 
				
				?>
				  
							<tr>
								<td><?php echo $l['id_produit']; ?> </td>
								<td><?php echo $l['nom_produit']; ?> </td>
								<td class="center"><?php echo $l['prix_produit'];?></td>
								<td class="center"><?php echo $l['qte_produit']; ?></td>
								<td class="center"><?php echo $l['date_produit']; ?></td>
								<td class="center"><?php echo $l['nom_categorie']; ?></td>

								<td class="center">
								<?php if ($l['Status']=='Active'){ ?>
								<a href="crudproduit.php?id=6&id_produit=<?php echo $l['id_produit']; ?>&Status=<?php echo $l['Status']; ?>" ><span class="label label-success"><?php echo $l['Status']; ?></span></a> <?php } ?>
								<?php if ($l['Status']!='Active') {?><a href="crudproduit.php?id=6&id_produit=<?php echo $l['id_produit']; ?>&Status=<?php echo $l['Status']; ?>" ><span class="label label-important"><?php echo $l['Status'];?></span> </a><?php } ?>
								</td>
								
								<td class="center">
									<a class="btn btn-success" id="produit<?php echo $i; ?>" data-target="#modalproduct<?php echo $i; ?>">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info"  id="produitedit<?php echo $i; ?>" data-target="#editproduct<?php echo $i; ?>" >
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="crudproduit.php?id=4&id_produit=<?php echo $l['id_produit'] ;?>" onclick="return confirmActionproduit();">
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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Ajout produit</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content" style="display: none;">
						<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="crudproduit.php?id=1">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nom</label>
							  <div class="controls">
								<input type="text" name="nom_produit" class="span6 typeahead" id="typeahead" pattern="^[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*"  data-provide="typeahead" data-items="4" required >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Prix</label>
							  <div class="controls">
								<input type="text" name="prix_produit" class="span6 typeahead" id="typeahead" pattern="\d{1,5}"  data-provide="typeahead" data-items="4" required >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Quantite </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="qte_produit" id="typeahead" pattern="\d{1,3}"  data-provide="typeahead" data-items="4" required >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Points de fidelite </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="ptsfid_produit" id="typeahead" pattern="\d{1,3}" data-provide="typeahead" data-items="4"  >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Categorie</label>
							  <div class="controls">
								<select class="form-control" name="id_categorie" >
								<?php foreach ($categorie as $cat){ ?>
								<option value="<?php echo $cat['id_categorie']; ?>" ><?php echo $cat['nom_categorie'] ;?> </option>
								<?php } ?>
								</select>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Promotion</label>
							  <div class="controls">

								<select class="form-control" name="id_promotion" >
								<?php foreach ($promotions as $promo){  ?>
								<option value="<?php echo $promo['id_promotion']; ?>" ><?php echo $promo['nom_promotion'] ; if ($promo['Pourcentage_promotion']>1) echo " (".$promo['Pourcentage_promotion']."%)" ; ?> </option>
								<?php } ?>
								</select>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" >File input</label>
							  <div class="controls">
								<input type="file" name="fileInput">
							  </div>
							</div>      
							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="desc_produit"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">ajouter produit</button>
							  <button type="reset" class="btn">annuler</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
			<div class="row-fluid sortable">	
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Categories</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered">
							  <thead>
								  <tr>
									  <th>id</th>
									  <th>nom categorie</th>
									                                       
								  </tr>
							  </thead>   
							  <tbody>
							  
							  <?php
									$j=0;
							  foreach ($liste_categories as $lc) 
							  
							  {
								  ?>
								<tr>
									<td><?php echo $lc['id_categorie'] ; ?></td>
									<td class="center"><?php echo $lc['nom_categorie'] ; ?></td>
									
									<td class="center">
									
									
									<a class="btn btn-danger" href="crudcategorie.php?id=4&id_categorie=<?php echo $lc['id_categorie'] ;?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>                                  
								</tr>
							  <?php } $j++; ?>            
							  </tbody>
						 </table>  
						 
					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Add Categorie</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content" style="display: none;>
						<table class="table table-condensed">
							  <div class="box-content">
						<form class="form-horizontal" method="POST" action="crudcategorie.php?id=1">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">new Categorie name </label>
							  <div class="controls">
								<input type="text" name="nom_categorie" class="span6 typeahead" id="typeahead" pattern="[a-z]{1,15}"  data-provide="typeahead" data-items="4" >
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
						 </table>  
						    
					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Edit Categorie</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content" style="display: none;>
						<table class="table table-condensed">
							  <div class="box-content" >
						<form class="form-horizontal" method="POST" action="crudcategorie.php?id=2">
						  <fieldset>
						  <div class="control-group">
							  <label class="control-label" for="typeahead">Categorie</label>
							  <div class="controls">
								<select class="form-control" name="id_categorie_edit" >
								<?php foreach ($categorie as $cat){ ?>
								<option value="<?php echo $cat['id_categorie']; ?>" ><?php echo $cat['nom_categorie'] ;?> </option>
								<?php } ?>
								</select>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Categorie name </label>
							  <div class="controls">
								<input type="text" name="nom_categorie" class="span6 typeahead" id="typeahead"pattern="[a-z]{1,15}"  data-provide="typeahead" data-items="4" >
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">update</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
						 </table>  
						    
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
			<h3>Options</h3>
		</div>
		<div class="modal-body">
			<p style="text-align:center;"><a href="printcatalogue.php" ><button type="button" class="btn btn-default" >Generer Catalogue</button></a></p>
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

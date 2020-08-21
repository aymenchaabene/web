<?php

session_start();
include ('crudcommande.php');
include ('crudproduit.php');


if(!isset($_SESSION['admin_login']))
	header('location:login.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
<?php include ('_interface.php'); ?>
			
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
					<a href="index.html">Acceuil</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="table.php">Tables</a></li>
				<li>
				<i class="icon-angle-right"></i>
				<a href="#">Modification des commandes</a></li>

			</ul>

<div class="row-fluid sortable">
<div class="box span12">

	<div class="box-header" data-original-title>
							<h2><i class="halflings-icon white edit"></i><span class="break"></span>Mise à jour des commandes</h2>
							<div class="box-icon">
								<a href="table.php"><i class="halflings-icon white arrow-left"></i></a>
								<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
								<a href="table.php" class="btn-close"><i class="halflings-icon white remove"></i></a>

							</div>
	</div>

<?php 
						$crud=new crudcommande();
						$liste=$crud->Afficher_1_Commande($crud->conn,$_GET['id_commande']);
						$listex=$crud->Total_Commande($crud->conn,$_GET['id_commande']);
						
						$total=0;
						foreach ($listex as $v)
						{
							$total+=$v['montant_produit']*$v['qte_produit'];	
						}
							
												
					foreach ($liste as $l)

?>
	<div class="box-content">
	<form class="form-horizontal" method="POST" action="crudcommande.php?id=1&id_commande=<?php echo $l['id_commande'] ?>">
	<fieldset>
			<tr>
			 <div class="control-group">
			<td><label class="control-label" for="disabledInput">ID Commande</label></td> 
			<div class="controls">
			 <td><input class="input-xlarge disabled" id="disabledInput" value="<?php echo $l['id_commande'] ?>" disabled></td> 
			</div>
			  </div>
			 </tr>
			<tr>
			<div class="control-group">
			<td> <label class="control-label" for="focusedInput">ID Client:</label></td>
			<div class="controls">
			<td><input class="input-xlarge focused" id="focusedInput" name="id_client" pattern="[0-9]{8}" title="ID client doit être composé de 8 chiffres" maxlength="8" value="<?php echo $l['id_client'] ?>"disabled>
				<div id="test_id_client"></div>
			</td>
			</div>
			</div>
			</tr>
			<!-- break line -->
			<tr>
			<div class="control-group">
			<td> <label class="control-label" for="focusedInput">Date Commande:</label></td>
			<div class="controls">
			<td><input class="input-xlarge focused" id="focusedInput" name="date_commande" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" title="Les dates doivent être sous le format: JJ-MM-YYYY" maxlength="10" value="<?php echo $l['date_commande'] ?>" required></td>

			</div>
			</div>
			</tr>
			<!-- break line -->
			<tr>
			<div class="control-group">
			<td><label class="control-label" for="appendedInput">Montant:</label></td>
			<div class="controls">
			 <div class="input-prepend input-append">
			<td><input id="appendedInput" name="montant_commande" pattern="[0-9]{2,}" title="Le Montant doit être composé de deux et seulement des chiffres" value="<?php echo $total ?>" required> <span class="add-on">Dt</span></td>
			 </div>
			</div>
			 </div>
			</tr>
			<!-- break line -->
			<tr>
			<div class="control-group">
			<td> <label class="control-label" for="focusedInput">Payement:</label></td>
			<div class="controls">
			<select data-placeholder="Payement" id="selectError2" name="payement_commande">
			<?php   						if(isset($_GET['p']))
												$p=($_GET['p']);

			
			if ($p=="Payée")	{ ?>
				

										  <option selected>Payée </option>
										  <option>Non Payée</option>
										  		<?php	}			  			
	 			else { ?>
										  <option>Payée </option>
										  <option selected>Non Payée</option>
												<?php 	}	?>

										  
			</select>
			</div>
			</div>
			
			</tr>	
			<!-- break line -->
			<tr>
			<div class="control-group">
			<td> <label class="control-label" for="focusedInput">Status:</label></td>
			<div class="controls">
			<select data-placeholder="Status" id="selectError2" name="status_commande">
											<?php	
												if(isset($_GET['s']))
													$s=($_GET['s']);


				 if ($s=="Confirmée")	{ ?>

										  <option selected>Confirmée</option> 
										  <option>En Attente</option>
										  <option>Annulée</option>

									<?php }
				
					else if ($s=="En Attente") { ?>
										  <option>Confirmée</option> 
										  <option selected>En Attente</option>
										  <option>Annulée</option>
										  
				<?php } 
				else { ?>
										  <option>Confirmée</option> 
										  <option>En Attente</option>
										  <option selected>Annulée</option>
				<?php } ?>

			</select>
			</div>
			</div>
			
			</tr>			
					<div class="form-actions">
								<button type="submit" class="btn btn-primary" onClick="check();">Mettre à jour</button>
								<a href="table.php" class="btn">Annuler</a>
		  	</div>

	</fieldset>			
	</form>
	
	</div>
</div>
</div>
<?php 			
		$id=0;
	if (isset($_GET['id_commande']))
		$id=$_GET['id_commande'];

		$crud=new crudproduit();
		$crud1=new crudlignedecommande();

?>

	<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
								<!--  glyphicons-icon shopping_cart -->
							<h2><i class="halflings-icon white shopping-cart"></i><span class="break"></span>Panier de la commande</h2>
							<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
							</div>
			</div>


			<div class="box-content">
			<fieldset>
			<table class="table table-bordered">
			<thead>
			<th> Nom Produit </th>
			<th> Prix Produit</th>
			<th> Quantité </th>
			<th> Action</th>

			<?php
	
			$liste=$crud1->Affiche_Produits($crud1->conn,$id);
			
			foreach ($liste as $l1)
			{
				$l=$crud->Afficher_1_Produit($crud->conn,$l1['id_produit']);
				$l2=$crud1->Affiche_Quantites($crud1->conn,$id,$l1['id_produit']);
				foreach ($l2 as $l3)
				{
					$qte=$l3['qte_produit'];
				}
			
			foreach ($l as $l0)
			{
			?>
			
			<div>
			<tr>

			<td class="center">
			<?php echo $l0['nom_produit']; ?> 
			</td>
			<td class="center"><?php echo $l0['prix_produit']; ?></td>
			<!--<td class="center"><?php echo $x ?> </td>-->
			
			
			<form method="POST" action="<?php echo "crudcommande.php?id=51&id_commande=".$id."&id_produit=".$l0['id_produit'] ?>">
				
			<td><input class="input-mini focused" id="focusedInput" name="qte" pattern="[1-9][0-9]*|0/" title="Only Numbers" value="<?php echo $qte ?>"required> </td>

			<td class="center">
				<button type="submit" class="btn btn-info" onClick="check();"><i class="halflings-icon white ok-sign"></i> </button>
				
			</form>
<!-- 				 <a class="btn btn-info" href="crudcommande.php?id=51&id_p= <?php echo $l0['id_produit'] ."id_qte=".$l0 ?>">
				<i class="halflings-icon white ok-sign"></i> 
				</a>
-->
				<a class="btn btn-danger" href="crudcommande.php?id=50&id_p= <?php echo $l0['id_produit']?>">
										<i class="halflings-icon white trash"></i> 
									</a>
			</td>
			</tr>
			</div>
		<?php
			}
			?>
			
	
			</thead>
			<?php
		
			}
	
		
			?>			
		
	
			</table>
			</fieldset>
			</div>
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
			<span style="text-align:left;float:left">Copyrights WebCrafters 2016</span>
			
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

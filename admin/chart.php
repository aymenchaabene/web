<?php
/** Include class */
session_start();
	if(!isset($_SESSION['admin_login']))
	header('location:login.php');
include( 'GoogChart.class.php' );
include ('crudcommande.php');
include ('crudproduit.php');
include ('crudClient.php');
include('crud/crud_rating.php');



/** Create chart */
$chart = new GoogChart();

     $cc=new crudClient();

	$crudproduit=new crudproduit();
	$crud=new crudcommande();
	$crudrating=new crudrating();
	$liste=$crud->Afficher_Commande($crud->conn);
	$listeproduit=$crudproduit->statproduit($crud->conn);
	$liste_notes=$crudrating->afficher_rating($crud->conn);	
	$listclient=$cc->affiche($cc->conn);

	
	$fall=0;
	$winter=0;
	$summer=0;
	$spring=0;
	$counter=0;
	foreach ($liste as $l)
	{
	$counter++;
	$datex = $l['date_commande'];
	$m=substr($datex,3,2);
	
	if ($m=='12' || $m=='01' || $m=='02' )
		$winter++;
	else if ($m=='03' || $m=='04' || $m=='05' )
		$spring++;
	else if ($m=='06' || $m=='07' || $m=='08' )
		$summer++;
	else if ($m=='09' || $m=='10' || $m=='11' )
		$fall++;
	
	}
	
	$w=$winter;
	$s=$spring;
	$su=$summer;
	$f=$fall;

	$winter=(($winter*100)/$counter);
	$spring=(($spring*100)/$counter);
	$summer=(($summer*100)/$counter);
	$fall=(($fall*100)/$counter);

/*

		Example 1
		Pie chart

*/

// Set graph data
$data = array(
			'Hiver' => $winter,
			'Printemps' => $spring,
			'Eté' => $summer,
			'Automme' => $fall,
		);
		$dataproduit=array();
foreach ($listeproduit as $liproduit)
{
	$dataproduit+=array($liproduit['nom_produit']=>$liproduit['nombre']);
	
}

$male=0;
$female=0;
foreach ($listclient as $listcl)
{
	//var_dump($listcl);
	if ($listcl['sexe']=='male')
		$male++;
	else 
		$female++; 
	
}
$datasexe='';
$datasexe=array(

'male'=>$male , 
'female'=>$female , 

);
$note_po=0 ; 
$note_neg=0;

foreach ($liste_notes as $ln)
{
	
	if ($ln['note'] > 3)
	$note_po++; 
	else {$note_neg++;}

}

$datarates = array(
			'note entre 1 et 3' => $note_neg,
			'note entre 3 et 5' => $note_po,
			
		);
// Set graph colors
$color = array(
			'#C1B7B4',
			'#7ec0ee',
			'#ffff4c',
			'#926239',
			
		);

/* # Chart 1 # */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
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
				<li><a href="chart.php">Statistiques</a></li>
			</ul>

			
			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Statistiques des ventes par mois</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
								<?php
					$chart->setChartAttrs( array(
						'type' => 'pie',
						'title' => 'Browser market 2008',
						'data' => $data,
						'size' => array( 400, 300 ),
						'color' => $color
						));
					// Print chart
					echo $chart;
					?>
					</div>
				</div>
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Les produits les plus vendus</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
								<?php
								//produit stat
					$chart->setChartAttrs( array(
						'type' => 'pie',
						'title' => 'Browser market 2008',
						'data' => $dataproduit,
						'size' => array( 400, 300 ),
						'color' => $color
						));
					// Print chart
					echo $chart;
					?>
					</div>
				</div>
				
			<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Evaluations</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
								<?php
								//produit stat
					$chart->setChartAttrs( array(
						'type' => 'pie',
						'title' => 'Browser market 2008',
						'data' => $datarates,
						'size' => array( 400, 300 ),
						'color' => $color
						));
					// Print chart
					echo $chart;
					?>
					<a href="bilang.php" > <button class="btn btn-primary" > Genrer bilan </button> </a>
					</div>
				</div>
					<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Sexe des clients inscrits</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
								<?php
								//produit stat
					$chart->setChartAttrs( array(
						'type' => 'pie',
						'title' => 'Browser market 2008',
						'data' => $datasexe,
						'size' => array( 400, 300 ),
						'color' => $color
						));
					// Print chart
					echo $chart;
					?>
					</div>
				</div>
				<div class="box span6">
				<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Graphe de nombre de ventes par saison</h2>
				<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
				</div>
				<div class="box-content">
				<?php
				$color =array(
			'#ffff4c',
			);

				$dataMultiple = array( 

				'Automme' => $f,
				'  '=>0,
				'Hiver' => $w,
				'  '=>0,
				' '=>0,

				'Printemps' => $s,
				'  '=>0,
				' 	'=>0,					
				'Eté' => $su,
				' 	'=>0,					
				' 	'=>0,					
				' 	'=>0,					
				
				
				);

				# Chart 2 # 
				$chart->setChartAttrs( array(
				'type' => 'bar-vertical',
				'title' => 'Nombre de commandes passée par saison',
				'data' => $dataMultiple,
				'size' => array( 550, 200 ),
				'color' => $color,
				'labelsXY' => true,
				));
				// Print chart
				echo $chart;
				?>
				</div>

			</div><!--/row-->
		
			<hr>
		
		
			

		
		

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

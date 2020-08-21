 <?php 
session_start();

if(!isset($_SESSION['admin_login']))
	header('location:login.php');
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
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>










				<center>
						<div id="boddy" class="bordure">
					
                     <form id ="form"  method="POST" action="ajouteroffre.php" onSubmit=" return validation()"   >
	
                        <table name="table1" rules="none" width="100%" class="table1">
                           </br>
                           <tr>
                              <td> Nom offre:    </td>
                              <td> <input type="text" size="105"  name ="nom" class="in1" />  </td>

                           </tr>
                           </br>
                           <tr>
                              <td> Nbre_pt_fid :  </td>
                              <td> <input name="nbre_pt_fid" size="445"class="in1" /> </td>
                           </tr>
                           <tr>
						   <?php $date=date("Y-m-d"); ?>
                              <td> Debut_offre :  </td>
                              <td> <input name="debut_offre" type="date"  name="date" id="da" class="in1" value="<?php echo $date ; ?>" /> </td>
                           </tr>
                           <tr>
                              <td> Fin_offre: </td>
                              <td> <input   name="fin_offre" type="date"  name="date" id="da"  class="in1" /> </td>
                           </tr>
                  
                          
                           <tr>
                              <td> Description : </td>
                              <td> <TEXTAREA  name="description"  type="text" size="445"></TEXTAREA> </td>
                           </tr>

                      

						   </table>
                        <center></br>
						<button type="submit" name="sumit" onclick="#" class="btn btn-info">Ajouter</button> 
                        
                        </center>
					
                     </form>
						</div>	</center>
						<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	<div class="clearfix"></div>
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
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>
			
		</p>

	</footer>
	
				   </body>
				   </html>
<?php
require_once ('crudnotification.php');

	$crudnotification=new crudnotification();

	$listenotification=$crudnotification->Afficher_Notification($crudnotification->conn);
	$total_notification=$crudnotification->Nombre_Notification($crudnotification->conn);

	
?>

<!-- start: Meta -->
<!DOCTYPE html>
<html lang="en">
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Meuble Ben Ghorbel</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
										<script>
									function confirmActionproduit(){
									var confirmed = confirm("Êtes-vous sûr de vouloir supprimer ce produit définitivement?");
									return confirmed;
									}
									function confirmActioncommande(){
var confirmed = confirm("Êtes-vous sûr de vouloir supprimer cette commande?");
return confirmed;
}
function confirmActionBan(){
									var confirmed = confirm("Ãªtes-vous sure vouloir bannir ce client dÃ©nitivement?");
									return confirmed;
									}
function confirmActiondeleteoffre(){
									var confirmed = confirm("Ãªtes-vous sure vouloir supprimer cet offre dÃ©nitivement?");
									return confirmed;
									}
									function confirmActiondeletepropo(){
									var confirmed = confirm("Ãªtes-vous sure vouloir supprimer cette proposition dÃ©nitivement?");
									return confirmed;
									}
									
									function confirmExtract()
									{
										
										alert ('Facture d"achat extraite en excel avec succes')
									}

									</script>
<script>
						$(document).ready( function() {
   $('#example').DataTable( {} ) ; 
						} ) ; 
						</script>
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="dead/dead.php"><span>Meuble Ben Ghorbel</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red">
								 <?php echo $total_notification ?> </span>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>Vous avez <?php echo $total_notification ?> notifications</span>
									<a href="javascript:window.location.href=window.location.href"><i class="icon-repeat"></i></a>
								</li>	
								<?php foreach ($listenotification as $lnotification){ ?>
								<?php if ($lnotification['type']=='u'){?>
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message"><?php echo $lnotification['content'] ?></span>
										<span class="time"><?php echo 'Il y a '. Eclap_Time($lnotification['time'])  ?></span> 
                                    </a>
                                </li>
								<?php } 
								 else if ($lnotification['type']=='c'){?>
                            	<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message"><?php echo $lnotification['content'] ?></span>
										<span class="time"><?php  echo 'Il y a '. Eclap_Time($lnotification['time'])   ?></span> 
                                    </a>
                                </li>
								<?php }
								else if ($lnotification['type']=='o'){?>
                            	<li>
                                    <a href="#">
										<span class="icon yellow"><i class="icon-shopping-cart"></i></span>
										<span class="message"><?php echo $lnotification['content'] ?></span>
										<span class="time"><?php  echo 'Il y a '. Eclap_Time($lnotification['time'])   ?></span> 
                                    </a>
                                </li>
								<?php } 
								 else{?>
                            	<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message"><?php echo $lnotification['content'] ?></span>
										<span class="time"><?php  echo 'Il y a '. Eclap_Time($lnotification['time'])   ?></span> 
                                    </a>
                                </li>
								<?php } ?>

								

								<?php }	?>
                                <li class="dropdown-menu-sub-footer">
                            		<a href="crudnotification.php?id=1">Marquer comme lu</a>
								</li>	
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-calendar"></i>
								<span class="badge red">
								5 </span>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>Vous avez 7 taches en progr&#xE8s</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">Organisation de la boutique</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Payement en ligne</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim green">47</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Footer</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim yellow">32</div> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">G&#xE9olocalisation</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim greenLight">63</div> 
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">Voir toutes les taches</a>
								</li>	
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<!--
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-envelope"></i>
								<span class="badge red">
								2 </span>
							</a>
							
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>Vous avez 2 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Gestionnaire de produits
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            le stock sera bientot epuis&#xE9	
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Gestionnaire de produits
										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                        <span class="message">
                                            le stock sera bientot epuis&#xE9	
                                        </span>  
                                    </a>
                                </li>
				
								<li>
                            		<a class="dropdown-menu-sub-footer">Voir tous les messages</a>
								</li>	
							</ul>
						</li>
						-->
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> Administrateur
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Param&#xE8tres du compte</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="admin_login.php?action=disconnect"><i class="halflings-icon off"></i> D&#xE9connexion</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Panneau de configuration</span></a></li>
							<li>
							<a class="dropmenu" href="#"><i class="icon-align-justify"></i><span class="hidden-tablet"> Ventes </span><span class="label label-important"> 2 </span></a>
						<ul>
						<li><a class="submenu" href="table.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Commandes</span></a></li>
						<li><a class="submenu" href="archive.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Archive</span></a></li>
						</ul>
						</li>
						<li><a href="productmanagment.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Produits</span></a></li>					
						<li><a href="promo.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Promotions</span></a></li>						
						<li><a href="newslettre_ui.php"><i class="icon-envelope"></i><span class="hidden-tablet"> Newslettre</span></a></li>
						<li><a href="chart.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Statistiques </span></a></li>												

						
						<!--<li><a href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>-->
						<!--<li><a href="widgets.html"><i class="icon-dashboard"></i><span class="hidden-tablet"> Widgets</span></a></li>
						<li>-->
						<!--
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Dropdown</span><span class="label label-important"> 3 </span></a>
							<ul>
								<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 2</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>
							</ul>	
						</li>
						-->
						<!--
						<li><a href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
						<li><a href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
						<li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
						-->
						<li><a href="crm.php"><i class="halflings-icon white user"></i><span class="hidden-tablet"> Clients</span></a></li>
						<li><a href="off.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Offres</span></a></li>
						<li><a href="off_par_client.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Offres Par client</span></a></li>

						<li><a href="prop_back.php"><i class="icon-folder-open"></i><span class="hidden-tablet">propositions</span></a></li>
						
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">service apres vente</span><span class="label label-important"></span></a>
							<ul>
								<li><a class="submenu" href="table_rec.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> reclamation</span></a></li>
								<li><a class="submenu" href="table_msg.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> messages</span></a></li>
								<li><a class="submenu" href="table_entretien.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> entretien</span></a></li>
							</ul>	
						</li>
						<li><a href="form.php"><i class="icon-folder-open"></i><span class="hidden-tablet">Livraison</span></a></li>
						<li><a href="chartgaith.php"><i class="icon-folder-open"></i><span class="hidden-tablet">Stats Livraison</span></a></li>
						<li><a href="../dead/comingsoon.php"><i class="icon-picture"></i><span class="hidden-tablet"> Gallerie</span></a></li>
						<li><a href="../dead/comingsoon.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendrier</span></a></li>
						<li><a href="../dead/comingsoon.php"><i class="icon-folder-open"></i><span class="hidden-tablet">Gestion des fichiers</span></a></li>
						<!--
						<li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>-->
						<!--
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
						-->
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->

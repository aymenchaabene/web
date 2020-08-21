
<title>Ben ghorbel Meubles</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<script type='text/javascript' language="javascript" src="js/validation.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<link href="css/search.css" rel="stylesheet" type='text/css'/>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<!--etalage-->
<link rel="stylesheet" href="css/etalage.css">
<link rel="stylesheet" href="css/raterater.css">

<script src="js/jquery.etalage.min.js"></script>
<script language="javascript" type="text/javascript" src="js/search.js"> </script>
<script language="javascript" type="text/javascript" src="js/controle.js"> </script>



<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>

  
</head>
<body style="background-color:#f5f5f0;" >
<!-- header -->
<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					<li><a href="ajout_reclamation.php">Réclamations</a></li>|
					<li><a href="contact.php">Nous Contacter</a></li>|
					<li><a href="<?php if(!(isset($_SESSION['login']))) echo "account.php"; else echo "gestionprofile.php" ;?>">Suivie de Commande</a></li>|
					<li><a href="blog/insc_forum.php">Forum</a></li>

				</ul>
			</div>
			<div class="top_left">
				<ul>
					<li class="top_link">Email: <a href="mailto@example.com">Meublebenghorbel@gmail.com</a></li>|
					<li class="top_link"> <a href="<?php if(!(isset($_SESSION['login'])))  echo "account.php"; else echo "gestionprofile.php" ;?>" > Mon compte </a></li>|					
				</ul>
				<div class="social">
					<ul>
						<li><a href="https://www.facebook.com/MeublesBENGhorbal21/?fref=ts"><i class="facebook"></i></a></li>
						<li><a href="#"><i class="twitter"></i></a></li>
						<li><a href="#"><i class="dribble"></i></a></li>	
						<li><a href="#"><i class="google"></i></a></li>										
					</ul>
				</div>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="header_top">
	 <div class="container">
		 <div class="logo">
		 	<a href="index.html"><img src="images/logo.png" alt=""/></a>			 
		 </div>
		 <div class="header_right">	
			 <div class="login">
			 <?php if(isset($_SESSION['login'])){?>
				 <a href="logout.php">D&#233connexion </a>
			 <?php }	 
			 else{
				 ?>
				 <a href="account.php">Connexion </a>  
			 <?php
			 }
			 ?>
			 </div>
			 <div class="cart box_1">
				<a href="panier.php">
					<h3> <span><?php echo (Montantglobal()." TND") ;?> </span> (<?php  echo (compterArticles()." "); ?>articles)<img src="images/bag.png" alt=""></h3>
				</a>	
				<!--<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>-->
				<div class="clearfix"> </div>
			 </div>				 
		 </div>
		  <div class="clearfix"></div>	
	 </div>
</div>

<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>

<!--cart-->
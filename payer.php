<?php 
session_start();
include_once("fonctions-panier.php");

				   $nbArticles=count($_SESSION['panier']['id_produit']);

if ($nbArticles <= 0)
				   {
				   header("Location: panier.php");
				   die();
				   }
				   
if (isset($_GET['id_l_c']))			   
$id_ligne=$_GET['id_l_c'];	   
				   
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Meuble Ben Ghorbel</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
  <script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 1
      $("#slider1").responsiveSlides({
         auto: true,
		 nav: true,
		 speed: 500,
		 namespace: "callbacks",
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
					<li><a href="#">Aide</a></li>|
					<li><a href="admin/dead/dead.php">Nous Contacter</a></li>|
					<li><a href="admin/dead/dead.php">Suivie de Commande</a></li>
				</ul>
			</div>
			<div class="top_left">
				<ul>
					<li class="top_link">Email: <a href="mailto@example.com">Meublebenghorbel@gmail.com</a></li>|
					<li class="top_link"><a href="admin/dead/dead.php">Mon compte</a></li>|					
				</ul>
				<div class="social">
					<ul>
						<li><a href="#"><i class="facebook"></i></a></li>
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
				 <a href="logout.php">D&#233connexion </a>
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
<!--cart-->
	 
<!------>

<div class="cart_main">
	 <div class="container">
			 <ol class="breadcrumb">
			 <li><a href="products.php">Boutique</a></li>
			<li><a href="panier.php">Panier</a></li>
			<li> <a href="check-out.php">Check-out</a></li>
			<li class="active grid">Payement</li> </br> </br>


		 </ol>			



		<div class="registration">
		<h2>Votre Commande est bien pass&#233e, voulez vous payer maintenant ou 
		ult&#233rieurement? </h2>
		</br>
		<h4> NB: Nulle Commande non pay&#233e sera trait&#233e. </h4>
		</br>
		<div class="registration_form">
		<form class="paypal" action="payement/payments.php" method="post" id="paypal_form">
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="no_note" value="1" />
		<input type="hidden" name="id_commande" value="<?php echo $id_ligne ?>" />
		<input type="hidden" name="lc" value="UK" />
		<input type="hidden" name="currency_code" value="EUR" />
		<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
		<input type="hidden" name="first_name" value="Customer's First Name"  />
		<input type="hidden" name="last_name" value="Customer's Last Name"  />
		<input type="hidden" name="payer_email" value="d.oussamabenghorbel@gmail.com"  />
		<input type="hidden" name="item_number" value="" / >
		<input type="submit" id="register-submit" name="submit" value="Payer maintenant"/>
		</form>
		</br>
		</br>
		<input type="submit" id="register-submit" name="submit"  value="Payer ult&#233rieurement"  onclick="location.href='products.php?id=20';"/>
		</br>
		</br>
		</br>
		</br>

				 <img src="images/paypal.jpg"/>

		</div>
		<div class="clearfix"></div>
		</div>
</div>
			 
			 
			 
			 
			 
</div>
</div>		 
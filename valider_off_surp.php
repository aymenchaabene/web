					<?php
           session_start();
//echo $_SESSION['cin'];
if(!isset($_SESSION['login']))
{header('location:index2.php');}

	if(isset($_SESSION['login']) && isset($_SESSION['mdp'])  )
	{
		//include("crudClient.php");
	    $user=$_SESSION['login'];
			include("crudOffre.php");
		
			
			
			$cc=new crudOffre();
			
			$pt=$cc->get_pt_fid_acc($user,$cc->conn);
			
				
		
		$pt_act=$pt-900;
		$cin=$cc->client_get_cin($user,$cc->conn);
		$cc->modif_pt_off_sup($cin,$cc->conn);
				
		$nom=$cc->client_get_nom($user,$cc->conn);
		$prenom=$cc->client_get_prenom($user,$cc->conn);					
		$id_offre=$_GET['id'];
        $nom_offre=$_GET['nom'];				
		
		
	
		
		?>
		



<!DOCTYPE HTML>
<html lang="fr">
<head>
<title>Ben Ghorbel Meubles</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!---->
 <meta charset="UTF-8">
 

     
      <link rel="stylesheet" href="t_web/css/inscri.css">
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	  <script src="t_web/js/formulaire.js"></script>
	

	<!---->
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
<body style="background-color:#f5f5f0;">
<!-- header -->
<!-- header -->

<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					<li><a href="#">help</a></li>|
					<li><a href="contact.html">Contact</a></li>|
					<li><a href="login.html">Track Order</a></li>
				</ul>
			</div>
			<div class="top_left">
				<ul>
					<li class="top_link">Email:<a href="mailto@example.com">benghorbel.meubles@gmail.com</a></li>|
					<li class="top_link"> <a  data-toggle="modal" data-target="#myModal"> Mon compte</a></li>|				
				
				</ul>
				<div class="social">
					<ul>
						<li><a href="#"><i class="facebook"></i></a></li>
						<li><a href="#"><i class="twitter"></i></a></li>
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
		 	<a href="index.html"><img src="images/logo.png" alt="" style=""/></a>			 
		 </div>
		 <div class="header_right">	
		
			 <div class="cart box_1">
				<a href="cart.html">
					<h3> <span class="simpleCart_total">$0.00</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> items)<img src="images/bag.png" alt=""></h3>
				</a>	
				<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
				<div class="clearfix"> </div>
			 </div>				 
		 </div>
		 
		  <div class="clearfix"></div>	
		   <center>
							 
                     <h3 class="h3" style="font-size: 45px ;color:#026466" > <strong > Bienvenue à votre  Espace Client </strong></h3>
					 
                  </center> 
				<br></br>
	 </div>
</div>


	  
<!--cart-->
	 						<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue"> 
		
			 <li class="active grid"><a class="color1" href="gestionprofile.php">Mon profil</a></li>
			 <li class="grid"><a class="color2" href="#">Mon panier</a>
			
				</li>
			<li><a class="color4" href="propositions.php">Propositions</a>
		
				</li>				
			
				<li><a class="color6" href="offres.php">Offres</a>
		
				</li>				
			
				<li><a class="color7" href="index2.php">Deconnexion</a>
				
				</li>				
			
							
			   </ul> 
			
			 <div class="clearfix"></div>
		 </div>
	  </div>
</div>
		<center>
	<form method="GET" class="bordure " >
	
	  <h3 class="h3" style="font-size: 25px " > <strong >Grâce à votre fidélité,vous pouvez bénificier maintenant</strong></h3> 
	 <h3 class="h3" style="font-size: 25px " > <strong > d'<strong style="color:red" > un offre surprise !</strong></strong></h3> 
				  <h3 class="h3" style="font-size: 25px " ><strong> Nombre des points de fidélité actuel : </strong> <strong  style="color:red" > <?php  echo ' <strong> '.$pt_act.' </strong> ' ?> </strong> <strong>points. </strong></h3> 
				  
    <a href="ajouter_off_client.php?id=<?php echo $id_offre ; ?> && cin=<?php echo $cin ; ?> && nom=<?php echo $nom ; ?> && prenom=<?php echo $prenom ; ?> && nom_offre=<?php echo $nom_offre ; ?>"> <input class="buttonoffpt   "  type="button" value="OK "></a>
				   																
               <!--      <h3 class="h3" style="font-size: 25px ;color:#026466 "" > <strong >Ben Ghorbel Meuble offre à ces clients fidèles des offres spéciales  </strong></h3> 
              <h3 class="h3" style="font-size: 25px ;color:#026466 "" > <strong >Et les remercie pour leur fidélité !</strong></h3> -->
				<br></br>
				
                  </center>


	  </form>
	  
	  
	  
	  
	
								<br></br>
	  <br></br>
	  <!-- début footer -->
      <!-- début footer -->
   
	 
	  <div class="footer-content">
	 <div class="container">
		 <div class="ftr-grids">
			 <div class="col-md-3 ftr-grid">
				 <h4>About Us</h4>
				 <ul>
					 <li><a href="#">Who We Are</a></li>
					 <li><a href="contact.html">Contact Us</a></li>
					 <li><a href="#">Our Sites</a></li>
					 <li><a href="#">In The News</a></li>
					 <li><a href="#">Team</a></li>
					 <li><a href="#">Carrers</a></li>					 
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Customer service</h4>
				 <ul>
					 <li><a href="#">FAQ</a></li>
					 <li><a href="#">Shipping</a></li>
					 <li><a href="#">Cancellation</a></li>
					 <li><a href="#">Returns</a></li>
					 <li><a href="#">Bulk Orders</a></li>
					 <li><a href="#">Buying Guides</a></li>					 
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Your account</h4>
				 <ul>
					 <li><a href="account.html">Your Account</a></li>
					 <li><a href="#">Personal Information</a></li>
					 <li><a href="#">Addresses</a></li>
					 <li><a href="#">Discount</a></li>
					 <li><a href="#">Track your order</a></li>					 					 
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Categories</h4>
				 <ul>
					 <li><a href="#">> Furinture</a></li>
					 <li><a href="#">> Bean Bags</a></li>
					 <li><a href="#">> Decor</a></li>
					 <li><a href="#">> Kichen & Dinning</a></li>
					 <li><a href="#">> Bed & Bath</a></li>
					 <li><a href="#">...More</a></li>					 
				 </ul>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>

<div class="footer">
	 <div class="container">
		
		 <div class="copywrite">
			 <p>Copyright © 2016 Webcrafters </p>
		 </div>			 
		 </div>
	 </div>

	  <!-- Modal Login -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <form class="login-form"name="formLogin" method="POST" action="login.php">
                  <div class="modal-header">
                                         <h4 class="modal-title" id="myModalLabel">Veuillez saisir votre login et votre mot de passe</h4>
                  </div>
                  <div class="modal-body">
                     <table class="tableau">
                        <tr>
                           <td>
                              <p class="white">&nbspLogin </p>
                           </td>
                           <td>
                              <p class="white"> &nbsp&nbspMot De Passe </p>
                           </td>
                        </tr>
                        <tr>
                           <td><input class="textbox" type="text" name="login" value="" class="in"></td>
                           <td> &nbsp <input  class="textbox" type="Password" name="mdp" value="" class="in"/></td>
                        </tr>
                        <tr>
                       
                           <td> &nbsp <a href="oublie.php"> Mot de passe oublie ?</a></td>
                        </tr>
                     </table>
                  </div>
                  <div class="modal-footer">
                     <td> &nbsp <a href='account.php' style="font-size: 20px " ><strong>Inscription&nbsp</strong></a></td>
                     <button type="submit" class="btn btn-info" >Se connecter</button>
                  </div>
               </form>
            </div>
         </div>
      </div> 
     
 </body>
</html>
	<?php
	}
	?>
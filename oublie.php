<?php
session_start();


?>
<head>
<title>Ben Ghorbel Meuble </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js_t/jquery-1.11.1.min.js"></script>
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
<script type="text/javascript" src="js_t/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js_t/menu_jquery.js"></script>
<script src="js_t/simpleCart.min.js"> </script>
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
<!-- header -->

<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					<li><a href="#">Aide</a></li>|
					<li><a href="contact.html">Contact</a></li>|     
					
					  
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
				 <a href="login.html">LOGIN</a>
			 </div>
			 <div class="cart box_1">
				<a href="cart.html">
					<h3> <span class="simpleCart_total">$0.00</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> items)<img src="images/bag.png" alt=""></h3>
				</a>	
				<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
				<div class="clearfix"> </div>
			 </div>				 
		 </div>
		  <div class="clearfix"></div>	
	 </div>
</div>
<!--cart-->
	 

<html lang="fr">
   <head>
      <meta charset="UTF-8">
 

     
      <link rel="stylesheet" href="css/inscri.css">
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	  <script src="js/formulaire.js"></script>
   </head>
   <body>
	  
	  
      <!-- fin header -->
      <!-- début aside -->
     <center> 
         <section>
            <div class="bordure">
               <div >
                  <center>
                     <h3 class="h3" style="font-size: 25px">Pour récupérer votre mot de passe,veuillez saisir votre adresse mail :</h3>
                  </center>
                  
                     <form id ="form"  method="post" action="recupererMDP.php"  >
                        <table name="table1"  width="100%" >
                           </br>
						   
                           <tr>
                           <!--   <td style="font-size: 25px"> &nbsp   &nbsp  &nbsp Login :  </td>-->
                               &nbsp&nbsp &nbsp&nbsp<input name="mail" type="text" size="100" id="mail" class="in1"/>  

                           </tr>
						  <br></br>
                           
						   </table>
                        <button type="submit" onclick="#" class="buttonconfir">Envoyer</button> 
                           <button type="reset" onclick="#" class="buttonconfir">Réinitialiser</button> 
                        </center>
                     </form>
                  </center>
               </div>
            </div>
         </section>
     </center>
      <!-- fin aside -->      
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
</div>
      <!-- début footer -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <form class="login-form"name="formLogin" method="post" action="/web/login/login.php">
                  <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel">Login</h4>
                  </div>
                  <div class="modal-body">
                     <table class="tableau">
                        <tr>
                           <td>
                              <p class="white">&nbspEmail </p>
                           </td>
                           <td>
                              <p class="white"> &nbspMot De Passe </p>
                           </td>
                        </tr>
                        <tr>
                           <td><input class="textbox" type="text" name="login" value="" class="in"></td>
                           <td><input  class="textbox" type="Password" name="pwd" value="" class="in"/></td>
                        </tr>
                        <tr>
                           <td> &nbsp <a href='#'>Inscription</a></td>
                           <td> &nbsp <a href="#"> Mot de passe oublie ?</a></td>
                        </tr>
                     </table>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" >Login</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
	  
	  
      <!-- Modal Login -->
      
 </body>
</html>
/*<php
	}
?>*/
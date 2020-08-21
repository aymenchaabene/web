<?php
session_start();
	
require_once('../includes/connection.php');
	
if(isset($_POST['submit'])){
    $errMsg = '';
    //username and password sent from Form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($username == '')
        $errMsg .= 'You must enter your Username<br>';
		
    if($password == '')
        $errMsg .= 'You must enter your Password<br>';
		
    if($errMsg == ''){
        $records = $db->prepare("SELECT user_id, username, password FROM users WHERE username=:username");
        $records->bindParam(':username', $username);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
//		if(count($results) > 0 && password_verify($password, $results['password'])){
        if(count($results) > 0 && (($password) == $results['password'])){
            $_SESSION['user_id'] = $results['user_id'];
            header('location:../index_blog.php');
            exit;
			} else {
                $errMsg .= 'Username and Password are not found<br>';
			}
    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Ben Ghorbel Meuble</title>
<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="../../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="../../js/validation.js"> </script>
<!-- Custom Theme files -->
<link href="../../css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<style>
#insc
{
margin-top:-3%;	

}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="../../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../../../js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="../../js/menu_jquery.js"></script>
<script src="../../js/simpleCart.min.js"> </script>
  
</head>
<body style="background-color:#f5f5f0;" >
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
					<li class="top_link"> <a  data-toggle="modal" data-target="#myModal"> Mon compte </a></li>|				
											
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
		 	<a href="../../index2.php"><img src="../../images/logo.png" alt=""/></a>			 
		 </div>
		 <div class="header_right">	
			<!-- <div class="login">
				 <a href="login.html">LOGIN</a>
			 </div>-->
					 
		 </div>
		  <div class="clearfix"></div>	
	 </div>
</div>
<!--cart-->
	 
<!------>
<?php require('../../menu_bar.php');?>
<!---->
<div class="container">
	  <ol class="breadcrumb">
		  <li><a href="index2.php">Home</a></li>
		  <li class="active">Forum</li>
		 </ol>
	 <div class="registration">
		 <div class="registration_left">
			 <h2> Forum Ben Ghorbel : <span> créez un compte</span></h2>
	
			 <script>
				(function() {
			
				// Create input element for testing
				var inputs = document.createElement('input');
				
				// Create the supports object
				var supports = {};
				
				supports.autofocus   = 'autofocus' in inputs;
				supports.required    = 'required' in inputs;
				supports.placeholder = 'placeholder' in inputs;
			
				// Fallback for autofocus attribute
				if(!supports.autofocus) {
					
				}
				
				// Fallback for required attribute
				if(!supports.required) {
					
				}
			
				// Fallback for placeholder attribute
				if(!supports.placeholder) {
					
				}
				
				// Change text inside send button on submit
				var send = document.getElementById('register-submit');
				if(send) {
					send.onclick = function () {
						this.innerHTML = '...Sending';
					}
				}
			
			 })();
			 </script>
			 
		
			 <div class="registration_form">
			 <!-- Form -->

<form method="POST" name="inc" id="insc"    onsubmit="return validation()" action="ajoutClient_forum.php" > 


   <table name="table1" rules="none" width="100%" >
                           </br>
						   
                           <tr>
                              <td> <label for="username" > Login</label> </td>
                              <td>  <input name="username" type="text"  title="A--Z/0-->9" size="45" maxlength="10"    required > </td>
                           </tr>
                           </br>
                           <tr>
                              <td><label for="password">Mot de passe</label>  </td>
                              <td> <input name="password" type="password" size="45" maxlength="11"   required  title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" type="mdp" >
                           </tr>
                
                           <tr>
                              <td> <label for="Email">E-mail</label></td>
                              <td> <input type="email" size="45" maxlength="65" name="email"   /> </td>
                           </tr>
                          
                         
                         
						  
											   
						</table>
						
	
		<div hidden>	<input  type="text" name="er" id="er"  /></div>
			 	  <center><div> 
				<input type="submit" value="S'inscrire" name="subm" id="register-submit"/>
		
	            </div></center>
	
			  
					</form>
				<!-- /Form -->
			 </div>
		 </div>
		 <div class="registration_left">
			 <h2>Se connecter</h2>
			 <div class="registration_form">
			 <!-- Form -->
			 
			 

			         <form  method="POST" action="insc_forum.php">
	
					<div>
						<label>
						  <td><input placeholder="login:" class="textbox" type="text" name="username" value="" class="in"></td>
                          
							
						</label>
					</div>
					<div>
						<label>
							 <td> &nbsp <input  class="textbox" type="Password" name="password" value="" class="in"/></td>
						</label>
					</div>						
					<div>
						<input type="submit" value="Connecter" name='submit' id="register-submit" >
					</div>
					
				</form>
			 <!-- /Form -->
			 </div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
	  
	  
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
<!---->

<div class="footer">
	 <div class="container">
		
		 <div class="copywrite">
			 <p>Copyright © 2016 Webcrafters </p>
		 </div>			 
		 </div>
	 </div>
</div>
	  <!-- Modal Login -->

</body>
</html>
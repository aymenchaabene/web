<?php 
session_start();
//include ('admin/crudcommande.php');
include_once("fonctions-panier.php");
if (creating_cart())
{
$nbArticles=count($_SESSION['panier']['id_produit']);
if ($nbArticles <= 0)
{
header("Location: products.php");	
}
}

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
    <script src="js/Prix_Livraison.js"> </script>
  <link href="css/Prix_Livraison.css" rel='stylesheet' type='text/css' />

  
<?php 
if (isset($_GET['click'])&& $_GET['click']=='true')
{
?>
  <script>
  	window.onload = function(){
    var button = document.getElementById('myBtn');
    button.click();
}



</script>
 <?php
} 
?>  

  
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
	function FillBilling(f) {
  if(f.checkbox1.checked == true) {
    f.Rue1.value = f.Rue.value;
    f.Ville1.value = f.Ville.value;
	f.Codepostal1.value = f.Codepostal.value;
	f.query1.value=f.query.value;
  }
}

  </script>
 <style>
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
    background-color: #FFFFFF;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style> 
</head>
<body style="background-color:#f5f5f0;" >
<!-- header -->
<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					<li><a href="#">Aide</a></li>|
					<li><a href="dead/comingsoon.php">Nous Contacter</a></li>|
					<li><a href="dead/comingsoon.php">Suivie de Commande</a></li>
				</ul>
			</div>
			<div class="top_left">
				<ul>
					<li class="top_link">Email: <a href="mailto@example.com">Meublebenghorbel@gmail.com</a></li>|
					<li class="top_link"><a href="comingsoon.php">Mon compte</a></li>|					
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
				 <a href="logout.php">Déconnexion</a>
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
			<li class="active grid">Check-out</li> </br> </br>
			 
			<li> <u> Note: Cette commande vous faire gagner <?php echo MontantPTSGlobal();?> point de fidélité </u></li>

		 </ol>			


		 <?php 
		 $ch=getContainer();
		 
		 
		 ?>

	 <div class="registration">
		 <div class="registration_left">
			 <h2>Adresse de Shipping </h2>

			 <div class="registration_form">
			 
			 <!-- Form -->	

				<form id="registration_form" action="admin/crudcommande.php?id=6" method="post">
					<div>
						<label>
							<input placeholder="Rue:" type="text" name="Rue" tabindex="1" required autofocus>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="Ville:" type="text" name="Ville" tabindex="2"  required autofocus>
						</label>
					</div>	
						<div class="controls">
								<select  required onchange='Prix_Livraison();'id='query' name='query'>
								<option value="Choisir Gouvernorat">Choisir Gouvernorat</option>
								<option>Ariana</option>
								<option>Ben Arous</option>
								<option>Beja</option>
								<option>Bizerte</option>
								<option>Gabes</option>
								<option>Gafsa</option>
								<option>Jendouba</option>
								<option>Kairaouane</option>
								<option>Kebili</option>
								<option>Kef</option>
								<option>Mahdia</option>
								<option>Manouba</option>
								<option>Mednine</option>
								<option>Monastir</option>
								<option>Nabeul</option>
								<option>Sfax</option>
								<option>Sidi Bouzid</option>
								<option>Sousse</option>
								<option>Siliana</option>
								<option>Tataouine</option>
								<option>Tozeur</option>
								<option>Tunis</option>
								<option>Zaghouan</option>
								</select>
					</div>					
					
					<div>
						<label>
							<input placeholder="Code Postal:" type="text"  id="Codepostal" name="Codepostal" tabindex="2" pattern="[0-9]{4}"required autofocus>
						</label>
					</div>	
					<div>
						<label>
							<input placeholder="Mobile:" type="text" id="mobile" name="mobile" pattern="[0-9]{8}" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="Email:" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" Title="Exemple mail: exemple_ex@gmail.com"
 required>
						</label>
					</div>
					<h2>Adresse de Billing </h2>
					<div class="sky-form">
					<label class="checkbox"><input type="checkbox" name="checkbox1" onclick="FillBilling(this.form)"><i></i> Utiliser la m&#234me adresse de Shipping</label>
					</div>
					<div>
						<label>
							<input placeholder="Rue:" type="text" name="Rue1" tabindex="1" required autofocus>
						</label>
					</div>
					
					<div>
						<label>
							<input placeholder="Ville:" type="text" name="Ville1" tabindex="2" required autofocus>
						</label>
					</div>	
					<!--
					<div>
						<label>
							<input placeholder="Etat:" type="text" name="Etat" tabindex="2" required autofocus>
						</label>
					</div>
-->
				<div class="controls">
								<select  required onchange='Prix_Livraison();'id='query1' name='query1'>
								<option value="Choisir Gouvernorat">Choisir Gouvernorat</option>
								<option>Ariana</option>
								<option>Ben Arous</option>
								<option>Beja</option>
								<option>Bizerte</option>
								<option>Gabes</option>
								<option>Gafsa</option>
								<option>Jendouba</option>
								<option>Kairaouane</option>
								<option>Kebili</option>
								<option>Kef</option>
								<option>Mahdia</option>
								<option>Manouba</option>
								<option>Mednine</option>
								<option>Monastir</option>
								<option>Nabeul</option>
								<option>Sfax</option>
								<option>Sidi Bouzid</option>
								<option>Sousse</option>
								<option>Siliana</option>
								<option>Tataouine</option>
								<option>Tozeur</option>
								<option>Tunis</option>
								<option>Zaghouan</option>
								</select>
					</div>			
										
					<div>
						<label>
							<input placeholder="Code Postal:" type="text" name="Codepostal1" tabindex="2" required autofocus>
						</label>
					</div>	

					
					</br>
				
					
				<!-- /Form -->
			 </div>
		 </div>
		 <div class="registration_left">
			 <h2>Payement</h2>
			 <div class="registration_form">
			 <!-- Form -->
					<div class="price-details">
						<h3>Prix d&#233taill&#233</h3>
						<span>Totale</span>
						<span class="total"><?php echo (Montantglobal(). " TND");?></span>
						<span>Remise</span>
						<span class="total">---</span>
						<span>Charges de livraison</span>
						
						<span class="total">   <label>
							<div id='result'></div>
						</label></span>
						<div class="clearfix"></div>				 
						</div>	
						<h4 class="last-price">TOTALE</h4>
						<span class="total final"><?php echo (Montantglobal(). " TND");?></span>
						<input type="hidden"  name="montant_commande" value="<?php echo (Montantglobal()); ?>" >
						<div class="clearfix"></div>
						<input type="submit" name="buttonfade" value="Passer votre Commande" id="myBtn">
						
						<!--<a class="order" href="check-out.php">Confirmer votre Order</a>-->
						
					<div class="sky-form">
					<label class="checkbox"><input type="checkbox" name="checkbox" required><i></i>J'accepte <a class="terms" href="#">les termes et les conditions</a> du service offert par Meuble Ben Ghorbel</label>
					</div>	
			 <!-- /Form -->
			 </div>
			</form>

		 </div>
		 
		 


		 <div class="clearfix"></div>
		 
	 </div>
			 

<?php
if (isset($_GET['click'])&& $_GET['click']=='true')
{
?>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <a href="products.php"> <span class="close">×</span></a>
			<h3>Votre Commande est bien pass&#233e, voulez vous payer maintenant ou 
		ult&#233rieurement? </h3>
		
<style>
#bouttons {
    background: none repeat scroll 0 0 #FFFFFF;
    border-color: #FFFFFF #FFFFFF #FFFFFF #FFFFFF;
    border-radius: 10px 10px 10px 10px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 1px 1px 3px #FFFFFF;
    color: #003300;
    cursor: pointer;
    font-weight: bold;
    padding: 5px;
    text-align: center;
    text-shadow: 1px 1px 1px #000000;
}
input.green { font-size:1.1em; padding:24px 26px; display:inline-block; margin:5px; border-radius:6px; border:solid rgba(0,0,0,0.2); border-width:1px 1px 5px; box-shadow:0 5px 0 rgba(0,0,0,0.1), inset 0 0 3px rgba(255,255,255,0.3); cursor:pointer; user-select:none; transition:0.4s ease; }

input:hover { transform:translateY(-3px); box-shadow:0 6px 0 rgba(0,0,0,0.1), inset 0 0 1px rgba(255,255,255,0.4); border-bottom-width:8px; }

input:active { transform:translateY(4px); box-shadow:0 2px 0 rgba(0,0,0,0.1), inset 0 0 5px rgba(255,255,255,0.4); border-bottom-width:2px; transition:0.1s ease; }

.orange { background:hsl(41,76%,65%); }
.yellow { background:hsl(50,81%,65%); }
input.green { color: white; background:hsl(181,96%,20%); }
.blue { background:hsl(176,59%,59%); }

a.green { font-size:1.1em; padding:24px 26px; display:inline-block; margin:5px; border-radius:6px; border:solid rgba(0,0,0,0.2); border-width:1px 1px 5px; box-shadow:0 5px 0 rgba(0,0,0,0.1), inset 0 0 3px rgba(255,255,255,0.3); cursor:pointer; user-select:none; transition:0.4s ease; }

a:hover { transform:translateY(-3px); box-shadow:0 6px 0 rgba(0,0,0,0.1), inset 0 0 1px rgba(255,255,255,0.4); border-bottom-width:8px; }

a:active { transform:translateY(4px); box-shadow:0 2px 0 rgba(0,0,0,0.1), inset 0 0 5px rgba(255,255,255,0.4); border-bottom-width:2px; transition:0.1s ease; }

.red { background:hsl(8,59%,59%); color:rgba(255,255,255,0.95); text-shadow:-1px -1px 1px rgba(0,0,0,0.1); }
.orange { background:hsl(41,76%,65%); }
.yellow { background:hsl(50,81%,65%); }
.green { background:hsl(104,51%,62%); }
.blue { background:hsl(176,59%,59%); }
</style>

<?php 
if (isset($_GET['id_c']))			   
$id_ligne=$_GET['id_c'];	   

?>

 	<form class="paypal" action="payement/payments.php" method="post" id="paypal_form">
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="no_note" value="1" />
		<input type="hidden" name="id_commande" value="<?php echo $id_ligne ?>" />
		<input type="hidden" name="lc" value="UK" />
		<input type="hidden" name="currency_code" value="EUR" />
		<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
		<input type="hidden" name="first_name" value="Customer's First Name"  />
		<input type="hidden" name="last_name" value="Customer's Last Name"  />
		<input  type="hidden" name="payer_email" value="d.oussamabenghorbel@gmail.com"  />
		<input type="hidden" name="item_number" value="" / >
		<div id="bouttons">
		<input align="right" type="submit" class="green" name="submit" value="Payer maintenant"/> </br>
		</form>
		</br>
		<input align="right"  class="green" value="Payer ult&#233rieurement" onClick="location.href='products.php?id=20';"/> </br>		
		<!--<a href="products.php?id=20" class="green" > Payer ult&#233rieurement </a>  -->
		</br>
		</br>
		<?php
			if (!(isset($_GET['click'])&& $_GET['click']=='true'))
			{

		?>
				 <img align="middle"  src="images/loading.gif" height=100 width=100/>
			<?php } ?>
		</div>

 </div>

</div>
<?php } ?>
<script>
// Get the modal
var modal = document.getElementById('myModal');




// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

$('#myModal').modal(
	{
		backdrop: 'static', keyboard: false
	}
	
	)  

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
			 
</script>	 
</div>
		 
			 
			 
</div>
</div>		 
<?php
session_start();
include ('fonctions-panier.php');


if(!(isset($_SESSION['login']) && isset($_SESSION['mdp'])  ))
	{
		header('Location: account.php');
	}
else
{
	 $esem= $_SESSION['login']	;	
	 $mdp= $_SESSION['mdp']	;
}
include ('admin/crud_rating.php');

$login= $_SESSION['login']	;	
$password= $_SESSION['mdp']	;
$cc=new crudrating(); 
$liste0=$cc->cinfromlogin($login,$password,$cc->conn);
	
foreach($liste0 as $l)
{
$cin=$l["cin"];

}	
	$liste=$cc->getproductid($cin,$cc->conn) ;

?>
<!DOCTYPE HTML>
<html>
<head>
<?php include ('interface.php');?>
<!--cart-->
	 
<!------>
	  <center>

							 
                     <h3 class="h3" style="font-size: 45px ;color:#026466" > <strong > Bienvenue à votre  Espace Client </strong></h3>
					 
                 
				 </center> 
				<br></br>
<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue"> 
					<li class="grid"><a class="color1" href="index.php">Acceuil</a></li>

		
			 <li class="grid"><a class="color1" href="gestionprofile.php">Mon profil</a></li>
			 <li class="grid"><a class="color2" href="espaceclientcommande.php">Mes commandes</a> </li>
			<li class="grid"><a class="color4" href="propositions.php">Propositions</a></li>			
			
				<li class="grid"><a class="color6" href="offres.php">Offres</a></li>
					<li class="active grid"><a class="color6" href="affichage_produit_client.php">Evaluations</a></li>
					<li><a class="color6" href="ajout_message.php">Messages</a></li>
								<li class="grid"><a class="color6" href="entretien(2).php">Entretiens</a>
					<div class="megapanel">
					<div class="row">
						<div class="col1">
							
								<a href="choisir_entretien.php">Choisir un entretien</a>						
						</div>
							<div class="col1">
							
								<a href="modif_entretien2.php">Modifier un entretien</a>						
						</div>
						
						
					
					
					</div>
					
					
					</div>
					
					</li>
		
							
			   </ul> 
			
			 <div class="clearfix"></div>
		 </div>
	  </div>
</div>
<!---->
<div class="contact">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.html">Home</a></li>
		  <li class="active">Contact</li>
		 </ol>
 <table>
						  <thead>
							  <tr>
								  
								  
							  </tr>
						  </thead> 
 <tbody>
							<?php foreach($liste as $l){ 
							$liste2=$cc->afficher_produit($l['id_produit'],$cc->conn);
							
							foreach ($liste2 as $l2)
							{ ?> 
								<div class="cart-header">
				 
					
				 <div class="cart-sec">
						<div class="cart-item cyc">
							 <img src="<?php echo "uploads/".$l2['img_url'];?>"/>
						</div>
					   <div class="cart-item-info">
							 <h3><?php echo $l2['nom_produit']; ?><span><?php echo $l2['desc_produit']; ?></span></h3>
							 <h4><span>Prix: </span><?php echo $l2['prix_produit']; ?> Dt</h4>
							  
					
							 <form  class="sky-form" method="POST" action="ajouter_rating.php">
							 <input type="text" hidden name="id_produit" value="<?php echo $l2['id_produit']; ?>">
							 <input type="text" hidden name='cin_client' value="<?PHP echo $l['cin_client'];  ?>" readonly>
							 
						     <fieldset>
								<input type="text" id="<?php echo $l2['id_produit']; ?>" hidden name="rate" >
								 
 
							   <?php $liste3=$cc->getproductnote($l2['id_produit'],$cc->conn);
							  foreach($liste3 as $l3){ 
                              $note_t=$l3["0"];						  
							  ?>
							   <div class="ratebox" data-id="<?php echo $l2['id_produit']; ?>" data-rating="<?PHP echo $note_t ;  ?>"></div>
						    </fieldset>
							 <button type="submit" class="btn btn-default">rate</button>
					  </form>
							 
					   </div>
					   <div class="clearfix"></div>
						<div class="delivery">
							 <p><?php echo "Points fidélité obtenues par ce produit:".$l2['ptsfid_produit']; ?></p>							 
				        </div>						
				  </div>
				  
			 </div>

								
							<?php } } } ?>
														
														

						  </tbody>
					  </table>        						  
		 <div class="address">
			 <h3>Our Locations</h3>
			 <div class="locations">				 
				  <ul>
					 <li><span></span></li>					 					
					 <li>
						 <div class="address-info">	
							 <h4>New York, Washington</h4>
							 <p>10-765 MD-Road</p>
							 <p>Washington, DC, United States,</p>
							 <p>Phone: 123 456 7890</p>
							 <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
							 <h5><a href="">Visit on Google Maps >></a></h5>	
						 </div>
					 </li>				
				  </ul>	
				  <ul>
					 <li><span></span></li>					 					
					 <li>
						 <div class="address-info">	
							 <h4>London, UK</h4>
							 <p>10-765 MD-Road</p>
							 <p>Lorem ipsum, domon sit, UK,</p>
							 <p>Phone: 123 456 7890</p>
							 <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
							 <h5><a href="">Visit on Google Maps >></a></h5>	
						 </div>
					 </li>				
				  </ul>		
			 </div>			 
		 </div>
		 <div class="contact-map">
				 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1578265.0941403757!2d-98.9828708842255!3d39.41170802696131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1407515822047"> </iframe>
	     </div>
	 </div>
</div>
<!---->
<?php include ('footer.php');?>
</div>
<!---->
</body>
</html>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="done")
	echo "<script>alert('votre rating à été ajouter avec succées')</script>";?>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="no")
	echo "<script>alert('vous avez deja donner une note à ce produit')</script>";?>
!-- We need jquery and raterater.jquery.js -->
<script src="https://code.jquery.com/jquery-1.4.1.min.js"></script>
<script src="js/raterater.jquery.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="css/raterater.css" rel="stylesheet"/>

<script>

/* This is out callback function for when a rating is submitted
 */
function rateAlert(id, rating)
{
    alert( 'votre note pour : '+id+' est: '+rating+' /5' );
	document.getElementById(id).value=rating;
}

/* Here we initialize raterater on our rating boxes
 */
$(function() {
    $( '.ratebox' ).raterater( { 
        submitFunction: 'rateAlert', 
        allowChange: true,
        starWidth: 30,
        spaceWidth: 5,
        numStars: 5
    } );
});

</script>
</body>
</html>

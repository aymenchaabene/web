<?php 
include('fonctions-panier.php');
session_start(); 
include('admin/crudcategorie.php');

	$crudCat= new crudcategorie(); 
	$categories=$crudCat->Afficher_categorie($crudCat->conn);

?>
<!DOCTYPE HTML>
<html>
<head>
<?php include ('interface.php');?>
	 
<!------>
<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue">
			 <li class="grid"><a class="color1" href="index.php">Acceuil</a></li>
			 <li class="grid"><a class="color2" href="products.php">Produits</a>
				<div class="megapanel">
					<div class="row">
					<?php foreach ($categories as $cat){ ?>
						<div class="col1">
							
								<a href="products.php?cat=<?php echo $cat['id_categorie'] ; ?>"><h4><?php echo $cat['nom_categorie']; ?></h4></a>						
						</div>
						
					<?php } ?>
						
						
					</div>
					
    				</div>
				</li>
			<li class="grid"><a class="color4" href="account.php">Mon compte</a>
				<div class="megapanel">
				
					<div class="row">
					<?php if(isset($_SESSION['login'])){?>
						<div class="col2">Espace client</div>
						<div class="col1">Déconnexion</div>
						<?php ;} else  {?>
						
						<div class="col2">Connexion</div>
						<div class="col1">Inscription</div>
						<?php ;}?>
						
					</div>
				
					
				
    				</div>
				</li>				
				<li class="active grid"><a class="color5" href="#">a propos de nous</a>
				
				</li>
				
			
				<li><a class="color7" href="contact.php">Nous contacter</a>
				
				</li>				
			
			   </ul> 
			   <div class="search">
				
					
<input autocomplete='off' onKeyUp='search()' id='query' name='query' type='text' placeholder="Rechercher..."/>  			
<div id='result'></div>  	
				<input type="submit" value="">
			 </div>
					
				
			 <div class="clearfix"></div>
		 </div>
	  </div>
</div>

<div class="container">
<fieldset>
<h3>
</br></br>
Ste Ben Ghorbel est une soci&#xE9t&#xE9 fond&#xE9 en 1980 par Fathi Ben Ghorbel. </br></br>Disposant d'une grande experience, notre soci&#xE9t&#xE9 fournit ses clients avec une chaine de produit de haute qualit&#xE9 expos&#xE9 sur ce site et nos boutiques. </br></br>
Pour b&#xE9nificier nos clients d'une exp&#xE9rience speciale et unique on a developp&#xE9 ce site pour faciliter l'achat de nos produits.</br></br></br>
Bonne visite! 
</h3>
</fieldset>


<div class="contact">
	 <div class="container">
		
 <div class="address">
			<strong style="font-size: 45px "> <h3>Notre location</h3></strong>
			 <div class="locations">				 
				<center>
				  <ul>
					 <li><span></span></li>					 					
					 <li>
						 <div class="address-info">	
							<strong style="font-size: 25px "> <h4>Hamem Lif,tunis,Tunisie</h4></strong>
							 <p>1008 </p></strong>
							 <p></p>
							<strong style="font-size: 25px "> <p>T&#xE9l&#xE9phone: 71 530 411 </p></strong>
							<strong style="font-size: 25px "> <p>Fax: 71 030 411 </p></strong>
							<strong style="font-size: 25px "> <p>Email: <a href="">BenGhorbel_Meuble@gmail.com</a></p></strong>
							 <!--<h5><a href="">Visit on Google Maps >></a></h5>	-->
						 </div>
					 </li>				
				  </ul>	</center>	
			 </div>			 
		 </div>
		 <div class="contact-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5377.643932016188!2d10.311823751321018!3d36.73297805066199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd490f902d3241%3A0x2a0b694b1466a34e!2sShowroom+Alpha+Cuisine+(+Ste+Ben+Ghorbal+)!5e0!3m2!1sen!2stn!4v1461194517064" width="800" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
	     </div><br></br>
 </div>
</div>
</div>

<?php
		include('footer.php');
?>
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
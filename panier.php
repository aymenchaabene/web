<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php

session_start();
include_once("fonctions-panier.php");


$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
	

   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $id = (isset($_POST['id'])? $_POST['id']:  (isset($_GET['id'])? $_GET['id']:null )) ;
   echo "id:".$id;
   
   $prix = (isset($_POST['prix'])? $_POST['prix']:  (isset($_GET['prix'])? $_GET['prix']:null )) ;
   $qte = (isset($_POST['qte'])? $_POST['qte']:  (isset($_GET['qte'])? $_GET['qte']:null )) ;
   $nom=(isset($_POST['nom'])? $_POST['nom']:  (isset($_GET['nom'])? $_GET['nom']:null )) ;
   $desc=(isset($_POST['desc'])? $_POST['desc']:  (isset($_GET['desc'])? $_GET['desc']:null )) ;
   $img=(isset($_POST['img'])? $_POST['img']:  (isset($_GET['img'])? $_GET['img']:null )) ;
   //ptsfid
   $ptsfid=(isset($_POST['ptsfid'])? $_POST['ptsfid']:  (isset($_GET['ptsfid'])? $_GET['ptsfid']:null )) ;

   //Suppression des espaces verticaux

   $id = preg_replace('#\v#', '',$id);
   //On verifie que $p soit un float
   $prix= floatval($prix);

   echo $qte;
   /*
   //On traite $q qui peut etre un entier simple ou un tableau d'entier
    
   if (is_array($qte))
   {
      $QteArticle = array();
      $i=0;
      foreach ($qte as $contenu)
	  {
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $qte = intval($qte);
    */
	
}

if (!$erreur){
   switch($action){
      Case "ajout":
		
			
         ajouterArticle($id,$nom,$prix,$qte,$desc,$img,$ptsfid);
		 
         break;

      Case "suppression":
         supprimerArticle($id);
         break;

      Case "refresh" :
            modifierQTeArticle($id,$qte);
         break;

      Default:
         break;
   }
}


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
			 <li class="active grid"><a class="color2" href="products.php">Produits</a>
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
				<li><a class="color5" href="#">a propos de nous</a>
				
				</li>
				
			
				<li class="grid"><a class="color7" href="contact.php">Nous contacter</a>
				
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
<!---->
<div class="cart_main">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="products.php">Boutique</a></li>
		  <li class="active grid" >Panier</li>
		 </ol>			
		 <div class="cart-items">
			 <h2>Mon Panier</h2>
				<!--<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>-->
			   <?php

				if (creating_cart())
				{
				   $nbArticles=count($_SESSION['panier']['id_produit']);
				   if ($nbArticles <= 0)
				   {
					echo "<tr><td>Votre panier est vide </td></tr>";
					echo "</br></br><tr><td>Pour passer à la caisse vous devez au moins ajouter un produit à votre panier</td></tr>";
				?>
						</br></br><a href="products.php" class="item_add items" >Retour à la boutique</a>
						</br></br></br></br></br></br>

				<?php
				   }
				   else
				   {
					  for ($i=0 ;$i < $nbArticles ; $i++)
					  {
						  
						  


				?>
			
			 <div class="cart-header">
				 <a href="<?php echo htmlspecialchars("panier.php?action=suppression&id=".rawurlencode($_SESSION['panier']['id_produit'][$i])) ?>" class="close1"></a>
					
				 <div class="cart-sec">
						<div class="cart-item cyc">
							 <img src="<?php echo "uploads/".$_SESSION['panier']['img_produit'][$i];?>"/>
						</div>
					   <div class="cart-item-info">
							 <h3><?php echo $_SESSION['panier']['nom_produit'][$i]; ?><span><?php echo $_SESSION['panier']['desc_produit'][$i]; ?></span></h3>
							 <h4><span>Prix: </span><?php echo $_SESSION['panier']['prix_produit'][$i]; ?> Dt</h4>
							 <p class="qty">Quantité: <?php echo $_SESSION['panier']['qte_produit'][$i]; ?> </p>
							 
							 <form method="POST" action="panier.php?action=refresh" >
							 <input min="1" type="number" name="qte" value="<?php echo $_SESSION['panier']['qte_produit'][$i]; ?>" class="form-control input-small">
							 <input min="1" type="hidden" name="id" value="<?php echo $_SESSION['panier']['id_produit'][$i]; ?>" class="form-control input-small">

							 <button class="item_add items" type="submit">Mettre à jour</button>

							 </form>
							 
					   </div>
					   <div class="clearfix"></div>
						<div class="delivery">
							 <p><?php echo "Points fidélité obtenues par ce produit:".($_SESSION['panier']['ptsfid_produit'][$i]*$_SESSION['panier']['qte_produit'][$i]); ?></p>							 
				        </div>						
				  </div>
				  
			 </div>
			 <?php 
			    }
				?>
						 <div class="cart-total">
			 <div class="price-details">
				 <h3>Prix d&#233taill&#233</h3>
				 <span>Totale</span>
				 <span class="total"><?php echo (Montantglobal(). " TND");?></span>
				 <span>Remise</span>
				 <span class="total">---</span>
				 <span>Charges de livraison</span>
				 <span class="total">---</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <h4 class="last-price">TOTALE</h4>
			 <span class="total final"><?php echo (Montantglobal(). " TND");?></span>
			 <div class="clearfix"></div>
			 <a class="order" href="check-out.php">Passer à la caisse</a>
			</div>
			<?php
				}
				}
			   
			   ?>		
		 </div>
		 
	 </div>
</div>
<!---->
<?php include ('footer.php'); ?>

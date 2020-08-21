<?php

session_start();
include('fonctions-panier.php'); 
include('admin/crudproduit.php'); 
$crud=new crudproduit();
$random6=$crud->random_6_produits($crud->conn);
$bestsales=$crud->bestsales($crud->conn);
$promoscroll=$crud->promoscroll($crud->conn);



 ?>
<!DOCTYPE HTML>
<html>
<head>
<?php include ('interface.php') ?>
<!--cart-->
	 
<!------>
<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue">
			 <li class="active grid"><a class="color1" href="index.php">Acceuil</a></li>
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
				<li><a class="color5" href="aproposdenous.php">a propos de nous</a>
				
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
<!---->

<!---->

<!---->
<div class="new">
	 <div class="container">
		 <h3>Découvrez Nos produits</h3>
		 <div class="new-products">
		 <div class="new-items">
			 <div class="item1">
				 <a href="singleproduct.php?id=<?php echo $random6[0]['id_produit'] ; ?>"><img src="uploads/<?php echo $random6[0]['img_url'] ; ?>" alt=""/></a>
				 <div class="item-info">
					 <h4><a href="singleproduct.php?id=<?php echo $random6[0]['id_produit'] ; ?>"><?php echo $random6[0]['nom_produit'] ; ?></a></h4>
					 
					 
				 </div>
			 </div>
			 <div class="item4">
				 <a href="singleproduct.php?id=<?php echo $random6[1]['id_produit'] ; ?>"><img src="uploads/<?php echo $random6[1]['img_url'] ; ?>" alt=""/></a>
				  <div class="item-info4">
					 <h4><a href="singleproduct.php?id=<?php echo $random6[1]['id_produit'] ; ?>"><?php echo $random6[1]['nom_produit'] ; ?></a></h4>
					 
					  
				 </div>			 
			 </div>
		 </div>
		 <div class="new-items new_middle">
			 <div class="item2">			 
				 <div class="item-info2">
					 <h4><a href="singleproduct.php?id=<?php echo $random6[2]['id_produit'] ; ?>"><?php echo $random6[2]['nom_produit'] ; ?></a></h4>
					
					
				 </div>
				 <a href="singleproduct.php?id=<?php echo $random6[2]['id_produit'] ; ?>"><img src="uploads/<?php echo $random6[2]['img_url'] ; ?>" alt=""/></a>
			 </div>
			 <div class="item5">	
				 <a href="singleproduct.php?id=<?php echo $random6[3]['id_produit'] ; ?>"><img src="uploads/<?php echo $random6[3]['img_url'] ; ?>" alt=""/></a>
				 <div class="item-info5">
					 <h4><a href="singleproduct.php?id=<?php echo $random6[3]['id_produit'] ; ?>"><?php echo $random6[3]['nom_produit'] ; ?></a></h4>
					 
					 
				 </div>	
			 </div>
		 </div>		  
		 <div class="new-items new_last">
			 <div class="item3">	
				 <a href="singleproduct.php?id=<?php echo $random6[4]['id_produit'] ; ?>"><img src="uploads/<?php echo $random6[4]['img_url'] ; ?>" alt=""/></a>
				 <div class="item-info3">
					 <h4><a href="singleproduct.php?id=<?php echo $random6[4]['id_produit'] ; ?>"><?php echo $random6[4]['nom_produit'] ; ?></a></h4>
					
					  
				 </div>			 
			 </div>
			 <div class="item6">	
				 <a href="singleproduct.php?id=<?php echo $random6[5]['id_produit'] ; ?>"><img src="uploads/<?php echo $random6[5]['img_url'] ; ?>" alt=""/></a>
				 <div class="item-info6">
					 <h4><a href="singleproduct.php?id=<?php echo $random6[5]['id_produit'] ; ?>"><?php echo $random6[5]['nom_produit'] ; ?></a></h4>
					
					  
				 </div>
				 				 
			 </div>
		 </div>
		 <div class="clearfix"></div>	
		 </div>
	 </div>		 
</div>
<!---->
<div class="top-sellers">
	 <div class="container">
		 <h3>Meuilleurs Ventes</h3>
		 <div class="seller-grids">
		 <?php foreach ($bestsales as $bs ) { ?>
			 <div class="col-md-3 seller-grid">
				 <a href="singleproduct.php?id=<?php echo $bs['id_produit'] ?>"><img class="img-responsive" src="uploads/<?php echo $bs['img_url'] ?>" alt=""/></a>
				 <h4><a href="singleproduct.php?id=<?php echo $bs['id_produit'] ?>"><?php echo $bs['nom_produit'] ?></a></h4>
				
				 <p>TND <?php echo $bs['prix_produit'] ; ?></p>
			 </div>
		 <?php } ?>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="recommendation">
	 <div class="container">
		 <div class="recmnd-head">
			 <h3>En Promotion </h3>
		 </div>
		 <div class="bikes-grids">			 
			 <ul id="flexiselDemo1">
			 <?php foreach ($promoscroll as $promo)
			 { ?>
				 <li>
					 <a href="products.html"><img src="uploads/<?php echo $promo['img_url'] ;?>" alt=""/></a>	
					 <h4><a href="singleproduct.php?id=<?php echo $promo['id_produit'] ;?>"><?php echo $promo['nom_produit'] ;?></a></h4>	
					 <p><?php echo "-".$promo['Pourcentage_promotion']."%" ;?></p>
				 </li>
			 <?php } ?>
		    </ul>
			<script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
	 </div>
	 </div>
</div>
<!---->
<?php include ('footer.php') ?>
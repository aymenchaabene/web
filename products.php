<!DOCTYPE HTML>
<?php 
include('admin/crudproduit.php');
include('admin/crudcategorie.php');
include('fonctions-panier.php');
$crud=new crudproduit();
    $liste=$crud->Afficher_Produit($crud->conn);
	$crudCat= new crudcategorie(); 
	$categories=$crudCat->Afficher_categorie($crud->conn);
	if (isset($_GET['cat']))
		$liste=$crudCat->Afficher_products_categorie($crud->conn,$_GET['cat']) ; 
    
if (isset($_GET['id'])&& $_GET['id']==20)
{
		
	session_start();	
	supprimePanier();
	if (!isset($_SESSION['panier']))
	{
	echo "There is none";
	header("Location:products.php");
	die();	

	}
	
}
else
{
	session_start();	
}
	
?>
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
			 <li class="active grid"><a class="color2" href="#">Produits</a>
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
<!--header//-->
<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.html">Acceuil</a></li>
		  <li class="active">Products</li>
		 </ol>
			<h2>OUR PRODUCTS</h2>			
		 <div class="col-md-9 product-model-sec">
		 <?php 
		 foreach ($liste as $l)
		 {if ($l['Status']=='Active')
			 {
		
		 ?>
					 <a href="singleproduct.php?id=<?php echo $l['id_produit'] ;?>"><div class="product-grid love-grid">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go thickbox"  >
							<img src="<?php echo "uploads/".$l['img_url'] ; ?>"  class="img-responsive" alt="<?php echo $l['desc_produit'] ; ?>"> 
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</button>
							</h4>
							</div>
							<?php if( $l['id_promotion']!=1)
							{ ?>
							<div class="b-promo">
													
							<img  src="Promotions/<?php echo $l['Pourcentage_promotion'];?>.png" style="width:52px; height:52px; top:0px;right:0px;" />
							
							</div>
			 <?php } ?>
						</div></a>						
							<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
								<h4><?php echo $l['nom_produit'] ?></h4>
								
								<span class="item_price"><?php echo $l['prix_produit']." TND" ?></span>		
							<form method="POST" action="<?php echo "panier.php?action=ajout&id=".$l['id_produit']."&nom=".$l['nom_produit']."&prix=".$l['prix_produit']."&desc=".$l['desc_produit']."&img=".$l['img_url']."&ptsfid=".$l['ptsfid_produit']?>">
								<input type="number" class="item_quantity" value="1" name="qte" min="1" />

							<?php if((isset($_SESSION['login']))) {?>
								<button class="item_add items" type="submit">Ajouter au panier</button>
							<?php } ?>
							<p class="delivery"> <?php echo "Points fidélité:".$l['ptsfid_produit']; ?></p>

							</form>
							</div>													
							<div class="clearfix"> </div>

						</div>
					</div>	
		 <?php } }?>
					 
			</div>
			<div class="rsidebar span_1_of_left">
			<section  class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
						  <?php foreach($categories as $cat){?>
						  <a href="products.php?cat=<?php echo $cat['id_categorie'] ;?>">
						 <div class="tab1">
							 <ul  class="place">			
							 
								 <li  class="sort"><?php echo $cat['nom_categorie']; ?></li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 
					      </div>	
</a>						  
						  <?php } ?>
						  
						  <!--script-->
						<script>
							$(document).ready(function(){
								$(".tab1 .single-bottom").hide();
								$(".tab2 .single-bottom").hide();
								$(".tab3 .single-bottom").hide();
								$(".tab4 .single-bottom").hide();
								$(".tab5 .single-bottom").hide();
								
								$(".tab1 ul").click(function(){
									$(".tab1 .single-bottom").slideToggle(300);
									$(".tab2 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 .single-bottom").slideToggle(300);
									$(".tab1 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 .single-bottom").slideToggle(300);
									$(".tab5 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
								$(".tab5 ul").click(function(){
									$(".tab5 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
							});
						</script>
						<!-- script -->					 
				 </section>
		
				   <!---->
					 <script type="text/javascript" src="js/jquery-ui.min.js"></script>
					 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
					<script type='text/javascript'>//<![CDATA[ 
					$(window).load(function(){
					 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 400000,
								values: [ 8500, 350000 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

					});//]]> 
					</script>
					 <!---->
				
				   		
			 </div>				 
	      </div>
		</div>
</div>	
<?php include ('footer.php');?>
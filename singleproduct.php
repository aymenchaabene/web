<?php 
include('admin/crudproduit.php');
include('admin/crudcategorie.php');
include('fonctions-panier.php');
require_once('admin/crudcommentaires.php');



    $crud=new crudproduit();
	$crudcomm=new crudcommentaires();
	$id=0;
	if (!isset($_GET['id']))
		header('location:index.php'); 
		
	if (isset($_GET['id'])){
		$id=$_GET['id'] ; 
    $liste=$crud->Afficher_1_Produit($crud->conn,$id);
	$catid=$liste[0]['id_categorie'];

	}
	$crudCat= new crudcategorie(); 
	$categories=$crudCat->Afficher_categorie($crud->conn);
	$commentaire=$crudcomm->Afficher_products_commentaire($crud->conn,$id);
	$similar=$crudCat->similar_products($crud->conn,$catid);
	
	?>

<!DOCTYPE HTML>
<html>
<head>
<title><?php foreach($liste as $nom ) { echo $nom['nom_produit'] ; } ?> </title>
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
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<!--etalage-->
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
		
<!-- //etalage-->

<!-- search-->
<script language="javascript" type="text/javascript" src="js/search.js"> </script>
<link href="css/search.css" rel="stylesheet" type='text/css'/>
<!--//search-->

  
</head>
<body style="background-color:#f5f5f0;" >
<!-- header -->
<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					<li><a href="ajout_reclamation.php">Réclamations</a></li>|
					<li><a href="contact.php">Nous Contacter</a></li>|
					<li><a href="<?php if(!(isset($_SESSION['login']))) echo "espaceclient.php"; else echo "account.php" ;?>">Suivie de Commande</a></li>|
					<li><a href="blog/insc_forum.php">Forum</a></li>
				</ul>
			</div>
			<div class="top_left">
				<ul>
					<li class="top_link">Email: <a href="mailto@example.com">Meublebenghorbel@gmail.com</a></li>|
					<li class="top_link"> <a href="<?php if(isset($_SESSION['login'])) echo "espaceclient.php"; else echo "account.php" ;?>" > Mon compte </a></li>|					
				</ul>
				<div class="social">
					<ul>
						<li><a href="https://www.facebook.com/MeublesBENGhorbal21/?fref=ts"><i class="facebook"></i></a></li>
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
				 <a href="logout.php">D&#233connexion</a>
			 </div>
			 <div class="cart box_1">
				<a href="panier.php">
					<h3> <span><?php echo (Montantglobal()." TND") ;?> </span> (<?php  echo (compterArticles()." "); ?>articles)<img src="images/bag.png" alt=""></h3>
				</a>	
				<!--<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>-->
				
			 </div>				 
		 </div>
		  <div class="clearfix"></div>	
	 </div>
</div>
<!--cart-->
	 
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
<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="index.html">Home</a></li>
			 <li class="active">Products</li>
		 </ol>
		 <!-- start content -->	
			<div class="col-md-9 det">
				  <div class="single_left">
					 <div class="grid images_3_of_2">
						 <ul id="etalage">
							<li>
							<?php foreach ($liste as $l) {?>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="<?php echo "uploads/".$l['img_url'] ; ?>" class="img-responsive" style="weight:300px;height:350px;" />
									<img class="etalage_source_image" src="<?php echo "uploads/".$l['img_url'] ; ?>" class="img-responsive" title="" />
								</a>
							</li>
											
						    
						 </ul>
						 <div class="clearfix"></div>		
						 
				      </div>
				  </div>
				  
				  <div class="single-right">
					 <h3> <?php echo $l['nom_produit'] ; ?></h3>
					 
					 
					  <div class="cost">
						 <div class="prdt-cost">
							 <ul>
								 						 
								 <li>Sellling Price:</li>
								 <li class="active"><?php if ($l['id_promotion']==1) echo $l['prix_produit']."TND" ; 
															else {
															echo  $l['prix_produit']."TND" ;
															?>
															</li>
															<li><del> <?php  echo $l['prix_produit']*100/(100-$l['Pourcentage_promotion'])."TND" ;  ?> </del>
															<?php }?></li>
								<form method="POST" action="<?php echo "panier.php?action=ajout&id=".$l['id_produit']."&nom=".$l['nom_produit']."&prix=".$l['prix_produit']."&desc=".$l['desc_produit']."&img=".$l['img_url']."&ptsfid=".$l['ptsfid_produit']?>">
								<input type="number" class="item_quantity" value="1" name="qte" min="1" />

							<?php if((isset($_SESSION['login']))) {?>

								<button class="item_add items" type="submit">Ajouter au panier</button>
							<?php }	?>
							<p class="delivery"> <?php echo "Points fidélité:".$l['ptsfid_produit']; ?></p>

							</form>
							 </ul>
						 </div>
						 <div class="check">
							 <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Enter pin code for delivery & availability</p>
							 <form class="navbar-form navbar-left" role="search">
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="Enter Pin code">
								  </div>
								  <button type="submit" class="btn btn-default">Verify</button>
							 </form>
						 </div>
						 <div class="clearfix"></div>
					  </div>
					 
					  <div class="single-bottom1">
						<h6>Description</h6>
						<p class="prod-desc"><?php echo $l['desc_produit'] ; ?></p>
					 </div>					 
				  </div>
				  <?php  } ?>
				  <div class="clearfix"></div>
				  <div class="col-md-6 log" >
				  <ul class="list-group " style="list-style-type: none;">
				  <?php foreach($commentaire as $com) { ?>
						<li class="list-group-item"><div class="" style="positon:relative;margin: 0;padding: 0;border: 0;outline: 0;font-weight: inherit;font-style: inherit;font-size: 100%;font-family: inherit;vertical-align: baseline;">
				<ul class="list-inline"> <?php echo $com['contenu'];  ?>
	<?php if(isset($_SESSION['admin_login']) || (isset($_SESSION['login'])&&($_SESSION['cin']==$com['id_client'] ))) {?>  <a style="color:white;" href="admin/crudcommentaires.php?id=3&id_commentaire=<?php echo $com['id'];?>&id_produit=<?php echo $id?>" > <span  class="label label-success"> supprimer </span> </a>   <?php }  ?>
				 </li> </div>
				 <?php } ?>
				   </ul>
	
			
				    <?php if(isset($_SESSION['login']) ){ ?>
				  <div class="col-md-12 log">
				  <form method="POST" action="admin/crudcommentaires.php?id=1">
				  <input type="number" hidden name="id_produit" value="<?php echo $id?>" />
							<div class="form-group">
						  <label for="comment">Votre commentaire:</label>
						  <textarea class="form-control" rows="3" style="min-width: 100%" name="contenu" id="comment"></textarea>
						</div>			
						<input type="submit" name="ajouter_commentaire" value="Commenter" />
				  </form>
				  </div><?php } ?>
				  </div>
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
						  </section>
						  <section  class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>produits similaires</h4>
						  <?php foreach($similar as $sim){?>
						  <a href="singleproduct.php?cat=<?php echo $sim['id_produit'] ;?>">
						 <div class="tab1">
							 <ul  class="place">			
							 
								 <li  class="sort" style=" text-align:center;"><?php echo $sim['nom_produit']; ?></li>
								 <li class="by"><img style=" text-align:center; width:200px; height:80px; positon:relative;" src="uploads/<?php echo $sim['img_url'] ; ?>" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 
					      </div>	
</a>						  
						  <?php } ?>
						  </section>
						  <!--script-->
						
				   <!---->
					 <script type="text/javascript" src="js/jquery-ui.min.js"></script>
					 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
					<script type='text/javascript'>//<![CDATA[ 
					$(window).load(function(){
					 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 400000,
								values: [ 2500, 350000 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

					});//]]>  

					</script>
				
						 			 
			   </div>
		</div>	     				
		     <div class="clearfix"></div>
	  </div>	 
</div>
<!---->
<?php include('footer.php'); ?>
<?php

//include database connection
    require_once('./includes/connection.php');
// get record of database
$record_count = count($db->query("SELECT COUNT(post_id) FROM posts")->fetchAll());
//amount displayed
$per_page = 5;
//number of pages
$pages = ceil($record_count/$per_page);

// get page number
if(isset($_GET['p']) && is_numeric($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 1;
}
if($page<=0) {
    $start = 0;
} else {
    $start = $page * $per_page - $per_page;
}
$prev = $page - 1;
$next = $page + 1;

$query = $db->prepare("SELECT post_id, title, LEFT(body, 300) AS body, category FROM posts INNER JOIN categories ON categories.category_id=posts.category_id ORDER BY post_id DESC LIMIT $start, $per_page");
$query->execute();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>Ben ghorbel Meuble</title>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="../js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />

<!---->
 <meta charset="UTF-8">
 

     
      

	<!---->
<!-- Custom Theme files -->
<!--//theme-style-->
<style>
#t2
{
margin-top:-13%;	

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
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="../js/menu_jquery.js"></script>
<script src="../js/simpleCart.min.js"> </script>
  <script src="../js/responsiveslides.min.js"></script>
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
		 	<a href=""><img src="../images/logo.png" alt="" style=""/></a>			 
		 </div>
		 <div class="header_right">	
			 <div class="login" style="font-size: 15px ">
				 <a href="account.html"><strong >Connecté</strong></a>
			 </div>
					 
		 </div>
	
		 	
		  <div class="clearfix"></div>	
		  		  <center>

							 
                     <h3 class="h3" style="font-size: 45px ;color:#026466" > <strong > Ben Ghorbel Forum </strong></h3>
					 
                 
				 </center> 
				<br></br>
	 </div>
</div>

						<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue"> 
		
			<li class="active grid"><a  class="color1"href="./index_blog.php">Mon forum</a></li>
			   <li ><a  class="color6" href="./index.php">Ajouter catégorie</a></li>
			 <li class="grid"><a class="color2" href="new_post.php">Nouvelle publication</a>
			
				</li>
						
			
				<li><a class="color7"  href="./admin/logout.php">Déconnexion</a>
				
				</li>				
			
							
			   </ul> 
			
			 <div class="clearfix"></div>
		 </div>
	  </div>
</div>

    <div id="container">
		 <center><form>
	
        
						<table width = "900" border=1 class="button1" id="t2">
							 	<thead>
						  <th><h2> <center style="font-size: 20px ;color:#026466 " >Sujet </center></h2></th>
						    <th><h4><center style="font-size: 20px ;color:#026466 " >Catégorie</center> </h4></th>
							    <th><h4><center style="font-size: 20px ;color:#026466 " >Déscription</center> </h4></th>
							  <th><h4><center style="font-size: 20px ;color:#026466 " >Commenter</center></h4></th>
						
						</thead>
        <?php 
            while($row = $query->fetch()){
            $lastspace = strrpos($row['body'], ' ');
        ?>
		<br></br>
	
		<tr>
            <td><?php echo $row['title']?> </td>
   
            <td> <?php echo $row['category']?></td>
			        <td> <?php  echo$row['body'] ;?></td>
		 <td><?php echo ''."<a href='post.php?id={$row['post_id']}'> <center >Ajouter commentaire</center></a>"?></td>
					<!-- <td><a href="post.php?id={$row['post_id']}"> Ajouter commentaire</a></td> -->
			</tr>
     
        <?php
	} 
        ?> </table></form></center>
        <?php
            if($prev > 0) {
                echo "<a href='index_blog.php?p=$prev'>Prev</a>";
            }
            if($page < $pages) {
                echo "<a href='index_blog.php?p=$next'>Next</a>";
            }
        ?>
    </div> 
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
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
</body>
</html>


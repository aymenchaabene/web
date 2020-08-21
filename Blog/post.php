<?php


if(!isset($_GET['id'])) {
    header('Location: index_blog.php');
    exit();
} else {
    $id = $_GET['id'];
}
//include database connection
   require_once('./includes/connection.php');
if(!is_numeric($id)) {
    header('Location: index_blog.php');
}
$query = $db->prepare("SELECT title, body FROM posts WHERE post_id=:post_id");
$query->bindParam(':post_id', $id);
$query->execute();
$results = $query->fetch();
if(count($results) == 0) {
    header('Location: index_blog.php');
    exit();
}
// define variables and set to empty values
$nameErr = $emailErr = $commentErr = "";
$name = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Veuillez entrer votre nom";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Les lettres et l'espace uniquement sont permis"; 
        }
    }
    
  /*  if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
        }
    }*/
    if (empty($_POST["comment"])) {
        $comment = "";
        $commentErr = "Ajouter le commentaire";
    } else {
        $comment = test_input($_POST["comment"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['submit'])){
if($addComment = $db->prepare("INSERT INTO comments(post_id, name, comment) VALUES (:post_id, :name, :comment)")) {
    $addComment->bindParam(':post_id', $id);
  //  $addComment->bindParam(':email', $email);
    $addComment->bindParam(':name', $name);
    $addComment->bindParam(':comment', $comment);
    $addComment->execute();
    echo "Votre commentaire a été ajouté.";
    $addComment->closeCursor();   
} else {
    echo "Error";
}
}
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
margin-top:1%;	

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
		 	<a href="index.html"><img src="../images/logo.png" alt="" style=""/></a>			 
		 </div>
		 <div class="header_right">	
			 <div class="login" style="font-size: 15px ">
				 <a href="account.html"><strong >Connecté</strong></a>
			 </div>
			 <div class="cart box_1">
				<a href="cart.html">
					<h3> <span class="simpleCart_total">$0.00</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> items)<img src="../images/bag.png" alt=""></h3>
				</a>	
				<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
				<div class="clearfix"> </div>
			 </div>				 
		 </div>
	
		 	
		  <div class="clearfix"></div>	
		  		  <center>

							 
                     <h3 class="h3" style="font-size: 45px ;color:#026466" > <strong > Ben Ghorbel Forum </strong></h3>
					 
                 
				 </center> 
				<br></br>
	 </div>
</div>
<body>
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

    <body>
 <center>
        <div id="container" class="bordure5">
		
            <div id="post" class="button2"  >
                <br></br>
				
                   <div> <strong><?php  echo 'Sujet :'.'  '.$results['title']; ?> </strong></div>
                  <div>   <strong><?php echo 'Déscription  :'.'  '.$results['body'];?> </strong></div> 
            
            </div>
            <hr>
			<center>
			
            <div id="addComments" >
             
                <form  class="bordure3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=$id"?>" method="POST">
                    Nom: <input type="text" name="name">
                    <span class="error">* <?php echo $nameErr;?></span>
                    <br><br>
                   <!-- E-mail: <input type="text" name="email">
                    <span class="error">* <php echo $emailErr;?></span>
                    <br><br>-->
                    Commentaire: <textarea name="comment" rows="5" cols="40"></textarea>
                    <span class="error">* <?php echo $commentErr;?></span>
                    <br><br>
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <input type="submit" class="button8" name="submit" value="Commenter" />
                </form>    
            </div></center>
            <hr>    
            <div id="Comments">
			
		 <center>
	<center><strong  style="font-size: 25px ;color:#4CAF50 "> Liste des commentaires à propos ce sujet :</strong></center><br>
        
						<table width = "700" border=1 class="button1" id="t2">
							 	<thead>
						  <th><h2> <center style="font-size: 20px ;color:#026466 " >Nom </center></h2></th>
						    <th><h4><center style="font-size: 20px ;color:#026466 " >Commentaire</center> </h4></th>
							   
						
						</thead>
			
                <?php
                    $query = $db->query("SELECT * FROM comments WHERE post_id='$id' ORDER BY comment_id DESC");
                    while($row = $query->fetchObject()){
                ?>
              
			
				
				<tr>
               <td><center> <strong> <?php echo $row->name ?></strong> </center></td>
			 <td>  <center><?php echo $row->comment ?>  </center></td>
                 </tr>
           
                <?php
					}      
                ?></table>
            </div>
        </div></center>
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



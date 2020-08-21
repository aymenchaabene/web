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
include ('admin/crud_reclamation.php');
$login= $_SESSION['login']	;	
$password= $_SESSION['mdp']	;
$cc=new crudreclamation(); 
$liste=$cc->cinfromlogin($login,$password,$cc->conn);
	
foreach($liste as $l)
{
$cin=$l["cin"];
$email=$l["mail"];
}
 $liste2=$cc->affiche_reclamation_client($cc->conn,$cin);	
?>
<!DOCTYPE HTML>
<html>
<head>
<?php include ('interface.php');?>
<!--cart-->
	 
<!------>
<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue">
			 <li class="grid"><a class="color1" href="index.php">Acceuil</a></li>
			 <li class="grid"><a class="color2" href="#">Produits</a>
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
				 <form>
					<input type="text" value="" placeholder="Search...">
					<input type="submit" value="">
					</form>
			 </div>
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
		 <div class="contact-head">
		 	 
			 
			  <form method="POST" action="ajouter_reclamation.php" name="verif" onsubmit="return VerifMail();"  >
				  <div class="col-md-6 contact-left">
						 <div class="contact-head">
		 	 <h2>vos reclamation</h2>
						<?php foreach($liste2 as $l2){ ?>
						<textarea name="old_reclamation" readonly="" ><?PHP echo $l2['contenu'];  ?></textarea>
						                                		<?php } ?>
             </div>																
				 </div>
				 <div class="col-md-6 contact-right">
				           
				         <h2>ajouter une reclamation</h2>
						 <?PHP $date = date("d-m-Y");?>
						<input type="texte"  name="date_reclamation" value="<?PHP echo $date ?>" readonly="" required/>
						<br>
                        </br>						
						<?php foreach($liste as $l){ ?>
						<input type="text" name="e_mail_client" placeholder="E_mail" id="verife" value="<?PHP echo $l['mail'];  ?>" required/>
						<?php } ?>
						 <textarea name="contenu_reclamation" placeholder="nouvelle reclamation"></textarea>
						 <input type="submit" value="ajouter" />
				 </div>
				 <div class="clearfix"></div>
				 <div class="delivery">
							 <p>vous pouvez changer l'adresse mail sur laquelle vous souhaiter recevoire la reponse de cette reclamation</p>							 
				        </div>	
			 </form>
		 </div>

	 </div>
</div>
<?php include ('footer.php');?>
</div>
<!---->
</body>
</html>

<?php if(isset($_GET['etat'])&& $_GET['etat']=="done")
	echo "<script>alert('votre reclamation à été ajouter avec succées')</script>";?>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="email_non_valide")
	echo "<script>alert('aucun client a ce mail ')</script>" ?>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="probléme")
	echo "<script>alert(' Ouups! il y'a un probléme')</script>";?>
</body>
</html>
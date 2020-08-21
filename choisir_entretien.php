<?php
session_start();
include ('fonctions-panier.php');

if(!(isset($_SESSION['login']) && isset($_SESSION['mdp'])  ))
	{
		header('Location: account.php');
	}
else
{
	$login= $_SESSION['login']	;	
	$password= $_SESSION['mdp']	;
 
}

include ('admin/crudentretien.php');
$login= $_SESSION['login']	;	
$password= $_SESSION['mdp']	;
$cc=new crudentretien(); 
$liste=$cc->cinfromlogin($login,$password,$cc->conn);
	
foreach($liste as $l)
{
$cin=$l["cin"];
}
 $liste2=$cc->recherche_entretien3($cc->conn,$cin);
	
		
?>
<!DOCTYPE HTML>
<html>
<head>
<?php include ('interface.php');?>
<!--cart-->
	 
	 <center>

							 
                     <h3 class="h3" style="font-size: 45px ;color:#026466" > <strong > Bienvenue à votre  Espace Client </strong></h3>
					 
                 
				 </center> 
				<br></br>
<!------>
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
					<li class="grid"><a class="color6" href="affichage_produit_client.php">Evaluations</a></li>
				<li class="grid"><a class="color6" href="ajout_message.php">Messages</a></li>
					<li class="active grid"><a class="color6" href="entretien(2).php">Entretiens</a>
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
		 <div class="contact-head">
		 <h2>les dates de vos entretiens   </h2>
				     <?php foreach($liste2 as $l2){ ?>
						<input type="date" name="date" value="<?PHP echo $l2['date_entretien'];  ?>"  readonly="">
					 <?php } ?>
		 	 <h2>choisir l'entretien à modifier  </h2>
			  <form method="POST" action="modif_entretien2.php">
				  <div class="col-md-6 contact-left">
		                 <input type="text"  hidden name="login" value="<?php echo $esem ?> " />
						<input type="text"  hidden name="password" value="<?php echo $mdp ?>" />
						<?php foreach($liste as $l){ ?>
						<input type="text" hidden name="rechercheinput" id="rechercheinput" value="<?PHP echo $l['cin'];  ?>" required/>
						<?php } ?>
						<input type="date" name="rechercheinput2" id="rechercheinput2" placeholder="tapez la date de l'entretien " required/>
						 <input type="submit" name="recherchesubmit" value="valider"/>
						 
				 </div>
				 <div class="clearfix"></div>
			 </form>
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
	echo "<script>alert('votre entretien a été modifié')</script>";?>
</body>
</html>

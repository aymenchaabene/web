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
$email=$l["mail"];
}
 //$liste2=$cc->affiche_reclamation_client($cc->conn,$cin);	
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
		  <li><a href="index.php">Acceuil</a></li>
		  <li class="active">Demande Entretien</li>
		 </ol>
		 <div class="contact-head">
		 	 <h2>demande d'entretien</h2>
			  <form method="POST" action="ajouter_entretien.php"  onsubmit="return VerifMail();" >
				  <div class="col-md-6 contact-left">
				        <?php foreach($liste as $l){ ?>
						<input type="text" name="e_mail_client"  value="<?PHP echo $l['mail'];  ?>"  required/>
						<?php } ?>
						 <br>
						 </br>
						<input type="date" name="date_entretien" placeholder="date de l'entretien" required/>
						 <br>
						 </br>
						<input type="text" name="adresse" placeholder="adresse" required/>
						<input type="text" name="type_entretien" placeholder="type entretien" required/>
						<input type="text" hidden name="login" value="<?php echo $login ?> " />
						<input type="text" hidden name="password" value="<?php echo $password ?>" />
						 <div class="clearfix"></div>
						<div class="delivery">
					  <p> noter bien que les types des entretien non valide ne seront pas traité</p>
                      <br>
                      </br>					  
				        </div>	
						 <input type="submit" value="valider"/>
				 </div>
				 
				 <div class="clearfix"></div>
			 </form>
		 </div>
		
		
	 </div>
</div>
<!---->
<?php include('footer.php');?>
</div>
<!---->
</body>
</html>

<?php if(isset($_GET['etat'])&& $_GET['etat']=="email_non_valide")
	echo "<script>alert('aucun client a ce mail ')</script>" ?>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="entretien_par_commande")
	echo "<script>alert('les entretient sont reservé pour les clients qui ont effectuées des achats uniquement')</script>" ?>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="probléme")
	echo "<script>alert(' Ouups! il y'a un probléme')</script>";?>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="done")
	echo "<script>alert('votre demande à été ajouter avec succées')</script>";?>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="date")
	echo "<script>alert('cette date est saturée')</script>";?>

</body>
</html>

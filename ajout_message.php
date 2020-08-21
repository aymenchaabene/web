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

include ('admin/crudmsg.php');
$login= $_SESSION['login']	;	
$password= $_SESSION['mdp']	;
$cc=new crudmsg(); 
$liste=$cc->cinfromlogin($login,$password,$cc->conn);
	
foreach($liste as $l)
{
$cin=$l["cin"];
$email=$l["mail"];
}
 $liste2=$cc->affiche_msg_client($cc->conn,$cin);
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
				<li class="active grid"><a class="color6" href="ajout_message.php">Messages</a></li>
								<li class="grid"><a class="color6" href="entretien(2).php">Entretiens</a>
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
		 	 <h2>vos message</h2>
			   <form method="POST" action="ajouter_msg.php">
				  <div class="col-md-6 contact-left">
				  <table>
				  <th>Messages</th>
				  <th>Reponses</th>
				  <?php foreach($liste2 as $l2){ ?>
				  <tr>
					  <td> <textarea name="old_msg" readonly="" ><?PHP echo $l2['sujet_msg'];  ?></textarea></td>
						 <td><textarea name="old_msg" readonly="" ><?PHP echo $l2['reponse'];  ?></textarea> </td>
						</tr>
                                		<?php } ?></table>
				 </div>
				 <div class="col-md-6 contact-right">
				  <h2>envoyer un nouveau messages</h2>
				 <?php foreach($liste as $l){ ?>
						<input type="text" hidden name="e_mail_client" value="<?PHP echo $l['mail'];  ?>" required/>
						<?php } ?>
					<?PHP $date = date("d-m-Y");?>
						<input type="texte" name="date_msg" value="<?PHP echo $date ?>" readonly="" required/>
						<br>
						</br>
						 <textarea name="sujet_msg"  placeholder="nouveau Message"></textarea>
						 <input type="submit" value="envoyer"/>
				 </div>
				 <div class="clearfix"></div>
			 </form>
		 </div>

		
	 </div>
</div>
<!---->
<?php include ('footer.php'); ?>
</div>
<!---->
</body>
</html>

<?php if(isset($_GET['etat'])&& $_GET['etat']=="done")
	echo "<script>alert('votre message à été ajouter avec succées')</script>";?>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="email_non_valide")
	echo "<script>alert('aucun client a ce mail ')</script>" ?>
<?php if(isset($_GET['etat'])&& $_GET['etat']=="probléme")
	echo "<script>alert(' Ouups! il y'a un probléme')</script>";?>
</body>
</html>

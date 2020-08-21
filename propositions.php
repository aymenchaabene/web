					<?php

include ('fonctions-panier.php');
      session_start();
//echo $_SESSION['cin'];
if(!isset($_SESSION['login']))
{header('location:index2.php');}
	if(isset($_SESSION['login']) && isset($_SESSION['mdp'])  )
	{

			
				include("crudProposition.php");
							$cc=new crudProposition();
		 $user=$_SESSION['login'];
		$cin=$cc->client_get_cin($user,$cc->conn);
		
	
		
		?>
		

<!DOCTYPE HTML>
<html lang="fr">
<head>
<style>
#t1
{
margin-top:-25%;	

}
</style>
<title>Ben ghorbel Meuble</title>
<?php include ('interface.php');?>
		  		  <center>

							 
                     <h3 class="h3" style="font-size: 45px ;color:#026466" > <strong > Bienvenue à votre  Espace Client </strong></h3>
					 
                 
				 </center> 
				<br></br>
	 </div>
</div>
	

						
						<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue"> 
					<li class="grid"><a class="color1" href="index.php">Acceuil</a></li>

			 <li class="grid"><a class="color1" href="gestionprofile.php">Mon profil</a></li>
			 <li class="grid"><a class="color2" href="espaceclientcommande.php">Mes commandes</a> </li>
			<li class="active grid"><a class="color4" href="propositions.php">Propositions</a></li>			
			
				<li><a class="color6" href="offres.php">Offres</a>
		
					<li><a class="color6" href="affichage_produit_client.php">Evaluations</a></li>
					<li><a class="color6" href="ajout_message.php">Messages</a></li>
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
		<br></br>

<!---->

<div class="contact">
	 <div class="container">
 <form method="POST"  action="Ajouter_prop.php" enctype="multipart/form-data">
		 <div class="contact-head">
		 	 <h2><strong   style="color:#4CAF50" >Veuillez saisir votre proposition :</strong></h2>
		
				<center>
				
						 <textarea   name ="contenu" rows=7 cols=80  placeholder="Proposition"></textarea>
						 <input  type="file" name="file" />
<center> <input type="submit" value="Envoyer"  /> </center>
				</center> 
			</form>		
 
    
	
	
	
	
	
	
	  <?php
						
							$cc=new crudProposition();
							$list=$cc->afficheprop($cc->conn);
							?> 
	
						
				  <h2><strong   style="color:#4CAF50" >Mes propositions :</strong></h2>
				  <form >
				<center>
						<table border=1 class="button1" id="t1" >
						
						<thead>
						  <th><h2><strong  > <center>Date </center></strong></h2></th>
						    <th><h2><strong  > <center>proposition</center> </strong></h2></th>
							  <th><h2><strong  > <center>Image</center></strong></h2></th>
								
						
						</thead>
							<?php
							foreach ($list as $l1){
							?>
					  
							
					
							<tr>
							
						        	<td> <input class="buttonoffdate" name ="date_prop"type="button" value = <?php echo $l1[3] ?> /></td>
								 <td> <textarea  readonly =""   rows=4 cols=90  ><?php echo $l1[1]; ?></textarea> </td>
								<td><img src="<?php echo $l1[2]; ?>" width ="150"  /></td>
								 <br></br>
							  	  
						
						
    
							
							</tr>
							
						<?php
						}
						?></table></center>
					
				   </form>
				  
				 <div class="clearfix"></div>
			 </form>
		 </div>
		
<!---->
						<!---->


						

<?php include ('footer.php');?>						
</body>
</html>
<?php
	}
	?>
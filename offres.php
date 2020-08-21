<?php
include ('fonctions-panier.php');

      session_start();

	if(isset($_SESSION['login']) && isset($_SESSION['mdp'])  )
	{
		//include("crudClient.php");
	    $user=$_SESSION['login'];
			include("crudOffre.php");
		
			
			
			$cc=new crudOffre();
			
			$pt=$cc->get_pt_fid_acc($user,$cc->conn);
			$cin=$cc->client_get_cin($user,$cc->conn);
			//echo $cin;
			

		
	
		
		?>
		



<!DOCTYPE HTML>
<html lang="fr">
<head>
<?php include ('interface.php');?>
		   <center>
							 
                     <h3 class="h3" style="font-size: 45px ;color:#026466" > <strong > Bienvenue à votre  Espace Client </strong></h3>
					 
                  </center> 
				<br></br>
	 </div>
</div>


	  
<!--cart-->
<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue"> 
		
					<li class="grid"><a class="color1" href="index.php">Acceuil</a></li>

			 <li class="grid"><a class="color1" href="gestionprofile.php">Mon profil</a></li>
			 <li class="grid"><a class="color2" href="espaceclientcommande.php">Mes commandes</a> </li>
			<li class="grid"><a class="color4" href="propositions.php">Propositions</a></li>			
			
				<li class="active grid"><a class="color6" href="offres.php">Offres</a></li>
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
		<center>
				  <h3 class="h3" style="font-size: 25px " > Vous avez accumulé  <strong  style="color:red" > <?php  echo ' <strong> '.$pt.' </strong> ' ?> </strong> <strong>points. </strong></h3> 
				  
    
				   																
                     <h3 class="h3" style="font-size: 25px " > <strong >Ben Ghorbel Meuble offre à ces clients fidèles des offres spéciales  </strong></h3> 
              <h3 class="h3" style="font-size: 25px " > <strong >Et les remercie pour leur fidélité !</strong></h3> 
				<br></br>
				
                  </center>


	  
	  
	  
	  
	  
	  <?php
							//include("crudOffre.php");
							$cc=new crudOffre();
							$list=$cc->afficheOffre($cc->conn);
							?> 
						
							<?php
							foreach ($list as $l1){
								
							?>
					  
				
							
							
							<form  action="verifier_off.php" >
						
							<center>

							<br></br>  <a href="ver.php?action=<?php echo $l1['nom']; ?>" ><input class="buttonoffre " type="button"  value="<?php echo $l1['nom']; ?>"></a>
				
								
			            	<input class="buttonfid" type="button" value="<?php echo $l1['nbre_pt_fid'].' pts'; ?> ">		
				
		
							</center>
						
							</form>
						
								
						          
										  
							
							
							
						
					
						<?php
						}
						?>
								<br></br>
	  <br></br>
	  <!-- début footer -->
      <!-- début footer -->
   
	 
<?php include ('footer.php');?>

	  <!-- Modal Login -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <form class="login-form"name="formLogin" method="POST" action="login.php">
                  <div class="modal-header">
                                         <h4 class="modal-title" id="myModalLabel">Veuillez saisir votre login et votre mot de passe</h4>
                  </div>
                  <div class="modal-body">
                     <table class="tableau">
                        <tr>
                           <td>
                              <p class="white">&nbspLogin </p>
                           </td>
                           <td>
                              <p class="white"> &nbsp&nbspMot De Passe </p>
                           </td>
                        </tr>
                        <tr>
                           <td><input class="textbox" type="text" name="login" value="" class="in"></td>
                           <td> &nbsp <input  class="textbox" type="Password" name="mdp" value="" class="in"/></td>
                        </tr>
                        <tr>
                       
                           <td> &nbsp <a href="oublie.php"> Mot de passe oublie ?</a></td>
                        </tr>
                     </table>
                  </div>
                  <div class="modal-footer">
                     <td> &nbsp <a href='account.php' style="font-size: 20px " ><strong>Inscription&nbsp</strong></a></td>
                     <button type="submit" class="btn btn-info" >Se connecter</button>
                  </div>
               </form>
            </div>
         </div>
      </div> 
     
 </body>
</html>
	<?php
	}
	?>
					<?php
include ('fonctions-panier.php');
      session_start();

//echo $_SESSION['cin'];
if(!isset($_SESSION['login']))
{header('location:account.php');}

	if(isset($_SESSION['login']) && isset($_SESSION['mdp'])  )
	{
		include("crudClient.php");
	    $user=$_SESSION['login'];
		//$cin = $_GET['cin'];
	    //include 'connexion.php';
	
		//$requete="SELECT * FROM `utilisateur` WHERE `login`='$user'";
		
		$cc=new crudClient();
		$cin=$cc->client_get_cin($user,$cc->conn);
		
		
		
		
	
		
		?>
		
		
	<html lang="fr">
<head>
<?php include ('interface.php');?>


					

							<center>
							 
                     <h3 class="h3" style="font-size: 35px ;color:#026466 " > <strong > Gestion du profil </strong></h3> 

					 <br></br>
				
                  </center> 
		
		
<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue">
		 			<li class="grid"><a class="color1" href="index.php">Acceuil</a></li>

			 <li class="active grid"><a class="color1" href="gestionprofile.php" >Mon profil</a></li>
			 <li class="grid"><a class="color2" href="espaceclientcommande.php">Mes commandes</a>
			
				</li>
			<li><a class="color4" href="propositions.php">Propositions</a>
		
				</li>				
			
				<li><a class="color6" href="offres.php">Offres</a>	</li>
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
		
				
				<!------>
			
			

				   <head>
					  <meta charset="UTF-8">
					  <title> FrontOffice</title>
					  <link href="cssback.css" rel="stylesheet" type="text/css">
					  <script src="js/forumContact.js"></script>
					  <link rel="stylesheet" href="../css/bootstrap.min.css">
					  <style>
					  .in1{
						background-color:#f8f8f8;
						border:1px solid #dadada !important;
						color:#000;display:inline;
						font-size:14px !important;
						height:35px !important;
						margin-right:.7%;
						padding:0 0 0 2.4%;
						width:50%;
				    	}
						.table1
						{
							margin-left:100px;
						}
					  </style>
				   </head>
				   
				 
					
						
						<div class="content">
	 <div class="container">
					
                     <form id ="form" name="inscriForm" class ="bordure" method="POST" action="modifclient.php" onSubmit=" return validation()" >
					 
					 					 <?php
//include ("crudClient.php");
$cc=new crudClient();

	$list=$cc->afficheC($cin,$cc->conn);
					
	foreach ($list as $ligne){
    ?>
		
					
                        <table name="table1" rules="none" width="100%" class="table1">
                           </br>
                           <tr>
                              <td> login :  </td>
                              <td> <input name="login" type="text" size="45" id="log" class="in1" value="<?php echo $ligne['login'] ; ?>"/>  </td>
                           </tr>
                           </br>
                           <tr>
                              <td> mot de passe :  </td>
                              <td> <input name="mdp" type="password" size="45" id="pass" class="in1" value="<?php echo $ligne['mdp'] ; ?>"/> </td>
                           </tr>
                           <tr>
                              <td> Nom :  </td>
                              <td> <input type="text" size="45" maxlength="10"name="nom" id="n" class="in1" value="<?php echo $ligne['nom'] ; ?>"/> </td>
                           </tr>
                           <tr>
                              <td> Prenom : </td>
                              <td> <input type="text" size="45" maxlength="10" name="prenom" id="p" class="in1" value="<?php echo $ligne['prenom'] ; ?>"/> </td>
                           </tr>
                   
                           <tr>
                              <td> CIN :</td>
                              <td> <input type="text" size="45" maxlength="8" name="cin" id="ci" class="in1" value="<?php echo $ligne['cin'] ; ?>"/> </td>
                           </tr>
                           <tr>
                              <td> Adresse : </td>
                              <td> <input type="text" size="45" maxlength="50" name="adresse" id="ad" class="in1" value="<?php echo $ligne['adresse'] ; ?>"/> </td>
                           </tr>

                           <tr>
                              <td> Email : </td>
                              <td> <input type="text" size="45" maxlength="65" name="email" id="mai" class="in1" value="<?php echo $ligne['mail'] ; ?>"/> </td>
                           </tr>
						           <tr>
                              <td> Sexe : </td>
                              <td>
							  <?php 
							  if($ligne['sexe']==="male")
							  {?>
                                 <p>
                                      <Input type = 'Radio' name ='choix' value= 'male' checked="checked">Homme
                                      <Input type = 'Radio' name ='choix' value= 'female'>Femme
                                 </p>
							   <?php
							  }
							  else 
							  {?>
                                 <p>
                                      <Input type = 'Radio' name ='choix' value= 'male' >Homme
                                      <Input type = 'Radio' name ='choix' value= 'female' checked="checked">Femme
                                 </p>
							  <?php
							  }?>
						  </tr>
                           <tr>
                              <td> Date de Naissance :</td>
                              <td> <input type="date"  name="date" id="da" class="in1" value="<?php echo $ligne['date_naiss'] ; ?>"/> </td>
                           </tr>
						     <tr>
                              <td> Telephone :</td>
                              <td> <input type="number" size="45" maxlength="8" name="tel" id="te" required pattern="{8,8}" class="in1" value="<?php echo $ligne['tel'] ; ?>"/> </td>
                           </tr>
                         
						     <tr>
                              <td> Profession : </td>
						
                              <td> <input type="text" size="45" maxlength="50" name="profession" id="pr" class="in1" value="<?php echo $ligne['profession'] ; ?>"/> </td>
                           </tr>
                           <tr>
                              <td> Etat civil : </td>
                              <td> 
									<SELECT name="liste"   class="in1"  VALUE="<?php echo $ligne['etat_civil'] ; ?>" > 
									<OPTION  VALUE="Celibataire" <?php  if ($ligne['etat_civil'] == "Celibataire" ) {echo ("selected");}?> >Celibataire</OPTION>
									<OPTION   VALUE="Fiance" <?php  if ($ligne['etat_civil'] == "Fiance" ) {echo ("selected");}?>>Fiance</OPTION>
									<OPTION VALUE="Marie"  <?php  if ($ligne['etat_civil'] == "Marie" ) {echo ("selected");}?>>Marie</OPTION>
									<OPTION   VALUE="Divorce" <?php  if ($ligne['etat_civil'] == "Divorce" ) {echo ("selected");}?>> Divorce</OPTION>
									<OPTION  VALUE="Veuf" <?php  if ($ligne['etat_civil'] == "Veuf" ) {echo ("selected");}?>>Veuf</OPTION>
									
								</SELECT>
							  </td>
                           </tr>

						   </table>
                        <center></br>
						<button type="submit" name="sumit" onclick="#" class="butto">Modifier</button> 
                           <!--<button type="reset" onclick="#" class="btn btn-info">Reinitialiser</button> -->
                        </center>
						<?php
						}
						?>
                     </form>
						</div>	</div>	</div>
				   </body>
				</html>
	<?php

	}

	?>
						
						
						

<!---->

						
<?php include ('footer.php');?>
</body>
</html>

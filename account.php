<?php 
include('fonctions-panier.php');
session_start();
include('admin/crudcategorie.php');

	$crudCat= new crudcategorie(); 
	$categories=$crudCat->Afficher_categorie($crudCat->conn);

 ?>
<!DOCTYPE HTML>
<html>
<head>
<?php include ('interface.php');?>
	 
<!------>
<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		 <ul class="megamenu skyblue">
			 <li class="grid"><a class="color1" href="index.php">Acceuil</a></li>
			 <li class="grid"><a class="color2" href="products.php">Produits</a>
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
			<li class="active grid"><a class="color4" href="account.php">Mon compte</a>
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
<div class="container">
	  <ol class="breadcrumb">
		  <li><a href="index2.php">Acceuil</a></li>
		  <li class="active">Compte</li>
		 </ol>
	 <div class="registration">
		 <div class="registration_left">
			 <h2>Nouveau client ? <span> créez un compte</span></h2>
	
			 <script>
				(function() {
			
				// Create input element for testing
				var inputs = document.createElement('input');
				
				// Create the supports object
				var supports = {};
				
				supports.autofocus   = 'autofocus' in inputs;
				supports.required    = 'required' in inputs;
				supports.placeholder = 'placeholder' in inputs;
			
				// Fallback for autofocus attribute
				if(!supports.autofocus) {
					
				}
				
				// Fallback for required attribute
				if(!supports.required) {
					
				}
			
				// Fallback for placeholder attribute
				if(!supports.placeholder) {
					
				}
				
				// Change text inside send button on submit
				var send = document.getElementById('register-submit');
				if(send) {
					send.onclick = function () {
						this.innerHTML = '...Sending';
					}
				}
			
			 })();
			 </script>
			 
		
			 <div class="registration_form">
			 <!-- Form -->

<form method="POST" name="inc" id="inc"    onsubmit="return validation()" action="ajoutClient.php"  > 


   <table name="table1" rules="none" width="100%" >
                           </br>
                           <tr>
                              <td> <label for="champ1">Login</label> </td>
                              <td>  <input type="text"  title="A--Z/0-->9" size="45" maxlength="10"  id="log" name="login" required > </td>
                           </tr>
                           </br>
                           <tr>
                              <td><label for="password">Mot de passe</label>  </td>
                              <td> <input name="mdp" type="password" size="45" maxlength="8" id="pass"  required  title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" type="mdp" >
                           </tr>
                           <tr>
                              <td><label for="nom">Nom</label> </td>
                              <td> <input type="text" size="45" maxlength="10"name="nom" id="n"  required /></td>
                           </tr>
                           <tr>
                              <td> <label for="prenom">Prenom</label> </td>
                              <td> <input type="text" size="45" maxlength="10" name="prenom" id="p"   required/> </td>
                           </tr>
                           <tr>
                              <td> Sexe : </td>
                              <td>
                                 <p>
                                      <Input type = 'Radio' name ='choix' value= 'male'>Homme
                                      <Input type = 'Radio' name ='choix' value= 'female'>Femme
                                 </p>
							  </td>
                           </tr>
                           <tr>
                              <td> <label for="cin">CIN</label></td>
                              <td> <input type="number" size="45" maxlength="8" name="cin" id="ci"   pattern="{8,8}" /> </td>
                           </tr>
                           <tr>
                              <td> <label for="adresse">Adresse</label> </td>
                              <td> <input type="text" size="45" maxlength="50" name="adresse" id="ad"  required /> </td>
                            
                           </tr>
                           <tr>
                              <td> <label for="Email">E-mail</label></td>
                              <td> <input type="email" size="45" maxlength="65" name="email" id="mai"  /> </td>
                           </tr>
                           <tr>
                              <td> <label for="date">Date de naissance</label></td>
                              <td> <input type="date"  name="date" id="da" class="in1" /> </td>
                           </tr>
                           <tr>
                              <td> <label for="tel">Téléphone</label> </td>
                              <td> <input type="number" size="45" maxlength="8" name="tel" id="te"  pattern="{8,8}" /> </td>
                           </tr>
                           <tr>
						  <td> Etat civil </td>
						  <td> 
								<SELECT name="liste" > 
									<OPTION id="c1" VALUE="Celibataire">Celibataire</OPTION>
									<OPTION  id="c2" VALUE="Fiance">Fiance</OPTION>
									<OPTION  id="c3" VALUE="Marie">Marie</OPTION>
									<OPTION id="c4" VALUE="Divorce"> Divorce</OPTION>
									<OPTION  id="c5" VALUE="Veuf">Veuf</OPTION>
									
								</SELECT>
						  </td>
						   </tr>
							<tr>
                              <td> <label for="profession">Profession</label> </td>
                             <td> <input type="text" size="45" maxlength="50" name="profession" id="pr" class="in1" /> </td>
                           </tr>
                           <tr>						   
						</table>
						 <center>
		<br></br>
		<div hidden>	<input  type="text" name="er" id="er"  /></div>
			 	  <div >
				<input type="submit" value="S'inscrire" id="register-submit"/>
				
			<button type="reset" class="btn btn-info" > Reinitialiser</button> 	
	  </div>
			
	  
						 
						
                         
                        </center>
					</form>
				<!-- /Form -->
			 </div>
		 </div>
		 <div class="registration_left">
			 <h2>Se connecter</h2>
			 <div class="registration_form">
			 <!-- Form -->
			 
			 

			         <form id="registration_form" class="login-form" name="formLogin" method="POST" action="loginn.php">
	
					<div>
						<label>
						  <td><input placeholder="login:" class="textbox" type="text" name="login" value="" class="in"></td>
                          
							
						</label>
					</div>
					<div>
						<label>
							 <td> &nbsp <input  class="textbox" type="Password" name="mdp" value="" class="in"/></td>
						</label>
					</div>						
					<div>
						<input type="submit" value="se connecter" id="register-submit" >
					</div>
					<div class="forget">
						<a href="oublie.php">Mot de passe oublié ?</a>
					</div>
				</form>
			 <!-- /Form -->
			 </div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
	  
	  
	  <!-- début footer -->
      <!-- début footer -->
   

<?php
		include('footer.php');
?>
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
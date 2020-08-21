<?php include ('fonctions-panier.php'); 
session_start();
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>

<?php include ('interface.php'); ?>
<!--cart-->
	 


 
<!---->

 <!---->       
        <!-- début aside -->

	  <!-- fin aside -->      
	  <!---->
	  <center>
<form  class="bordure ">

		<center>
				 
                     <h3 class="h3" style="font-size: 35px " > <strong >Un message de confirmation a été envoyé à votre mail !</strong></h3> 

				
				 
                  </center> 
					<center>
							 
                     <h3 class="h3" style="font-size: 35px" > <strong >Veuillez vérifier votre boite mail et confirmer votre inscription !</strong></h3> 
  <h3 class="h3" style="font-size: 35px ;color:#026466 " > <strong > Ben Ghorbel Meuble vous remercie pour votre confiance </strong></h3> 
					 <br></br>
				 	  <div   type="submit" value="OK"   class="acount-btn" >
			<a href="index2.php" >  <strong  style="color:white"> ok </strong>  </a>
	  </div>
	  
                  </center> 
		
		</form> </center>
	   <br></br> <br></br>
	  
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

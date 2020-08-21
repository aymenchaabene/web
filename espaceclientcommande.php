<?php
include_once ('admin/crudlignedecommande.php');
include ('fonctions-panier.php');
session_start();

$crud=new crudlignedecommande();
			
$id=$_SESSION['cin'];

			
$liste=$crud->Rechercher_Commande_ID_Client($crud->conn,$id);

?>
<!DOCTYPE html>
<html>
<head>
<?php include ('interface.php');?>

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

			 <li class="grid"><a class="color1" href="gestionprofile.php" >Mon profil</a></li>
			 <li class="active grid"><a class="color2" href="espaceclientcommande.php">Mes commandes</a>
			
				</li>
			<li><a class="color4" href="propositions.php">Propositions</a>
		
				</li>				
			
				<li><a class="color6" href="offres.php">Offres</a></li>
			
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
<style>
#bouttons {
    background: none repeat scroll 0 0 #FFFFFF;
    border-color: #FFFFFF #FFFFFF #FFFFFF #FFFFFF;
    border-radius: 10px 10px 10px 5px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 1px 1px 3px #FFFFFF;
    color: #003300;
    cursor: pointer;
    font-weight: bold;
    padding: 5px;
    text-align: center;
    text-shadow: 1px 1px 1px #000000;
}
input.green { font-size:1.1em; padding:5px 80px; display:inline-block; margin:5px; border-radius:6px; border:solid rgba(0,0,0,0.2); border-width:1px 1px 5px; box-shadow:0 5px 0 rgba(0,0,0,0.1), inset 0 0 3px rgba(255,255,255,0.3); cursor:pointer; user-select:none; transition:0.4s ease; }

input:hover { transform:translateY(-3px); box-shadow:0 6px 0 rgba(0,0,0,0.1), inset 0 0 1px rgba(255,255,255,0.4); border-bottom-width:8px; }

input:active { transform:translateY(4px); box-shadow:0 2px 0 rgba(0,0,0,0.1), inset 0 0 5px rgba(255,255,255,0.4); border-bottom-width:2px; transition:0.1s ease; }

.orange { background:hsl(41,76%,65%); }
.yellow { background:hsl(50,81%,65%); }
input.green { color: white; background:hsl(181,96%,20%); }
.blue { background:hsl(176,59%,59%); }

a.green { font-size:1.1em; padding:24px 26px; display:inline-block; margin:5px; border-radius:6px; border:solid rgba(0,0,0,0.2); border-width:1px 1px 5px; box-shadow:0 5px 0 rgba(0,0,0,0.1), inset 0 0 3px rgba(255,255,255,0.3); cursor:pointer; user-select:none; transition:0.4s ease; }

a:hover { transform:translateY(-3px); box-shadow:0 6px 0 rgba(0,0,0,0.1), inset 0 0 1px rgba(255,255,255,0.4); border-bottom-width:8px; }

a:active { transform:translateY(4px); box-shadow:0 2px 0 rgba(0,0,0,0.1), inset 0 0 5px rgba(255,255,255,0.4); border-bottom-width:2px; transition:0.1s ease; }

.red { background:hsl(8,59%,59%); color:rgba(255,255,255,0.95); text-shadow:-1px -1px 1px rgba(0,0,0,0.1); }
.orange { background:hsl(41,76%,65%); }
.yellow { background:hsl(50,81%,65%); }
.green { background:hsl(104,51%,62%); }
.blue { background:hsl(176,59%,59%); }
</style>
<div class="container">



						<table border=10 class="button15" id="t1" width="100%" >
						<fieldset >
						<legend>Vos Commandes</legend>
						<thead>
						  <th><strong  > <center>ID </center></strong></th>
						    <th><strong  > <center>Date commande</center> </strong></th>
							  <th><strong  > <center>Montant total</center></strong></th>
							  <th><strong  > <center>Etat de Payement</center></strong></th>
							  <th><strong  > <center>Status</center></strong></th>
								<th><strong  > <center>Action</center></strong></th>
						
						</thead>
							<?php
							foreach ($liste as $l1){
							?>
					  
							
					
							<tr>
							
						        	<!--<td> <input class="buttonoffdate" name ="date_prop"type="button" value = <?php echo $l1[3] ?> /></td>
								 <td> <textarea  readonly =""   rows=4 cols=90  ><?php echo $l1[1]; ?></textarea> </td>
								<td><img src="<?php echo $l1[2]; ?>" width ="150"  /></td>
								 <br></br>-->
							  	  
								  <td><?php echo  $l1['id_commande'] ?></td>
								  <td><?php echo  $l1['date_commande'] ?></td>
								<td><?php echo  $l1['montant_commande'] ?></td>
								<td><?php echo  $l1['payement_commande'] ?></td>
								<td><?php echo  $l1['status_commande'] ?></td>
								<td> 
								
								<form class="paypal" action="payement/payments.php" method="post" id="paypal_form">
								<input type="hidden" name="cmd" value="_xclick" />
								<input type="hidden" name="no_note" value="1" />
								<input type="hidden" name="id_commande" value="<?php echo $l1['id_commande'] ?>" />
								<input type="hidden" name="lc" value="UK" />
								<input type="hidden" name="currency_code" value="EUR" />
								<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
								<input type="hidden" name="first_name" value="Customer's First Name"  />
								<input type="hidden" name="last_name" value="Customer's Last Name"  />
								<input  type="hidden" name="payer_email" value="d.oussamabenghorbel@gmail.com"  />
								<input type="hidden" name="item_number" value="" / >
								
								<input align="right" type="submit" class="green" name="submit" value="Payer cette commande"/> 
								</form>
								<input align="right"  class="green" type="submit" value="Annuler cette commande"/> </br>
								<input align="right"  class="green" value="Bon de commande" onClick="location.href='admin/print.php?id_commande=<?php echo $l1['id_commande']?>';"/> 
								</td>
												
						
    
							
							</tr>
							
						<?php
						}
						?>
						</fieldset>
						</table>




</div>
</body>




<?php include ('footer.php'); ?>



</html>
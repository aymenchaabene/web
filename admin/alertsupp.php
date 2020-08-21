

<?php
//ton code avant
 
if(!isset($_POST['supprimer']) || !isset($_POST['annuler']))
{
  include("crm.php");
  exit();
}
 
 
if(isset($_POST['annuler']))
{
echo "suppresion annulée";
exit();
}
 
if(isset($_POST['supprimer']))
{
// ta requete pour supprimer la news

 <tbody>
					
					
						 
							<?php
							include("crudClient.php");
							$cc=new crudClient();
							$list=$cc->affiche($cc->conn);
							?> 
						
							<?php
							foreach ($list as $l1){
							?>
					  
							
					
							<tr>
								<td ><?php echo $l1[0]; ?> </td>
								<td ><?php echo $l1[1]; ?> </td>
								<td ><?php echo $l1[2];?></td>
								<td class="center"><?php echo $l1[3]; ?></td>
								<td class="center"><?php echo $l1[4]; ?></td>
                                <td class="center"><?php echo $l1[5]; ?> </td>
								<td class="center"><?php echo $l1[6]; ?> </td>
								<td class="center"><?php echo $l1[7];?></td>
								<td class="center"><?php echo $l1[8]; ?></td>
								<td class="center"><?php echo $l1[9]; ?></td>
                                <td class="center"><?php echo $l1[10]; ?></td>
								<td class="center"><?php echo $l1[11]; ?></td>
							   <td class="center"><?php echo $l1[12]; ?></td>
							<td class="center">
									
									<a class="btn btn-info" href="modification.php?cin=<?php echo $l1[2] ; ?>">
									
				
										
										
										<i class="halflings-icon white edit" ></i>  
										
									</a>
								
								
								

									<a class="btn btn-danger" href="supprimerC.php?cin=<?php echo $l1[2] ; ?>"   >
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							
							
							</tr>
							
					
						<?php
						}
						?>
						
						
					
						
						
						

					</table>
                </div>	
					
					      </tbody>
}
 
 
// la fin de ton code
?>
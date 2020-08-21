	
	<?php
	      session_start();

	if(isset($_SESSION['login']) && isset($_SESSION['mdp'])  )
	{
		
	    $user=$_SESSION['login'];
			include("crudOffre.php");
		
			
			
			$cc=new crudOffre();
			
			$pt=$cc->get_pt_fid_acc($user,$cc->conn);
			?>
			
			
	<?php		
		$list=$cc->afficheOff_selon_pt_fid($pt,$cc->conn);
							?> 
						
						
						
						
							<?php
							foreach ($list as $l1)
							{
													
	if($l1['nom']=="Livraison gratuite")
								{echo "ok";}	
							
							?>
					  
			<?php
}?>
	 	<?php  
	  }
	  ?>				
							
			
							
							
							
							
					
								
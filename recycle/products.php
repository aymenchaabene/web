<?php 
    include('admin/crudproduit.php'); 
	session_start(); 

?>


<h1>Product List</h1> 
 <?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
    ?>
    <table> 
        <tr> 
            <th>Name</th> 
            <th>Description</th> 
            <th>Price</th> 
            <th>Action</th> 
        </tr> 
			<?php 

		$crud=new crudproduit();
					
		$liste=$crud->Afficher_Produit($crud->conn);
			


			foreach ($liste as $row) 
			{ 

			?> 
			<tr> 
			<td><?php echo $row['nom_produit'] ?></td> 
			<td><?php echo $row['desc_produit'] ?></td> 
			<td><?php echo $row['qte_produit'] ?></td> 
			<td><a href="<?php echo "panier1.php?action=ajout&id=".$row['id_produit']."&nom=".$row['nom_produit']."&prix=".$row['prix_produit']."&qte=".$row['qte_produit']."&desc=".$row['desc_produit']?>">Add to cart</a></td> 
			</tr> 
			<?php 
			} 

			?>
    </table>
	
	

	
	
	
	
	
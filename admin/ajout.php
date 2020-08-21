<html>
<head>
<?php include('crudproduit.php');

$c=new config();
$conn=$c->getConnexion();
$produit=new produit(); 
$ccproduit=new crudproduit();
?>
<title>Ajout produit </title>
<meta charset="utf-8">
</head>
<body>
<!-- id_produit 	nom_produit 	prix_produit 	qte_produit 	desc_produit 	date_produit 	ptsfid_produit -->
<form method="POST" action="crudproduit.php?id=1">
<table border="1">
<tr>
<tr>
<td>nom_produit</td>
<td><input type="text" name="nom_produit"></td>
</tr>
<tr>
<td>prix_produit</td>
<td><input type="number" name="prix_produit"></td>
</tr>
<tr>
<td>qte_produit</td>
<td><input type="number" name="qte_produit" ></td>
</tr>
<tr>
<td>desc_produit</td>
<td><input type="text" name="desc_produit"></td>
</tr>
<tr>
<td>date_produit</td>
<td><input name="date_produit"></td>
</tr>
<tr>
<td>ptsfid_produit</td>
<td><input type="number" name="ptsfid_produit"></td>
</tr>
<tr>
<td> <input type="submit" value="ajouter"></td>
</tr>

						  
</table>
</form>
</body>
</html>
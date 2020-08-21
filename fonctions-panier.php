<?php
 
function creating_cart()
{
   if (!isset($_SESSION['panier']))
   {
      $_SESSION['panier']=array();
      $_SESSION['panier']['id_produit'] = array();
      $_SESSION['panier']['nom_produit'] = array();
      $_SESSION['panier']['prix_produit'] = array();
      $_SESSION['panier']['qte_produit'] = array();
      $_SESSION['panier']['desc_produit'] = array();
	  $_SESSION['panier']['img_produit'] = array();
	  $_SESSION['panier']['ptsfid_produit'] = array();


   }
   return true;
}


/**
 * Ajoute un article dans le panier
 */
 function ajouterArticle($id_produit,$nom_produit,$prix_produit,$qte_produit,$desc_produit,$img_produit,$ptsfid_produit)
{


   //Si le panier existe
   if (creating_cart())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
     $positionProduit = array_search($id_produit,  $_SESSION['panier']['id_produit']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qte_produit'][$positionProduit] += $qte_produit;
		 
      }
      else
      {
         //Sinon on ajoute le produit
		 $items++;
         array_push( $_SESSION['panier']['id_produit'],$id_produit);
         array_push( $_SESSION['panier']['nom_produit'],$nom_produit);
         array_push( $_SESSION['panier']['prix_produit'],$prix_produit);
         array_push( $_SESSION['panier']['qte_produit'],$qte_produit);
         array_push( $_SESSION['panier']['desc_produit'],$desc_produit);
         array_push( $_SESSION['panier']['img_produit'],$img_produit);
		 array_push( $_SESSION['panier']['ptsfid_produit'],$ptsfid_produit);

         

      }
	  
   }
   else
   {
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   }

   						header("Location: products.php");
						die();
						
}
function ajouterArticleLogin($id_produit,$nom_produit,$prix_produit,$qte_produit,$desc_produit,$img_produit,$ptsfid_produit)
{


   //Si le panier existe
   if (creating_cart())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
     $positionProduit = array_search($id_produit,  $_SESSION['panier']['id_produit']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qte_produit'][$positionProduit] += $qte_produit;
		 
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['id_produit'],$id_produit);
         array_push( $_SESSION['panier']['nom_produit'],$nom_produit);
         array_push( $_SESSION['panier']['prix_produit'],$prix_produit);
         array_push( $_SESSION['panier']['qte_produit'],$qte_produit);
         array_push( $_SESSION['panier']['desc_produit'],$desc_produit);
         array_push( $_SESSION['panier']['img_produit'],$img_produit);
		 array_push( $_SESSION['panier']['ptsfid_produit'],$ptsfid_produit);

         

      }
	  
   }
   else
   {
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   }

   						header("Location: products.php");
						die();
						
}




/*
 * Modifie la quantité d'un article
 */
 function modifierQTeArticle($id_produit,$qte_produit){
   //Si le panier éxiste
   if (creating_cart())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qte_produit > 0)
      {
         //Recherche du produit dans le panier
         $positionProduit = array_search($id_produit,  $_SESSION['panier']['id_produit']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qte_produit'][$positionProduit] = $qte_produit ;
         }
      }
      else
      supprimerArticle($id_produit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/* Supprime un article du panier
 */
 function supprimerArticle($id_produit){
   //Si le panier existe
   if (creating_cart())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
	  $tmp['id_produit'] = array();
      $tmp['nom_produit'] = array();
      $tmp['prix_produit'] = array();
      $tmp['qte_produit'] = array();
      $tmp['desc_produit'] = array();
	  $tmp['img_produit'] = array();
	  $tmp['ptsfid_produit'] = array();



    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
      {
         if ($_SESSION['panier']['id_produit'][$i] !== $id_produit)
         {
            array_push( $tmp['id_produit'],$_SESSION['panier']['id_produit'][$i]);
            array_push( $tmp['nom_produit'],$_SESSION['panier']['nom_produit'][$i]);
            array_push( $tmp['prix_produit'],$_SESSION['panier']['prix_produit'][$i]);
            array_push( $tmp['qte_produit'],$_SESSION['panier']['qte_produit'][$i]);
            array_push( $tmp['desc_produit'],$_SESSION['panier']['desc_produit'][$i]);
			array_push( $tmp['img_produit'],$_SESSION['panier']['img_produit'][$i]);
			array_push( $tmp['ptsfid_produit'],$_SESSION['panier']['ptsfid_produit'][$i]);

         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
	  	header("Location: panier.php");
		die();
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



 /* Montant total du panier
 * return int
 */
 function MontantGlobal()
{
	
	   
if (isset($_SESSION['panier']))
	   {
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
   {
      $total += $_SESSION['panier']['qte_produit'][$i] * $_SESSION['panier']['prix_produit'][$i];
   }
   return $total;
	   }
	   else
		   return 0;
}



/*
 Supprimer le panier
 */
 function supprimePanier()
 {
	if (isset($_SESSION['panier']))
	{
   unset($_SESSION['panier']);
	}
}


 /* Compte le nombre d'articles différents dans le panier
 * return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['id_produit']);
   else
   return 0;

}

function getContainer()
{
	
	$ch='';
   for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
   {
      $ch = $ch.$_SESSION['panier']['id_produit'][$i].',';
   }
   
   return $ch;

}

function getContainerQte()
{
	$ch='';
   for($i = 0; $i < count($_SESSION['panier']['qte_produit']); $i++)
   {
      $ch = $ch.$_SESSION['panier']['qte_produit'][$i].',';
   }
   
   return $ch;
	
}

function sivide()
{
	sleep(3);
	header("Location: products.php");
	die();

}

function MontantPTSGlobal()
{
	
	   
if (isset($_SESSION['panier']))
	   {
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
   {
      $total += $_SESSION['panier']['qte_produit'][$i] * $_SESSION['panier']['ptsfid_produit'][$i];
   }
   return $total;
	   }
	   else
		   return 0;
}

function Eclap_Time($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }
}



?>
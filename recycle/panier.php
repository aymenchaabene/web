<?php
session_start();
include_once("fonctions-panier.php");

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $id = (isset($_POST['id'])? $_POST['id']:  (isset($_GET['id'])? $_GET['id']:null )) ;
   $prix = (isset($_POST['prix'])? $_POST['prix']:  (isset($_GET['prix'])? $_GET['prix']:null )) ;
   $qte = (isset($_POST['qte'])? $_POST['qte']:  (isset($_GET['qte'])? $_GET['qte']:null )) ;
   $nom=(isset($_POST['nom'])? $_POST['nom']:  (isset($_GET['nom'])? $_GET['nom']:null )) ;
   $desc=(isset($_POST['desc'])? $_POST['desc']:  (isset($_GET['desc'])? $_GET['desc']:null )) ;
   //Suppression des espaces verticaux
   $id = preg_replace('#\v#', '',$id);
   //On verifie que $p soit un float
   $prix= floatval($prix);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier
    
   if (is_array($qte))
   {
      $QteArticle = array();
      $i=0;
      foreach ($qte as $contenu)
	  {
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $qte = intval($qte);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($id,$nom,$prix,$qte,$desc);
         break;

      Case "suppression":
         supprimerArticle($id);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['id_produit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}

if (creating_cart())
	{
	   $nbArticles=count($_SESSION['panier']['id_produit']);
	   if ($nbArticles <= 0)
	   echo "<tr><td>Votre panier est vide </ td></tr>";
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
			  echo $_SESSION['panier']['id_produit'][$i];
			  echo $_SESSION['panier']['prix_produit'][$i];


	   }
	}
	}
?>
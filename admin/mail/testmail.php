<?php
include ("m.php");

$email=$_POST['e_mail_client'];
$reponse=$_POST['reponse'];
$text="vous venez de nous envoyer une reclamation aprés l'avoir traité voici notre reponse : <br>";


$text=$text.$reponse ;




mailing ($email,$text);




?>
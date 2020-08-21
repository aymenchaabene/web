<?php 
require 'mot-de-pass-oublie.php';

$cc=new MDPOublie();
$cc->Recuperer_mdp($cc->conn);

?>
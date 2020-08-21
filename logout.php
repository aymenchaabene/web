<?php 
session_start();

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

header("location:index.php");
?>




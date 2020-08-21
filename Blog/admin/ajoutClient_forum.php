<?php
require_once('../includes/connection.php');

	if(isset($_POST['subm'])) {

	$email=($_POST['email']);
	$username=($_POST['username']);
	$password=($_POST['password']);

	 
    $query = $db->prepare("INSERT INTO users( username,password,email) VALUES (:username, :password, :email)");
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
    $query->bindParam(':email', $email);
    
    //$user_id = $_SESSION['user_id'];
  //  date_default_timezone_set("America/Louisville");
   // $date = date("Y-m-d H:i:s");
   // $body = htmlentities($body);
    $query->execute();
	 if($username && $password && $email) {
        if($query) {
            echo "user added";
			  header('location:../confirmer_inscri_forum.php');
        } else {
            echo "Error";
        }
    } else {
        echo "Missing information";
    }
}
?>

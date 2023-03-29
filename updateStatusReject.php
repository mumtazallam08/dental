<?php

require_once("db_conn.php");
session_start();

if(!isset($_SESSION["email"])){
	header("Location: index.php");
  }
else{

$email = $_GET['email'];
$number = $_GET['number'];

$add_to_db = mysqli_query($conn,"UPDATE contact_form SET status='Rejected' WHERE email='".$email."' AND number='".$number."'");
	
			if($add_to_db){	
			  echo "Saved!!";
			  header("Location: admin.php");
			}
			else{
			  echo "Query Error : " . "UPDATE leaves SET status='Rejected' WHERE email='".$email."' AND number='".$desc."'" . "<br>" . mysqli_error($conn);
			}
	}
?>


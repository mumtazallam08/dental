<?php
include 'db_conn.php';
session_start();
error_reporting(0);
if(!isset($_SESSION["email"])){
   header("Location: index.php");
 }
 else{
 
if(isset($_POST['submit'])){

   $name =  $_POST['name'];
   $email =  $_POST['email'];
   $number = $_POST['number'];
   $date = $_POST['date'];
   $status = "pending";

   $insert = mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, date,status) VALUES('$name','$email','$number','$date','$status')") or die('query failed');

   if($insert){
      echo "<script type='text/javascript'>alert('Sucessfully recorded')</script>";
   }else{
      echo "<script type='text/javascript'>alert('something went wrong')</script>";
   }
}
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DENTAL HOME</title>
   <style>
      body{
         background-image: url('icon/Dental.png');
         margin-top:30px;
         margin-left: 40px;

      }
      .nav{
         width: 100%;
         height: 50px;
         background-color: grey;
         padding-top: 15px;
      }
      a{

         font-size: 1.5rem;
         margin-left: 30px;
      }
      form{
         width: 300px;
         height: 400px;
         background-color: lightgreen;
         border-radius: 10px;
         text-align: center;
         padding-top: 3px;
         margin-top: 70px;
         margin-left: 20px;
      }
      input{
         width: 90%;
         margin-top: 15px;
         height: 35px;
         border-radius: 5px;
         border: none;
         font-size: 1rem;
      }
   </style>
</head>
<body>

    <nav class="nav">
         <a href="home" class="logo">Dental<span>Care.</span></a>
         <a href="">home</a>
         <a href="logout.php">Logout</a>
         <a href="myhistory.php">View All Appointment</a>
   </nav>

   <br><br>
<form action="" method="post" enctype="multipart/form-data">
<h1 class="heading">Make Appointment</h1>

<input type="text" name="name" placeholder="Enter your name"  required>

<input type="email" name="email" placeholder="Enter your email"  required>

<input type="tel" name="number" placeholder="Enter your number"  required>

<input type="datetime-local" name="date"  required>
   <input type="submit" value="Make Appointment" name="submit" style="background-color: #1cf2e4;" onmouseover="this.style.background='#349037'" onmouseout="this.style.background='#1cf2e4'">
</form>  
</body>
</html>
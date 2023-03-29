<?php 

include 'db_conn.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password=$_POST['password'];
	$type='user';



    $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        echo "<script type='text/javascript'>alert('user already exist')</script>";
    }else{
        $insert = mysqli_query($conn, "INSERT INTO `user`(name, email, password, type) VALUES('$name', '$email', '$password', '$type')") or die('query failed');
        if($insert){
            echo "<script type='text/javascript'>alert('Registration successfully')</script>";
            header('location:index.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }
?>

<!DOCTYPE html>
<html>
<head>

<title>DENTAL CLINIC</title>
	<style>
		body{
    background-image: url('icon/home-bg.jpg');
    text-align: center;
    text-decoration: none;
}
.contaimer-one{
    display: inline-block;
    background-color: lightblue;
    width: 30%;
    height: 350px;
    border-radius: 10px;
    border: 0px;
    color: block;
    margin-top: 100px;
}
.logo-first{
    width: 45px;
	border-radius: 5px;
    position: absolute;
    margin-top: 38px;
    margin-left: -180px;
}
input{
    width:80%;
    height: 30px;
    border-radius: 5px;
    margin-top: 15px;
	border: 0px;
}
button{
    width: 80%;
    height: 30px;
    background-color: #4CAF50;
    border-radius: 5px;
    font-size: larger;
    color: #fff;
    border: none;
    margin-top: 10px;
    cursor: pointer;
}
	</style>
</head>
<body>

    <div class="contaimer-one">
		<img src="icon/logo.jpg" class="logo-first" alt="logo"><br>
		<h1>DENTAL CLINIC</h1>
		<form action="" method="POST" enctype="multipart/form-data">
				<input type="text" placeholder="Name" name="name"  required>
				<input type="email" placeholder="Email" name="email" required>
				<input type="password" placeholder="Password" name="password" required>
				<button name="submit" >Register</button>
			<p>Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
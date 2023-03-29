<?php
require_once("db_conn.php");
session_start();
global $result;
if(!isset($_SESSION["email"])){
  header("Location: index.php");
}
else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment</title>
  <style>
    body{
        text-align: center;
        background-color: lightblue;
        font-size: 1.5rem;
    }
    table{
        width: 100%;
        background-color: lightgreen;
    
    }
  </style>


</head>

<body>



  <h1>My Appointment History</h1>

  <div class="container">
  
    <div class="table-responsive">
    
      <table border="2x">
          <thead style="background-color: green;">
              <th>S.No</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Number</th>
              <th>Date</th>
              <th>Status</th>
          </thead>
          <tbody>
            <!-- loading all leave applications of the user -->
            <?php
                  $leaves = mysqli_query($conn,"SELECT * FROM contact_form WHERE email='".$_SESSION['email']."'");
                  if($leaves){
                    $numrow = mysqli_num_rows($leaves);
                    if($numrow!=0){
                      $cnt=1;
                      while($row1 = mysqli_fetch_array($leaves)){
                        echo "<tr>
                                <td>$cnt</td>
                                <td>{$row1['name']}</td>
                                <td>{$row1['email']}</td>
                                <td>{$row1['number']}</td>
                                <td>{$row1['date']}</td>
                                <td><b>{$row1['status']}</b></td>
                              </tr>";
                     $cnt++; }
                    } else {
                      echo"<tr class='text-center'><td colspan='12'><b>YOU DON'T HAVE ANY LEAVE HISTORY! PLEASE APPLY TO VIEW YOUR STATUS HERE!</b></td></tr>";
                    }
                  }
                  else{
                    echo "Query Error : " . "SELECT email,status FROM contact_form WHERE email='".$_SESSION['email']."'" . "<br>" . mysqli_error($conn);;
                  }
                }
              ?>
          </tbody>
      </table>
  </div>
  </div>
<br>
  <a href="user.php">HOME</a>

</body>

</html>

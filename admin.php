
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
.btn-success{
    background-color: yellow;
    width: 45%;
    border: none;
}
.btn-danger{
    background-color: red;
    width: 45%;
    border: none;
}
</style>
</head>
<body>
    




<h1>Welcome Admin Panel</h1>

<?php
include 'db_conn.php';
error_reporting(0);

global $result;

$query ="SELECT * FROM contact_form WHERE status = 'pending'";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

if($total !=0){
?> 
    <table border=3px>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Number</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        $cnt =1;
        while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
            <td>$cnt</td>
            <td>$result[name]</td>
            <td>$result[email]</td>
            <td>$result[number]</td>
            <td>$result[date]</td>
            <td><a href=\"updateStatusAccept.php?email={$result['email']}&number={$result['number']}\"><button class='btn-success' >Accept</button></a>
            <a href=\"updateStatusReject.php?email={$result['email']}&number={$result['number']}\"><button class='btn-danger' >Reject</button></a></td>
        </tr>";
        $cnt++;
    }
}
else{
    $message[] = 'No record!';
}
if(isset($message)){
    foreach($message as $message){
       echo '<div class="table">'.$message.'</div>';
    }
}
?>
</table><br>
<a href="logout.php">Logout</a>
</body>
</html>
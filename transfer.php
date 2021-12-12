
<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"jb_bank");
if(!$con){
    die("Connection failed");
} 


$flag=false;

if (isset($_POST['transfer']))
{
$sender=$_SESSION['sender'];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Bank Serivice</title>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<link rel="stylesheet" href="bootstrap.min.css">
<style>
body{
  background-color:#2b67f8;
}


</style>
</head>
   

<body>

  
	
</body>
</html>
<?php

$sql = "SELECT balance FROM user WHERE name='$sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
          while($row = $result->fetch_assoc()) {
 if($amount>$row["balance"] or $row["balance"]-$amount<100){
  $location='details.php?user='.$sender;
  header("Location: $location&message=transactionDenied");
 }
else{
    $sql = "UPDATE `user` SET balance=(balance-$amount) WHERE Name='$sender'";
    

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "Error in updating record: " . $conn->error;
}
 }
 
  }
} else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `user` SET balance=(balance+$amount) WHERE name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "Error in updating record: " . $con->error;
}
}
if($flag==true){
    $sql = "SELECT * from user where name='$sender'";
    $result = $con-> query($sql);
    while($row = $result->fetch_assoc())
      {
          $s_acc=$row['Acc_no'];
      }
//  Transcation details Stored in the DB

  $sql = "SELECT * from user where name='$receiver'";
  $result = $con-> query($sql);
  while($row = $result->fetch_assoc())
    {
      $r_acc=$row['Acc_no'];
    }        
    $sql = "INSERT INTO `transfer`(s_name,s_acc_no,r_name,r_acc_no,amount) VALUES ('$sender','$s_acc','$receiver','$r_acc','$amount')";
    if ($con->query($sql) === TRUE) {
    } else 
    {
      echo "Error updating record: " . $con->error;
    }
}

if($flag==true){
  echo "<script>alert('Money transferred successfully!'); window.location = 'customerlist.php';</script>";
}
?>
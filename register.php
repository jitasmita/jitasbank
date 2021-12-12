
<?php
     $insert=false; 
    if(isset($_POST['name'])){
    include 'config.php';
   
    $name=$_POST['name'];
    $Acc_no=$_POST['Acc_no'];
    $email_id=$_POST['email_id'];
    $balance=$_POST['balance'];
    $sql=" INSERT INTO `user` ( `name`,`Acc_no`, `email_id`, `balance`) VALUES ('$name', '$Acc_no', '$email_id', '$balance'); ";
   
    if($conn->query($sql)==true){
        echo "<script>alert('Customer added successfully!');window.location='customerlist.php'; </script>"; 
        $insert=true;

    }
    else{
        echo "ERROR:$sql<br>$conn->error";
    }
    $conn->close();

}
    ?>





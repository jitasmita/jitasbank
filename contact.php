<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jitasmita's Bank</title>
    <link rel="stylesheet" href="style_contact.css"> 
</head>

<body>
    <style>
        
*{
    margin: 0;
    padding: 0;
}
.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}
.icon{
    width: 200px;
    float: left;
    height: 70px;
}
.logo{
    color:rgb(255, 115, 35) ;
    font-size: 25px;
    font-family: Arial, Helvetica, sans-serif;
    padding-left: 20px;
    float: left;
    padding-top: 10px;
    margin-top: 18px; 

}
.menu{
    width: 400px;
    float: left;
    height: 70px;

}
ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}
ul li{
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;
}
ul li a{
    text-decoration: none;
    color: black;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}
ul li a:hover{
    color: rgb(255, 115, 35);
}

    </style>
    <?php
     $insert=false; 
    if(isset($_POST['name'])){
    include 'config.php';
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $feedback=$_POST['feedback'];
    $sql=" INSERT INTO `customers_feedback` ( `name`, `email`, `feedback`, `date`) VALUES ( '$name', '$email', '$feedback', current_timestamp()); ";
    
    if($conn->query($sql)==true){
       
        $insert=true;

    }
    else{
        echo "ERROR:$sql<br>$conn->error";
    }
    $conn->close();

}
    ?>
    <img class="bg" src="background.jpg" alt="">
     <div class="main">
        <div class="navbar">
            <div class="icon">
                <h3 class="logo">JitasBank</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="customerlist.php">Customer Details</a></li>
                    <li><a href="customerlist.php">Money Transfer</a></li>
                    <li><a href="transactions.php">Recent Transactions</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            
        </div> 

                <hr><br>
                <div class="container">
                    <h1>Add your feedbacks here</h2>
                    <p>Enter your feedbacks here to help us serve you better!</p>
                    <?php
                    if($insert==true){
                        echo "<p class='submitMsg'> Thanks for taking time in filling this form!</p>";
                    }
                    ?>
                    <form action="contact.php" method="post">
                    
                    <input type="text" name="name" id="name" placeholder="Enter name here">
                    <input type="email" name="email" id="email" placeholder="Enter email">
                    <textarea name="feedback" id="feedback" cols="30" rows="10" placeholder="Enter your feedback"></textarea>
                    <button class="btn" type="submit" name="submit">Submit</button>
                    
                    </form>
                  
                
                    
                </div>
        </div>
    </div>

</body>

</html>
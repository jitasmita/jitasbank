<!DOCTYPE html>
<html>
<head>
<title>Transaction history</title>

    <style>
         *{
                margin: 0;
                padding: 0;
            }
        table {
            border-collapse: collapse;
            width: 100%;
            color:black;
            font-size: 25px;
            text-align: center;
        }
        th {
            background-color:orange;
            color: white;
        }
        tr:nth-child(odd) {
            background-color:#ffe4b3;
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
</head>
   

<body>
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
        <hr>
    <div style="font-family: 'Arial';   font-size: 40px;
        text-align: center;
        margin: 20px;
    ">Transaction History</div>
    <table>
    <tr>
    <th>Sender's Name</th>
    <th>Sender's Account</th>
    <th>Reciever's Name</th>
    <th>Reciever's Account </th>
    <th>Amount</th>
   
    </tr>

    <?php
        // Connecting to the Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "jb_bank";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }


        $sql = "SELECT * FROM `transfer`";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display the rows returned by the sql query
        if($num> 0){
            

            // We can fetch in a better way using the while loop
            while($row = mysqli_fetch_assoc($result)){
                // echo var_dump($row);
                echo "<tr>";
                echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td>
                <td>" . $row["r_name"] . "</td><td>" . $row["r_acc_no"] . "</td><td>" . $row["amount"] . "</td><td>" . "</td>";
                echo "</tr>";
        }
        echo "</table>";
        }
    ?>
    </table>
    </body>
</html>
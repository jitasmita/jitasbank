<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
       
        <style>
            
            table {
            border-collapse: collapse;
            width: 100%;
            color: black;

            font-size: 25px;
            text-align: center;
            }

            th {
            background: orange;
            color: white;
            }

            tr:nth-child(even) {
            background-color: #ffe4b3 ;
            }

            .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            text-align: -webkit-center;
            }

            /* On mouse-over, add a deeper shadow */
            .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            }

            /* Add some padding inside the card container */
            .container {
            padding: 80px 50px;
            margin: 40px;
            background: #ffc14d;
            border:4px solid orange;
            border-radius:20px;
            }
            .transfer{
              
            color: white;
            background: #ff3333;
            padding: 10px 15px;
            font-size: 15px;
            border: 2px solid white;
            border-radius: 15px;
            cursor: pointer;
            transition: 0.3s ease-in;
            }
          .transfer:hover{
              background: rgb(255, 255, 255);
              color: green;
              border:2px solid green ;

            }

            }
        </style>
    </head>



    <body>

    <table>

        <tr>
        <th>Account Number</th>
        <th>Name</th>
        <th>Email</th>
        <th>Balance</th>
        </tr>

        <?php
        session_start();
        $server = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($server, $username, $password, "jb_bank");
        if (!$conn) {
        die("Connection failed");
        }

        $_SESSION['user'] = $_GET['user'];
        $_SESSION['sender'] = $_SESSION['user'];


        ?>
        <?php
        if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];

        $sql = "SELECT * FROM user WHERE name='$user'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";

            echo "<td>" . $row["Acc_no"] . "</td><td>" . $row["name"] . "</td>
                <td>" . $row["email_id"] ."</td><td>" . $row["balance"] . "</td>";

            echo "</tr>";
        }
        }
        ?>
        <div style="font-family: 'Arial', serif;   font-size: 40px; text-align: center;margin: 20px;">
            <h3>Transfer Money to a customer</h3>
        </div>

        <div class="card container">
            <?php
           
            if ($_GET['message'] == 'transactionDenied') {
                echo "<h3><p style='color:red;' class='messagehide'>Transaction Failed </p></h3>";
            }
            ?>
            <form action="transfer.php" method="POST">
                <!-- Make Transaction -->

                <b>To</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp
                <select name="reciever" id="dropdown" class="textbox" required>
                <option>Select Recipient</option>
                <?php
                $db = mysqli_connect("localhost", "root", "", "jb_bank");
                $res = mysqli_query($db, "SELECT * FROM user WHERE name!='$user'");
                while ($row = mysqli_fetch_array($res)) {
                    echo ("<option> " . "  " . $row['name'] . "</option>");
                }
                ?>
                </select>
                <br><br>
                <b> From</b>&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$user"; ?>'></input></span>
                <br><br>


                <b>Amount :&nbsp &#8377;</b>
                <input name="amount" type="number" min="100" class="textbox" required>
                <br><br>
                <a href="transfer.php"><button id="transfer" name="transfer" class="transfer" ;>Send Money</button></a>
            </form>
        </div>

        <div style="font-family: 'Gabriela', serif;   font-size: 40px; text-align: center; margin: 20px;">
            <h3>Customer Details</h3>
        </div>

    </body>
</html>
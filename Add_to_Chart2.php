<!DOCTYPE html>
<html>
    <head>
      <title>Add to Chart</title>

      <link rel="stylesheet" type="text/css" href="Style.css">

      <div class="topnav">

        <a href="Login.php">DashBoard</a>
        <a href="Product.php">Product</a>
        <a href="Trace_order.php">Trace my order</a>
        <a class="active" href="Add_Chart.php">Add to Chart</a>
        <a href="Delect_account.php">Delect Account</a>
        <a id="logout" href="Login.php">Log out</a>
       
      </div>
    </head>
    <body>
    <br>
    </body>
</html>
<?php


   $email = filter_input(INPUT_POST, 'email');
   //$contact = filter_input(INPUT_POST, 'contact');
   $pass = filter_input(INPUT_POST, 'pass');
   //$id=rand(1001,9999);

   $host = "localhost";
   $dbusername = "root";
   $dbpassword = "";
   $dbname = "e-commerce";
    
   $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

   if (mysqli_connect_error()){

        die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());

   }

    // Create connection
    $sql2 = "SELECT * FROM registration WHERE Email='$email' AND Password='$pass'";

    //echo $id2;

    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) >=1) {



    

    $sql2 = "SELECT * FROM add_to_chart WHERE Email='$email' AND Password='$pass'";

    //echo $id2;

    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) >=1) {

        //header( "Location: DashBoard.php" ); die;
        // $id = $_POST['contact'];
        $sql = "SELECT * FROM add_to_chart WHERE Email='$email' AND Password='$pass'";
        $result = mysqli_query($conn, $sql);
        $i=1;

        if (mysqli_num_rows($result) > 0) {

          echo "<h2>Product List</h2>";
            while($row = mysqli_fetch_assoc($result)) {
               

           

                echo " <br> Product Name: " . $row["Product_name"]. "<br> ";
                echo " Product ID: " . $row["Product_id"]. "<br> ";
                echo " Booking ID: " . $row["Booking_id"]. "<br> ";
                echo " Amount: " . $row["Amount"]. "<br> ";
                echo " Product Price: " . $row["Product_price"]. " tk<br> ";
                echo " Total Price: " . $row["Total_price"]. " tk<br> ";
                echo"<form method=\"post\" action=\"Confirm_buy.php\"><input type=\"submit\" name=\"buy$i\" value=\"Buy\" /></form<br>";
               
                $i++;
               



            }

        } 
        else {
            echo "No match! Please enter the right bill number";
        }

    }
    else{

        //echo '<script>alert("No product is available !")</script>'; 
        echo "<br><h2><font color=Red>No product is available !</h2></font>";
        //header("Location: Add_Chart.php"); 
        die();

    }
  }
  else{

    echo '<script>alert("Wrong Info !")</script>'; 

  }
  

?>

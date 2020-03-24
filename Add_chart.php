
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
    
    <center><font color="Red"><h1>Booster Outlet</h1></font></center>

    
    <br>
    <div class="">
       
      

       <form class="form-signin" method="post" action="Add_to_Chart2.php"> 

             <h2 class="form-signin-heading">For Confirmation</h2>

             <input type="text" class="form-control" name="email" placeholder="Email Address"       required="" autofocus="" />

             <br>
             <br>

             <input type="password" class="form-control" name="pass" placeholder="Password"       required=""/>

             <br>
             <br>      



             <input type="submit" value="Submit" name="searching">

             <input type="reset" value="Reset">
             
       </form>
       
   </div>
    </body>
</html>
<?php

if(isset($_POST['searching'])){

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
    $sql2 = "SELECT * FROM add_to_chart WHERE Email='$email' AND Password='$pass'";

    //echo $id2;

    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) >=1) {

        //header( "Location: DashBoard.php" ); die;
        // $id = $_POST['contact'];
        $sql = "SELECT * FROM add_to_chart WHERE Email='$email' AND Password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

          echo "<h2>Product List</h2>";
            while($row = mysqli_fetch_assoc($result)) {
               

           

                echo " <br> Product Name: " . $row["Product_name"]. "<br> ";
                echo " Product ID: " . $row["Product_id"]. "<br> ";
                echo " Product Price: " . $row["Product_price"]. "<br> ";
                echo " Amount: " . $row["Amount"]. "<br> ";
                echo " Total Price: " . $row["Total_price"]. "<br> ";
               



            }

        } 
        else {
            echo "No match! Please enter the right bill number";
        }

    }
    else{

        //echo '<script>alert("Wrong Info !")</script>'; 
        echo "<br><center><font color=Red>Wrong Info !</font></center>";
       // header("Location: two_step_verification2.php"); 
        die();

    }
    
  }

?>

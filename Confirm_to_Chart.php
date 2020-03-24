<?php

    echo"<center><font color=Red><h1>Product Details</font></h1></center>";
    $id=$_GET['id'];
    //echo"$id";
    
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
    $sql2 = "SELECT * FROM product WHERE ID='$id'";

    //echo $id2;

    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) ==1) {

        //header( "Location: DashBoard.php" ); die;
        // $id = $_POST['contact'];
        $sql = "SELECT * FROM product WHERE ID='$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
               

           

                echo " <br><center><b> Product Name:</b> " . $row["Product_name"]. "<br> ";
                echo " <b>Product ID: </b>" . $row["Product_id"]. "<br> ";
                echo " <b>Product Price:</b> " . $row["Product_price"]. "<br>";
                echo " <b>Available:</b> " . $row["Available"]. "<br></center> ";
               $save_name=$row["Product_name"];
               $save_id=$row["Product_id"];
               $save_price=$row["Product_price"];
               $save_available=$row["Available"];


            }

        } 
    }

?>
<!DOCTYPE html>
  <html>
    <head>

      <title>Confirm to Add Chart</title>
      <link rel="stylesheet" type="text/css" href="Style2.css">

    </head>
    <body>
   
      <br>

     
      <br>

      <div class="">
       
      

        <form class="form-signin" method="post" action=""> 

              <h2 class="form-signin-heading">Confirmation to Add Chart</h2>
              <br>
              <input type="number" class="form-control" name="amount" placeholder="Amount"       required="" autofocus="" />

              <br>
              <br>
              <input type="text" class="form-control" name="contact" placeholder="Contact no"       required="" autofocus="" />

              <br>
              <br>

              <input type="text" class="form-control" name="email" placeholder="Email Address"       required="" autofocus="" />

              <br>
              <br>

              <input type="password" class="form-control" name="pass" placeholder="Password"       required=""/>

              <br>
              <br>      

              <a href="Product.php">Back</a>

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
    $contact = filter_input(INPUT_POST, 'contact');
    $pass = filter_input(INPUT_POST, 'pass');
    $amount = filter_input(INPUT_POST, 'amount');
    $booking_id=rand(100001,999999);
   
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "e-commerce";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()){

    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
    }
    $id2 = $_POST['email'];
    $id3 = $_POST['pass'];
    $id4 = $_POST['contact'];
    $sql2 = "SELECT * FROM registration WHERE Email='$id2' AND Password='$id3' AND Contact='$id4'";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) !=1) {
      echo '<script>alert("Wrong info!")</script>'; 
     
      //echo"$save";
     // echo "<br><center><font color=Red>Email already registered!</font></center>";
      die();

    }
    else{
    // Create connection
    if( $amount<=$save_available && $amount>0){

        $save=$save_price*$amount;

    $sql = "INSERT INTO add_to_chart (Email , Contact , Password,Product_id,Product_name,Amount,Product_price,Total_price,Booking_id)
    values ('$email','$contact','$pass','$save_id','$save_name','$amount','$save_price','$save','$booking_id')";
    if ($conn->query($sql)){
        
        echo "<br><center><font color=Red>Congrats! Successfully added to your chart.Booking ID - $booking_id</font></center>";
        
    }
    else{
        echo "Error: ". $sql ."
        ". $conn->error;
    }
    }
    else{

        echo"<center>Not available this amount of product!</center>";

    }
    $conn->close();

    }


    }
    
?>
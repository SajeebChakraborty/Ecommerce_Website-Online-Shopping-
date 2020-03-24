<!DOCTYPE html>
  <html>
    <head>

      <title>Cash On Delivery</title>
      <link rel="stylesheet" type="text/css" href="Style2.css">

    </head>
    <body>
   
      <br>

     
      <br>

      <div class="">
       
      

        <form class="form-signin" method="post" action=""> 

              <h2 class="form-signin-heading">Cash On Delivery</h2>
              <br>
              <input type="text" class="form-control" name="product_id" placeholder="Product ID"       required="" autofocus="" />

              <br>
              <br>
              <input type="text" class="form-control" name="booking_id" placeholder="Booking ID"       required="" autofocus="" />

              <br>
              <br>
              <input type="number" class="form-control" name="amount" placeholder="Amount"       required="" autofocus="" />

              <br>
              <br>
              <input type="text" class="form-control" name="address" placeholder="Address"       required="" autofocus="" />

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

              <a href="Add_Chart.php">Back</a>

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


        $booking_id = filter_input(INPUT_POST, 'booking_id');
        $product_id = filter_input(INPUT_POST, 'product_id');
        $email = filter_input(INPUT_POST, 'email');
        $contact = filter_input(INPUT_POST, 'contact');
        $address = filter_input(INPUT_POST, 'address');
        $pass = filter_input(INPUT_POST, 'pass');
        $amount = filter_input(INPUT_POST, 'amount');
        $tnx=rand(100001,999999);
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
          if( $amount>0){

            
              $sql2 = "SELECT * FROM product WHERE Product_id='$product_id'";

              //echo $id2;
          
              $result = mysqli_query($conn, $sql2);
          
              if (mysqli_num_rows($result) >=1) {
          
                  //header( "Location: DashBoard.php" ); die;
                  // $id = $_POST['contact'];
                  $sql = "SELECT * FROM product WHERE Product_id='$product_id'";
                  $result = mysqli_query($conn, $sql);
          
                  if (mysqli_num_rows($result) > 0) {
          
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        
          
                    
          
                          
                        $save_name=$row["Product_name"];
                        $save_id=$row["Product_id"];
                        $save_price=$row["Product_price"];
                        $save_available=$row["Available"];
                        $save=$save_price*$amount;

          
                      }
          
                  } 
                  $sql2 = "SELECT * FROM add_to_chart WHERE Email='$email' AND Product_id='$product_id' AND Booking_id='$booking_id'";
                  //echo $id2;
                  $result = mysqli_query($conn, $sql2);
              
                  if (mysqli_num_rows($result) ==1) {
              
                    $sql="DELETE FROM add_to_chart Where Email='$email' AND Product_id='$product_id' AND Booking_id='$booking_id'";
              
                    if (mysqli_query($conn, $sql)) {
              
                      //echo '<meta http-equiv="refresh" content="1; URL=Login.php" />';
                      //echo "<br><br><center><font color=Red>Delect Account succssfully !</font></center";
                      //echo "Delect Account succssfully";
              
                    } 
                    else {
              
                      echo "Error delecting record: " . mysqli_error($conn);
              
                    }
              
              

                  $sql = "INSERT INTO buy (Email ,Address, Contact , Password,Product_id,Product_name,Amount,Product_price,Total_price,Tnx_number,Confirm)
                  values ('$email','$address','$contact','$pass','$save_id','$save_name','$amount','$save_price','$save','$tnx','NO')";
                  if ($conn->query($sql)){
                  
                      echo "<br><center><font color=Red>Congrats! Your order is completed.Tnx number - $tnx</font></center>";
                  
                  }
                  else{
                      echo "Error: ". $sql ."
                      ". $conn->error;
                  }
                  $amount2=$save_available-$amount;
                  $sql = "UPDATE product SET Available='$amount2' WHERE Product_id=$save_id";
                  if (mysqli_query($conn, $sql)) {
                      $c=1;
                      //echo "<br><center><font color=Red>Congrats! Amount of Product is successfully updated.</font></center>";

                  } 
                  else {
                      //echo "Error updating record: " . mysqli_error($conn);
                  }
                }
                else{

                  echo"<center>Wrong Booking ID !</center>";

                }
                  }
                  else{

                      echo"<center>Wrong product ID !</center>";

                  }
                
                  $conn->close();

                  //Finish amount check

          }
          else{

              echo"<center>Wrong product amount !</center>";

          }
        }
  }
    
?>
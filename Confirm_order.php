<!DOCTYPE html>
<html>
    <head>
      <title>Confirm Product</title>

      <link rel="stylesheet" type="text/css" href="Style2.css">

      <div class="topnav">

        <a href="Admin_Login.php">DashBoard</a>
        <a href="Add_Product.php">Add Product</a>
        <a href="Update_Product.php">Update Product</a>
        <a href="Delete_Product.php">Delete Product</a>
        <a class="active" href="Confirm_order.php">Confirm order</a>
        <a id="logout" href="Admin_Login.php">Log out</a>
       
      </div>

      <br>
    </head>
    <body>
      <br>
      <center><font color="Red"><h1>Booster Outlet</h1></font></center>
      <br>
      <div class="">
       
      

        <form class="form-signin" method="post" action=""> 

              <h2 class="form-signin-heading">Product Details</h2>

           

              <input type="text" class="form-control" name="product_id" placeholder="Product ID"       required=""/>

              <br>
              <br>  
              <input type="text" class="form-control" name="email" placeholder="Email Address"       required=""/>

              <br>
              <br>    
              <input type="number" class="form-control" name="tnx" placeholder="Tnx number"       required=""/>

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

 
  $product_id = filter_input(INPUT_POST, 'product_id');
  $email = filter_input(INPUT_POST, 'email');
  $tnx = filter_input(INPUT_POST, 'tnx');


  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "e-commerce";

  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

  if (mysqli_connect_error()){

    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
  }
  $c=0;
  // Create connection
  $id2 = $_POST['product_id'];
  $sql2 = "SELECT * FROM buy WHERE Product_id='$product_id' AND Email='$email' AND Tnx_number='$tnx'";
  $result = mysqli_query($conn, $sql2);
  if (mysqli_num_rows($result) > 0) {

   
    $sql = "UPDATE buy SET Confirm='YES' WHERE Product_id='$product_id' AND Email='$email' AND Tnx_number='$tnx'";
    if (mysqli_query($conn, $sql)) {
        $c=1;
        echo "<br><center><font color=Red>Congrats! Product is confirmed.</font></center>";

    } 
    else {
        //echo "Error updating record: " . mysqli_error($conn);
    }
  }
  else{


       echo "<br><center><font color=Red>Wrong Info !</font></center>";

  }
}

?>

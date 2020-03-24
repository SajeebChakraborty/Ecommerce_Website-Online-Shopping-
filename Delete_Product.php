<!DOCTYPE html>
<html>
    <head>
      <title>Delect Product</title>

      <link rel="stylesheet" type="text/css" href="Style.css">

      <div class="topnav">

        <a href="Admin_Login.php">DashBoard</a>
        <a href="Add_Product.php">Add Product</a>
        <a href="Update_Product.php">Update Product</a>
        <a class="active" href="Delete_Product.php">Delete Product</a>
        <a href="Confirm_order.php">Confirm order</a>
        <a id="logout" href="Admin_Login.php">Log out</a>
       
      </div>
    </head>
    <body>
    <br>

      <center><font color="Red"><h1>Booster Outlet</h1></font></center>

      <br>

      <div class="">

        <form class="form-signin" method="post" action=""> 

              <h2 class="form-signin-heading">Product Details</h2>

              <input type="text" class="form-control" name="product_id" placeholder="Product ID"       required="" autofocus="" />

              <br>
              <br>


              <input type="submit" value="Delect" name="searching">

              <input type="reset" value="Reset">

        </form>

    </div>
    </body>
</html>
<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "e-commerce";

  $product_id = filter_input(INPUT_POST, 'product_id');
  //$pass = filter_input(INPUT_POST, 'pass');

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

  }
  if(isset($_POST['searching'])){

    $product_id = $_POST['product_id'];
    //echo"$product_id";
    
    $sql2 = "SELECT * FROM product WHERE Product_id='$product_id'";
    //echo $id2;
    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) >=1) {

      $sql = "UPDATE product SET Available='0' WHERE Product_id=$product_id";
      if (mysqli_query($conn, $sql)) {
        
          echo "<br><center><font color=Red>Congrats! Product is successfully updated.</font></center>";

      } 
      else {
          //echo "Error updating record: " . mysqli_error($conn);
      }

    }
    else{

      echo "<br><br><center><font color=Red>Wrong Product ID !</font></center";

    }

  }

  mysqli_close($conn);
  
?>
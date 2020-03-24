<!DOCTYPE html>
<html>
    <head>
      <title>Add Product</title>

      <link rel="stylesheet" type="text/css" href="Style2.css">

      <div class="topnav">

        <a href="Admin_Login.php">DashBoard</a>
        <a class="active" href="Add_Product.php">Add Product</a>
        <a href="Update_Product.php">Update Product</a>
        <a href="Delete_Product.php">Delete Product</a>
        <a href="Confirm_order.php">Confirm order</a>
        <a id="logout" href="Admin_Login.php">Log out</a>
       
      </div>

      <br>
      <center><font color="Red"><h1>Booster Outlet</h1></font></center>
      <br>
      <div class="">
       
      

        <form class="form-signin" method="post" action=""> 

              <h2 class="form-signin-heading">Product Details</h2>

              <input type="text" class="form-control" name="product_name" placeholder="Product Name"       required="" autofocus="" />

              <br>
              <br>

              <input type="text" class="form-control" name="product_id" placeholder="Product ID"       required=""/>

              <br>
              <br>  
              <input type="number" class="form-control" name="product_price" placeholder="Product Price"       required=""/>

              <br>
              <br>    
              <input type="number" class="form-control" name="amount" placeholder="Amount"       required=""/>

              <br>
              <br>   


              <input type="submit" value="Submit" name="searching">

              <input type="reset" value="Reset">
              
        </form>
        
    </div>

    </head>
    <body>

    </body>
</html>
<?php
    if(isset($_POST['searching'])){

      $product_name = filter_input(INPUT_POST, 'product_name');
      $product_id = filter_input(INPUT_POST, 'product_id');
      $product_price = filter_input(INPUT_POST, 'product_price');
      $amount = filter_input(INPUT_POST, 'amount');
    

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
      $sql2 = "SELECT * FROM product WHERE Product_id='$id2'";
      $result = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result) > 0) {

       
      
            echo "<br><center><font color=Red>Product ID already existed !</font></center>";

        

      }
      else{
      

        $sql = "INSERT INTO product (Product_id,Product_name,Product_price,Available)
        values ('$product_id','$product_name','$product_price','$amount')";
        if ($conn->query($sql)){
            
            echo "<br><center><font color=Red>Congrats! Product successfully added.</font></center>";
          
        }
        else{
            echo "Error: ". $sql ."
            ". $conn->error;
        }
    }
        $conn->close();


    

    }
?>
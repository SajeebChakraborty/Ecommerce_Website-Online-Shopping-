<!DOCTYPE html>
<html>
    <head>
      <title>Trace my order</title>

      <link rel="stylesheet" type="text/css" href="Style.css">

      <div class="topnav">

        <a href="Login.php">DashBoard</a>
        <a href="Product.php">Product</a>
        <a class="active" href="Trace_order.php">Trace my order</a>
        <a href="Add_Chart.php">Add to Chart</a>
        <a href="Delect_account.php">Delect Account</a>
        <a id="logout" href="Login.php">Log out</a>
       
      </div>
    </head>
    <body>
    <br>

      <center><font color="Red"><h1>Booster Outlet</h1></font></center>

      <br>

      <div class="">

        <form class="form-signin" method="post" action=""> 

              <h2 class="form-signin-heading">Trace my order</h2>

              <input type="text" class="form-control" name="product_id" placeholder="Product ID"       required="" autofocus="" />

              <br>
              <br>
              <input type="text" class="form-control" name="contact" placeholder="Contact no"       required="" autofocus="" />

              <br>
              <br>
              <input type="text" class="form-control" name="tnx" placeholder="Tnx number"       required="" autofocus="" />

              <br>
              <br>

              <input type="submit" value="Trace" name="searching">

              <input type="reset" value="Reset">

        </form>

    </div>
    </body>
</html>
<?php

  
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "e-commerce";
if(isset($_POST['searching'])){

$contact = filter_input(INPUT_POST, 'contact');
$tnx = filter_input(INPUT_POST, 'tnx');
$product_id = filter_input(INPUT_POST, 'product_id');
 
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){

     die('Connect Error ('. mysqli_connect_errno() .') '
     . mysqli_connect_error());

}

 // Create connection
 $sql2 = "SELECT * FROM buy WHERE Contact='$contact' AND Product_id='$product_id' AND Tnx_number='$tnx'";

 //echo $id2;

 $result = mysqli_query($conn, $sql2);

 if (mysqli_num_rows($result) ==1) {

     //header( "Location: DashBoard.php" ); die;
     // $id = $_POST['contact'];
     $sql = "SELECT * FROM buy WHERE Contact='$contact' AND Product_id='$product_id' AND Tnx_number='$tnx'";
     $result = mysqli_query($conn, $sql);
     $i=1;
     //$save = array();

     if (mysqli_num_rows($result) > 0) {

         // output data of each row
         while($row = mysqli_fetch_assoc($result)) {
            
            if($row["Confirm"]=="NO"){

              echo "<br><br><center><font color=Red>Your product is confirmed to our store.After somedays,it will be packed !</font></center> ";

            }
            else{

              echo "<br><br><center><font color=Red>Your product is ready to go your home !</font></center> ";


            }
        

            
           
            
             //$save[i]=$row["Product_id"];
            // echo" $save[i]";
             $i++;
           
            



         }
         

     } 
     else {
         echo "No match! Please enter the right bill number";
     }

 }
 else{

  echo "<br><br>s<center><font color=Red>Wrong Info !</font></center> ";

 }
}

?>
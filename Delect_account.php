<!DOCTYPE html>
<html>
    <head>
      <title>Delect Account</title>

      <link rel="stylesheet" type="text/css" href="Style.css">

      <div class="topnav">

        <a href="Login.php">DashBoard</a>
        <a href="Product.php">Product</a>
        <a href="Trace_order.php">Trace my order</a>
        <a href="Add_Chart.php">Add to Chart</a>
        <a class="active" href="Delect_account.php">Delect Account</a>
        <a id="logout" href="Login.php">Log out</a>
       
      </div>
    </head>
    <body>
    <br>

      <center><font color="Red"><h1>Booster Outlet</h1></font></center>

      <br>

      <div class="">

        <form class="form-signin" method="post" action=""> 

              <h2 class="form-signin-heading">For Confirmation</h2>

              <input type="text" class="form-control" name="email" placeholder="Email Address"       required="" autofocus="" />

              <br>
              <br>

              <input type="password" class="form-control" name="pass" placeholder="Password"       required=""/>

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

  $email = filter_input(INPUT_POST, 'email');
  $pass = filter_input(INPUT_POST, 'pass');

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

  }
  if(isset($_POST['searching'])){

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql2 = "SELECT * FROM registration WHERE Email='$email' AND Password='$pass'";
    //echo $id2;
    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) >=1) {

      $sql2 = "SELECT * FROM add_to_chart WHERE Email='$email' AND Password='$pass'";
      //echo $id2;
      $result = mysqli_query($conn, $sql2);
  
      if (mysqli_num_rows($result) >=1) {
  
        $sql="DELETE FROM add_to_chart Where Email='$email' AND Password='$pass'";
  
        if (mysqli_query($conn, $sql)) {
  
         // echo '<meta http-equiv="refresh" content="1; URL=Login.php" />';
          //echo "<br><br><center><font color=Red>Delect Account succssfully !</font></center";
          //echo "Delect Account succssfully";
  
        } 
        else {
  
          echo "Error delecting record: " . mysqli_error($conn);
  
        }
  
      }
      else{
  
        //echo "<br><br><center><font color=Red>Wrong username or password !</font></center";
  
      }
      $sql2 = "SELECT * FROM buy WHERE Email='$email' AND Password='$pass'";
      //echo $id2;
      $result = mysqli_query($conn, $sql2);
  
      if (mysqli_num_rows($result) >=1) {
  
        $sql="DELETE FROM buy Where Email='$email' AND Password='$pass'";
  
        if (mysqli_query($conn, $sql)) {
  
         // echo '<meta http-equiv="refresh" content="1; URL=Login.php" />';
          //echo "<br><br><center><font color=Red>Delect Account succssfully !</font></center";
          //echo "Delect Account succssfully";
  
        } 
        else {
  
          echo "Error delecting record: " . mysqli_error($conn);
  
        }
  
      }
      else{
  
        //echo "<br><br><center><font color=Red>Wrong username or password !</font></center";
  
      }
  

      $sql="DELETE FROM registration Where Email='$email' AND Password='$pass'";

      if (mysqli_query($conn, $sql)) {

        echo '<meta http-equiv="refresh" content="1; URL=Login.php" />';
  	    echo "<br><br><center><font color=Red>Delect Account succssfully !</font></center";
        //echo "Delect Account succssfully";

      } 
      else {

        echo "Error delecting record: " . mysqli_error($conn);

      }

    }
    else{

      echo "<br><br><center><font color=Red>Wrong username or password !</font></center";

    }

  }

  mysqli_close($conn);
  
?>
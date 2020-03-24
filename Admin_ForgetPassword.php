<!DOCTYPE html>
  <html>
    <head>

      <title>Forget Password</title>
      <link rel="stylesheet" type="text/css" href="Style.css">

    </head>
    <body>
    <div class="topnav">
          
          <a href="Login.php">Customer Section</a>
          <a class="active" href="Admin_Login.php">Admin Panel</a>
          <a href="Contact_us.php">Contact us</a>
  
    </div>
      <br>

      <center><font color="Red"><h1>Booster Outlet</h1></font></center>

      <br>

      <div class="">

        <form class="form-signin" method="post" action=""> 

              <h2 class="form-signin-heading">Forget Password</h2>

              <input type="text" class="form-control" name="name" placeholder="Full Name"       required="" autofocus="" />

              <br>
              <br>

              <input type="text" class="form-control" name="email" placeholder="Email Address"       required="" autofocus="" />

              <br>
              <br>

              <input type="text" class="form-control" name="contact" placeholder="Contact no"       required=""/>

              <br>
              <br>      

              <a href="Admin_Login.php">Back </a>

              <br>
              <br>

              <input type="submit" value="Submit" name="searching">
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
   //$name = filter_input(INPUT_POST, 'name');
   // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
   // Check connection
  if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

  }
  if(isset($_POST['searching'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql2 = "SELECT * FROM admin_registration WHERE Name='$name' AND Email='$email' AND Contact='$contact'";
    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) ==1) {

        while($row = mysqli_fetch_assoc($result)) {

            echo " <center><font color=Red><h2><br> Password: " . $row["Password"]. "<br></h2></font> </center>";

        }
               

    }
    else{

      echo "<br><br><center><font color=Red>Wrong information !</font></center";
      die();

    }

  }
 ?>
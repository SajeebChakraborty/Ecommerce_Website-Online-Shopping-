<!DOCTYPE html>
  <html>
    <head>

      <title>Home</title>
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
       
      

        <form class="form-signin" method="post" action="Admin_DashBoard.php"> 

              <h2 class="form-signin-heading">Sign in</h2>

              <input type="text" class="form-control" name="email" placeholder="Email Address"       required="" autofocus="" />

              <br>
              <br>

              <input type="password" class="form-control" name="pass" placeholder="Password"       required=""/>

              <br>
              <br>      

              <a href="Admin_Register.php">Register here?</a>
              &nbsp;&nbsp; 
              
              <a href="Admin_ForgetPassword.php"> Forget Password? </a>

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

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass = filter_input(INPUT_POST, 'pass');

    $sql2 = "SELECT * FROM registration WHERE Email='$email' AND Password='$pass'";
    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) ==1) {

      header("Location: DashBoard.php?email=".$email);
      die();

    }
    else{

      echo "<br><br><center><font color=Red>Wrong username or password !</font></center";
      die();

    }

  }
 ?>
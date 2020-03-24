<!DOCTYPE html>
  <html>
    <head>

      <title>Register</title>
      <link rel="stylesheet" type="text/css" href="Style.css">

    </head>
    <body>
        <div class="topnav">
          
          <a class="active" href="Login.php">Customer Section</a>
          <a href="Admin_Login.php">Admin Panel</a>
          <a href="Contact_us.php">Contact us</a>
  
    </div>

      <br>
      

      <div class="">
        <form class="form-signin" method="post" action="">  

          <h2 class="form-signin-heading">Sign up</h2>

          <input type="text" class="form-control" name="name" placeholder="Full Name" required="" autofocus="" />

          <br>
          <br>

          <input type="text" class="form-control" name="Father_name" placeholder="Father Name" required="" autofocus="" />

          <br>
          <br>

          <input type="text" class="form-control" name="Mother_name" placeholder="Mother Name" required="" autofocus="" />

          <br>
          <br>

          <input type="text" class="form-control" name="NID" placeholder="NID" required="" autofocus="" />

          <br>
          <br>

          <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />

          <br>
          <br>

          <input type="text" class="form-control" name="contact" placeholder="Contact no" required="" autofocus="" />

          <br>
          <br>

          <input type="text" class="form-control" name="birth" placeholder="Birth date" required="" autofocus="" />

          <br>
          <br>

          <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>

          <br>
          <br>  
                
          <a href="Login.php">Already a member? </a>

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

      $name = filter_input(INPUT_POST, 'name');
      $Father_name = filter_input(INPUT_POST, 'Father_name');
      $Mother_name = filter_input(INPUT_POST, 'Mother_name');
      $NID = filter_input(INPUT_POST, 'NID');
      $email = filter_input(INPUT_POST, 'email');
      $contact = filter_input(INPUT_POST, 'contact');
      $birth = filter_input(INPUT_POST, 'birth');
      $pass = filter_input(INPUT_POST, 'pass');
      $id=rand(100000001,999999999);

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
      $id2 = $_POST['email'];
      $sql2 = "SELECT * FROM registration WHERE Email='$id2'";
      $result = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Email already registered!")</script>'; 
       // echo "<br><center><font color=Red>Email already registered!</font></center>";
        die();

      }
      $id2 = $_POST['contact'];
      $sql2 = "SELECT * FROM registration WHERE Contact='$id2'";
      $result = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Contact no already registered!")</script>'; 
          //echo "<br><center><font color=Red>Contact no already registered!</font></center>";
          die();

      }
      else{

        $sql = "INSERT INTO registration (Account_no,Name,Father_name,Mother_name,NID, Email , Contact , Birth_Date , Password,Price,Product_id)
        values ('$id','$name','$Father_name','$Mother_name','$NID','$email','$contact','$birth','$pass','0.00','N/A')";
        if ($conn->query($sql)){
            
            echo "<br><center><font color=Red>Congrats! Registration is complete! and your Account no is $id . <a href=Login.php>Now Login here </a></font></center>";
          
        }
        else{
            echo "Error: ". $sql ."
            ". $conn->error;
        }
        $conn->close();


      }

    }
?>

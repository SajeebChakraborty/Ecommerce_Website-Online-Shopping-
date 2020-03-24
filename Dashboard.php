<?php

   $email = filter_input(INPUT_POST, 'email');
   //$contact = filter_input(INPUT_POST, 'contact');
   $pass = filter_input(INPUT_POST, 'pass');
   //$id=rand(1001,9999);

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
    $sql2 = "SELECT * FROM registration WHERE Email='$email' AND Password='$pass'";

    //echo $id2;
    $id="001";
    //echo 'User Real IP - '.getUserIpAddr();
    //whether ip is from share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
    {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
    {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from remote address
    else
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }


    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) ==1) {

      
      

    }
    else{

        echo '<script>alert("Wrong username or password")</script>'; 
        echo '<meta http-equiv="refresh" content="1; URL=Login.php" />';
        die();
    }
   


  


?>
<!DOCTYPE html>
<html>
    <head>
      <title>DashBoard</title>

      <link rel="stylesheet" type="text/css" href="Style.css">

      <div class="topnav">

        <a class="active" href="Login.php">DashBoard</a>
        <a href="Product.php">Product</a>
        <a href="Trace_order.php">Trace my order</a>
        <a href="Add_Chart.php">Add to Chart</a>
        <a href="Delect_account.php">Delect Account</a>
        <a id="logout" href="Login.php">Log out</a>
       
      </div>

      <br>

      <marquee <font color="Red" behavior="alternate" direction="left" bgcolor-"Red">Welcome to Our E-Commerce Website! Our system is working 24 hours </font></marquee>

      <center><h1>Booster Outlet</h1></center>

      <br>

    </head>
    <body>

    </body>
</html>
<?php

   $email = filter_input(INPUT_POST, 'email');
   //$contact = filter_input(INPUT_POST, 'contact');
   $pass = filter_input(INPUT_POST, 'pass');
   //$id=rand(1001,9999);

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
    $sql2 = "SELECT * FROM registration WHERE Email='$email' AND Password='$pass'";

    //echo $id2;

    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) ==1) {

        //header( "Location: DashBoard.php" ); die;
        // $id = $_POST['contact'];
        $sql = "SELECT * FROM registration WHERE Email='$email' AND Password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
               

           

                echo " <h3><br> Name: " . $row["Name"]. "<br> ";
                echo " Account no: " . $row["Account_no"]. "<br> ";
                echo " Father Name: " . $row["Father_name"]. "<br> ";
                echo " Mother Name: " . $row["Mother_name"]. "<br> ";
                echo " NID: " . $row["NID"]. "<br> ";
                echo "   Birth Date: " . $row["Birth_Date"]. "<br>";
                echo "   Contact no: " . $row["Contact"]. "<br>";
                echo "  Email: " . $row["Email"]. "<br><br></h3>";



            }

        } 
        else {
            echo "No match! Please enter the right bill number";
        }

    }
    else{

        //echo '<script>alert("Wrong mobile number")</script>'; 
       // header("Location: two_step_verification2.php"); 
        die();

    }

?>
<!DOCTYPE html>
<html>
  <head>

    <title></title>

  </head>
  <body>

    <center>
        
        <br>
        <br>
        <br>
        <i><p> POWERED BY </p></i>
        <b><p>Sajeeb Chakraborty </p></b>

    </CENTER>
    


  </body>
</html>
<?php
//echo 'User IP - '.$_SERVER['REMOTE_ADDR'];
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


?>
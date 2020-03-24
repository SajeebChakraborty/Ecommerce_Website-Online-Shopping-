<!DOCTYPE html>
<html>
    <head>
      <title>Product</title>

      <link rel="stylesheet" type="text/css" href="Style.css">

      <div class="topnav">

        <a href="Login.php">DashBoard</a>
        <a class="active" href="Product.php">Product</a>
        <a href="Trace_order.php">Trace my order</a>
        <a href="Add_Chart.php">Add to Chart</a>
        <a href="Delect_account.php">Delect Account</a>
        <a id="logout" href="Login.php">Log out</a>
       
      </div>
    </head>
    <body>
    
    <h2>Product List</h2>


    </body>
</html>
<?php

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
 $sql2 = "SELECT * FROM product";

 //echo $id2;

 $result = mysqli_query($conn, $sql2);

 if (mysqli_num_rows($result) >=1) {

     //header( "Location: DashBoard.php" ); die;
     // $id = $_POST['contact'];
     $sql = "SELECT * FROM product";
     $result = mysqli_query($conn, $sql);
     $i=1;
     //$save = array();

     if (mysqli_num_rows($result) > 0) {

         // output data of each row
         while($row = mysqli_fetch_assoc($result)) {
            

        

             echo " <br> Product Name: " . $row["Product_name"]. "<br> ";
             echo " Product ID: " . $row["Product_id"]. "<br> ";
             echo " Price: " . $row["Product_price"]. " tk ";
             
             if($row["Available"]>0){
                echo "<br> Available: " . $row["Available"]. "<br> ";
                echo"<form method=\"post\" action=\"\"><input type=\"submit\" name=\"add$i\" value=\"Add to Chart\" /></form";
                echo"<form method=\"post\" action=\"\"><input type=\"submit\" name=\"buy$i\" value=\"Buy\" /></form<br>";
             }
             else{

                echo "<br><br><font color=Red>Opps! No Available this product</font><br>";

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

     //echo '<script>alert("Wrong mobile number")</script>'; 
    // header("Location: two_step_verification2.php"); 
     die();

 }
 if(isset($_POST['add1'])){

    $id=1;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add2'])){

    $id=2;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add3'])){

    $id=3;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add4'])){

    $id=4;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add5'])){

    $id=5;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add6'])){

    $id=6;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add7'])){

    $id=7;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add8'])){

    $id=8;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add9'])){

    $id=9;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add10'])){

    $id=10;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add11'])){

    $id=11;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add12'])){

    $id=12;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add13'])){

    $id=13;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add14'])){

    $id=14;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add15'])){

    $id=15;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add16'])){

    $id=16;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add17'])){

    $id=17;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add18'])){

    $id=18;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add19'])){

    $id=19;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['add20'])){

    $id=20;

    header("Location:Confirm_to_Chart.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy1'])){

    $id=1;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy2'])){

    $id=2;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy3'])){

    $id=3;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy4'])){

    $id=4;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy5'])){

    $id=5;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy6'])){

    $id=6;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy7'])){

    $id=7;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy8'])){

    $id=8;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy9'])){

    $id=9;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy10'])){

    $id=10;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy11'])){

    $id=11;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy12'])){

    $id=12;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy13'])){

    $id=13;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy14'])){

    $id=14;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy15'])){

    $id=15;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy16'])){

    $id=16;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy17'])){

    $id=17;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 
 if(isset($_POST['buy18'])){

    $id=18;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy19'])){

    $id=19;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 if(isset($_POST['buy20'])){

    $id=20;
    echo"<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"$id\" value=\"$id\" /></form<br>";
    // $id = $_POST['contact'];
   // $id = $_POST['id'];


    header("Location:Buy.php?id=".$id);
    //echo '<script>alert("Wrong mobile number")</script>';


 }
 
 

?>

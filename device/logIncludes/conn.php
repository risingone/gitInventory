<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "inventory";

    mysqli_report(MYSQLI_REPORT_OFF);
   // Create a connection
   $conn = @mysqli_connect($servername, $username, $password, $database);

   // Die if connection was not successful
   if (!$conn){
       die("Sorry we failed to connect: ". mysqli_connect_error());
   }
   // insert new employee data
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset( $_POST['devID'])){
      // Check Devices Assigned
        $id = $_POST['devID'];
    } 
   }
?>
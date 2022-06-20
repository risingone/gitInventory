<?php
    $insert = false;
    $update = false;
    $delete = false;
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
    if(isset( $_POST['panEdit'] )){
      // Update the record
      $pan = $_POST['panEdit'];
      $name = $_POST['nameEdit'];
      $role = $_POST['roleEdit'];
      $mail = $_POST['mailEdit'];
      $mobile = $_POST['mobileEdit'];
      $sql = "UPDATE `employee` SET `name` = '$name', `role` = '$role', `mail` = '$mail', `mobile` = '$mobile' WHERE `employee`.`pan` = '$pan'";
      $res = mysqli_query($conn, $sql);
      if($res){
        $update = true;
      } else{
        echo "We failed to update the record! <br>";
      }
    }else if(isset( $_POST['panDelete'] )){
        // Delete the record
        $pan = $_POST['panDelete'];
        $sql = "UPDATE `employee` SET `resigning` = current_timestamp() WHERE `employee`.`pan` = '$pan'";
  
        $res = mysqli_query($conn, $sql);
        if($res){
          $delete = true;
        } else{
          echo "We failed to delete the record! <br>";
        }
    } else{
        $pan = $_POST['pan'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $mail = $_POST['mail'];
        $mobile = $_POST['mobile'];
      $sql = "INSERT INTO `employee` (`pan`, `name`, `role`, `mail`, `mobile`) VALUES ('$pan', '$name', '$role', '$mail', '$mobile')";

      $res = mysqli_query($conn, $sql);

      // add a new employee to the employee table
      if($res){
         $insert = true;
      }
      else{
         echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      }
    }
   }
?>
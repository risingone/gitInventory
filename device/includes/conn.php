<?php
    $insert = false;
    $update = false;
    $delete = false;
    $assign = false;
    $retrieve = false;
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
    if(isset( $_POST['idEdit'] )){
      // Update the record
      $id = $_POST['idEdit'];
      $type = $_POST['typeEdit'];
      $brand = $_POST['brandEdit'];
      $os = $_POST['osEdit'];
      $sql = "UPDATE `devices` SET `type` = '$type', `brand` = '$brand', `os` = '$os' WHERE `devices`.`id` = '$id'";
      
      $res = mysqli_query($conn, $sql);
      if($res){
        $update = true;
      } else{
        echo "We failed to update the record! <br>";
      }
    }else if(isset( $_POST['idDelete'] )){
        // Delete the record
        $id = $_POST['idDelete'];
        $sql = "DELETE FROM `devices` WHERE `devices`.`id` = '$id'";
        
        $res = mysqli_query($conn, $sql);
        if($res){
          $delete = true;
        } else{
          echo "We failed to delete the record! <br>";
        }
    } else if(isset( $_POST['idAssign'] )){
      // Delete the record
      $id = $_POST['idAssign'];
      $empId = $_POST['empId'];
      $sql = "UPDATE `devices` SET `pan` = '$empId' WHERE `devices`.`id` = '$id'";
      
      $res = mysqli_query($conn, $sql);
      if($res){
        $assign = true;
      } else{
        echo "Sorry! We failed to assign the device! <br>";
      }
    }else if(isset( $_POST['idRetrieve'] )){
      // Delete the record
      $id = $_POST['idRetrieve'];
      $sql = "UPDATE `devices` SET `pan` = NULL WHERE `devices`.`id` = '$id'";
      
      $res = mysqli_query($conn, $sql);
      if($res){
        $retrieve = true;
      } else{
        echo "Sorry! We failed to assign the device! <br>";
      }
    } else{
      $id = $_POST['id'];
      $type = $_POST['type'];
      $brand = $_POST['brand'];
      $os = $_POST['os'];
    $sql = "INSERT INTO `devices` (`id`, `type`, `brand`, `os`) VALUES ('$id', '$type', '$brand', '$os')";

    $res = mysqli_query($conn, $sql);

    // add a new device to the device table
    if($res){
       $insert = true;
    }
    else{
       echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
    }
    }
   }
?>
<?php
    $check=false;
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
    if(isset( $_POST['empID'])){
        $id = $_POST['empID'];
        $check=true;
    }else if(isset( $_POST['idEdit'] )){
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
      $sql2 = "INSERT INTO `log` (`id`, `action`, `pan`, `time`) VALUES ('$id', 'assigned', '$empId', current_timestamp())";
      $res = mysqli_query($conn, $sql);
      $res2 = mysqli_query($conn, $sql2);
      if($res&&$res2){
        $assign = true;
      } else{
        echo "Sorry! We failed to assign the device! <br>";
      }
    }else if(isset( $_POST['idRetrieve'] )){
      // Delete the record
      $id = $_POST['idRetrieve'];
      $sql0 = "SELECT * FROM `devices` WHERE `devices`.`id` = '$id'";
      $result = mysqli_query($conn, $sql0);
      if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
          $row = mysqli_fetch_assoc($result);
          // echo $row['pan'] ;
          $empId = $row['pan'];
        }
        // echo $empId;
        $sql = "UPDATE `devices` SET `pan` = NULL WHERE `devices`.`id` = '$id'";
        $sql2 = "INSERT INTO `log` (`id`, `action`, `pan`, `time`) VALUES ('$id', 'retrieved', '$empId', current_timestamp())";
        $res = mysqli_query($conn, $sql);
        $res2 = mysqli_query($conn, $sql2);
        if($res&&$res2){
          $retrieve = true;
        } else{
          echo "Sorry! We failed to retrieve the device! <br>";
        }
      } else{
        echo "Sorry! We failed to retrieve the device! <br>";
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
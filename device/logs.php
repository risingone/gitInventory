<?php 
    include('logIncludes/conn.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>
     <?php
     echo "<h3>History of Device ". $id ."</h3>";
     ?>
     <!-- Table -->
     <div class="container my-4">
    <table class="table" id="logTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Action</th>
          <th scope="col">Employee Id</th>
          <th scope="col">Date & Time</th>
        </tr>
      </thead>
      <tbody>
      <?php 
            $sql = "SELECT * FROM `log` WHERE `log`.`id` = '$id'";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            while($row = mysqli_fetch_assoc($result)){
              $sno=$sno+1;
              echo "<tr>
              <th scope='row'>". $sno ."</th>
              <td>". $row['action'] ."</td>
              <td>". $row['pan'] ."</td>
              <td>". $row['time'] ."</td>
              </tr>";
            }
        ?>
      </tbody> 
    </table>
  </div>
  <hr>
<?php 
    include('logIncludes/scripts.php');
    include('includes/footer.php');
?>  
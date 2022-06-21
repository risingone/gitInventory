
<?php 
    include('includes/conn.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>  

<?php
    if($insert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> The device has been inserted succesfully!.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else if($update){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> The device has been updated succesfully!.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else if($delete){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> The device has been deleted succesfully!.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else if($assign){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> The device has been assigned succesfully!.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else if($retrieve){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> The device has been retrieved succesfully!.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } 
  ?>
  <?php
    include('includes/modal.php');
  ?>
    
  <!-- Table -->
  <button class="add btn btn-primary">Add Device</button>
  <div class="container my-4">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <!-- <th scope="col">PanCard No</th> -->
          <th scope="col">Id</th>
          <th scope="col">Type</th>
          <th scope="col">Brand</th>
          <th scope="col">OS</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php 
            $sql = "SELECT * FROM `devices`";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            while($row = mysqli_fetch_assoc($result)){
              $sno=$sno+1;
              $status="Available";
              $operation="Assign";
              if($row['pan']!=null){
                $status="Assigned";
                $operation="Retrieve";
              }
              echo "<tr>
              <th scope='row'>". $sno ."</th>
              <td>". $row['id'] ."</td>
              <td>". $row['type'] ."</td>
              <td>". $row['brand'] ."</td>
              <td>". $row['os'] ."</td>
              <td>".   $status    ."</td>
              <td> <button class='edit btn btn-sm btn-primary' >Edit</button> <button class='delete btn btn-sm btn-primary' id=d". $row['id'] .">Delete</button> <button class='operation btn btn-sm btn-primary' id=". $row['id'] .">". $operation. "</button> </td>
              </tr>";
            }
        ?>
      </tbody>
    </table>
  </div>
  <hr>
  <?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
<?php
    $showAlert=false;
    $showError=false;
    $login=false;
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

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['action']==="register"){
        $err="";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // Check whether this username exists
        $existsSql = "SELECT * FROM `users` WHERE username='$username'";
        $result = mysqli_query($conn, $existsSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows>0){
          $exists = true;
        } else{
          $exists=false;
        }
        if($password === $cpassword && $exists===false){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
            }
        } else if($exists){
          $showError="username already exists!";
        }
        else{
            $showError="Passwords do not match!";
        }
    } else if($_POST['action']==="login"){
      $err="";
      $username = $_POST['lusername'];
      $password = $_POST['lpassword'];
      $sql = "SELECT * FROM `users` WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if($num==1){
        while($row=mysqli_fetch_assoc($result)){
           if(password_verify($password, $row['password'])){
                $login=true;
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$username;
                header("location: index.php");
                exit;
           } else{
                $showError = "Invalid Credentials";
           }
        }
      } else{
          $showError = "Invalid Credentials";
      }
   }
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <?php
    if($login){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your are logged in!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  ?>
  <?php
    if($showAlert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your account is now created and you can log in!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  ?>
  <?php
    if($showError){
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Error!</strong> " . $showError . " 
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  ?>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="/gitInventory/login.php" method="POST" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="./img/logo.png" alt="easyclass" />
                <h4>Pinaack</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
              <input type="hidden" name="action" value="login">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    name="lusername"
                    id="lusername"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    name="lpassword"
                    id="lpassword"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" />

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="/gitInventory/login.php" method="post" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="./img/logo.png" alt="easyclass" />
                <h4>Pinaack</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>
            
              <div class="actual-form">
                <input type="hidden" name="action" value="register">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    name="username"
                    id="username"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Username</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    name="password"
                    id="password"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    name="cpassword"
                    id="cpassword"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Confirm Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/image1.png" class="image img-1 show" alt="" />
              <img src="./img/image2.png" class="image img-2" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
               
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
<?php

  include("../includes/db_connection.php");
  include("../includes/functions.php");

  $errorMessage = "";



  if(isset($_POST['btnSubmit'])){
    $username = sanitize_data($_POST['txtUsername']);
    $email = sanitize_data($_POST['txtEmail']);
    // $admin_level = sanitize_data($_POST['ddlLevel']);
    $password = sanitize_data($_POST['txtPassword']);


    // validate length
    if(strlen($username) < 5 ){
      $errorMessage = '<div class="alert alert-danger" role="alert">
                          <strong>Username must be more than 5 characters</strong>
                        </div>';
    }else{

      // Check username duplicate
      $sql = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);
      
      if(mysqli_num_rows($result) > 0){
        $errorMessage = '<div class="alert alert-danger" role="alert">
                      <strong>'.$username.' </strong> already exists, please choose a new username
                    </div>';
      }else{
        // Check username duplicate
          $sql = "SELECT * FROM users WHERE email = '$email'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            $errorMessage = '<div class="alert alert-danger" role="alert">
                              <strong>'.$email.' </strong> already exists, please choose a new email
                            </div>';
          }else{
            // hash user's password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$hashed_password')";

            $result = mysqli_query($conn, $sql);
            if(!$result){
              die("Could not create user ". mysqli_error($conn));
            }else{
              header("Location: login.php?signup=success");
            }
          }
        }

      
    }


  }





?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signup Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css" <!-- End layout styles -->
    <link rel="shortcut icon" href="./images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="./images/logo.svg">
                </div>

                <?=$errorMessage ?>

                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form action="signup.php" method="POST" class="pt-3">
                  <div class="form-group">
                    <input type="text" name="txtUsername" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="email" name="txtEmail" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required>
                  </div>
                  <!-- <div class="form-group">
                    <select class="form-control form-control-lg" name="ddlLevel" id="exampleFormControlSelect2">
                      <option value="2">Admin Level</option>
                      <option value="2">Regular Admin</option>
                      <option value="1">Super Admin</option>
                    </select>
                  </div> -->
                  <div class="form-group">
                    <input type="password" name="txtPassword" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" required> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="btnSubmit">SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.html" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./js/off-canvas.js"></script>
    <script src="./js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
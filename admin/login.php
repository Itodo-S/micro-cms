<?php 

  include("../includes/db_connection.php");
  include("../includes/functions.php");

    $successMessage = $errorMessage = "";

    if(isset($_GET['signup'])){
        if($_GET['signup'] == 'success'){
            $successMessage = '<div class="alert alert-success" role="alert">
                                    <strong>Your account has been created successfully!</strong>
                                </div>';
        }
    }

    // login user

    if(isset($_POST['btnLogin'])){
      $user_id = sanitize_data($_POST['txtUserID']);
      $password = sanitize_data($_POST['txtPassword']);

      $sql = "SELECT * FROM users WHERE username = '$user_id' OR email = '$user_id'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) < 1 ){
        $errorMessage = '<div class="alert alert-danger" role="alert">
                              <strong>Incorrect Username/Email or Password</strong>
                          </div>';
                          
                          
      }elseif(mysqli_num_rows($result) > 0){

        while($row =  mysqli_fetch_assoc($result)){
          $hashed_password = $row['password'];
          $id = $row['id'];

        }

        // dehash password and compare
        $check_password = password_verify($password, $hashed_password);

        if(!$check_password){
          
          $errorMessage = '<div class="alert alert-danger" role="alert">
                              <strong>Incorrect Username/Email or Password</strong>
                          </div>';
                          
                         
        }else{

          // User is valid, create sessions
          session_start();

          $_SESSION['user_identity'] = $user_id;
          $_SESSION['id']=TRUE;
          $_SESSION['logged_in'] = $id;

          // set cookies
          // $duration = time(60 * 60 * 24 * 365);

          
        
          // setcookie('User', $user_id, $duration);
          // setcookie('Password', $password, $duration);

          header("Location: index.php?login=successful");

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
    <title>Login - Admin</title>
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
                <?=$successMessage ?>
                <?=$errorMessage?>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form action="login.php" method="post" class="pt-3">
                  <div class="form-group">
                    <input type="text" name="txtUserID" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username Or Email" required autofocus>
                  </div>
                  <div class="form-group">
                    <input type="password" name="txtPassword" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="mt-3">
                    <button type="submit" name="btnLogin" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <div class="mb-2">
                    <button class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-facebook mr-2"></i>Connect using facebook </button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
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
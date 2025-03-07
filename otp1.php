<?php
session_start();
// if(!(isset($_SESSION['email'])){
//   header("location:index.html");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Verification</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="feather.css">
  <link rel="stylesheet" href="themify-icons.css">
  <link rel="stylesheet" href="vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="style.css">
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="../../images/favicon.png" /> -->
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <!-- <div class="brand-logo"> -->
                <center><img src="GP_logo.png" alt="logo" height="46.5%" width="46.5%"></center><br><br>
              <!-- </div> -->
              <h4><b>Verify with OTP</b></h4>
              <h6 class="font-weight-light">Sent via Email</h6>
             
              <form class="pt-3" action="otp2.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter OTP" name="otp" required>
                </div>

                <?php
                  if(isset($_COOKIE['counter'])){                  
                    echo "<h6> <font color='green'>OTP has been sent successfully!</font></h6>";
                  }
                ?>
                
                <h6>Did not receive OTP ? <font color="navy"><a href="remail.php"><b>Resend OTP</b></a></font></h6>
                <!-- <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="pass">
                </div> -->
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Submit">
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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script> 
  <!-- endinject -->
</body>

</html>
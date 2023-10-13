<?php
session_start();
include('config/config.php');

// Login
if (isset($_POST['login'])) {
  $admin_name = $_POST['admin_name'];
  $admin_password = $_POST['admin_password'];


  $stmt = $mysqli->prepare("SELECT admin_name, admin_password, admin_id FROM rpos_admin WHERE admin_name = ? AND admin_password = ?");
  $stmt->bind_param('ss', $admin_name, $admin_password);
  $stmt->execute();
  $stmt->bind_result($admin_name, $admin_password, $admin_id);
  $rs = $stmt->fetch();
  $_SESSION['admin_id'] = $admin_id;

  if ($rs) {
    // If login is successful
    header("location: dashboard.php");
  } else {
    $err = "Incorrect Authentication Credentials";
  }
}

require_once('partials/_head.php');
?>

</html>



<html>
  <head>
  <style>
       .btn{
            background-color:#CB7F41;
            color:white;
            border: none;
            width: 100%;
        }
    .btn:hover{
            background-color:#CB7F41;
            color:white;
        }  
</style>
      </head>

<body style="background-color:#fff;">
  <div class="main-content">
    <div class="header bg-gradient-primar py-7">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="title m-b-md" style="
            color:#CB7F41;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;">
              The BlueNote Cafe <br>Point Of Sale Management System</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
        <form method="post" role="form">
  <div class="form-group mb-3">
    <div style="border: 2px solid #1D6E84;" class="input-group input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-user"></i></span>
      </div>
      <input class="form-control" required name="admin_name" placeholder="Username" type="text">
    </div>
  </div>
  <div class="form-group">
    <div style="border: 2px solid #1D6E84;" class="input-group input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
      </div>
      <input class="form-control" id="password" required name="admin_password" placeholder="Password" type="password">
    </div>
  </div>
  <!-- show password -->
  <div class="custom-control custom-control-alternative custom-checkbox mb-3-custom">
    <input class="custom-control-input" id="showPassword" type="checkbox">
    <label class="custom-control-label" for="showPassword" style="margin-bottom: 10px;"> <!-- Added margin-bottom -->
      <span class="text-muted"> Show Password</span>
    </label>
  </div>
  <div class="text-center mt-3-custom" style="margin-top: 20px;"> <!-- Added margin-top -->
    <button type="submit" name="login" class="btn">Log In</button>
  </div>
</form>

          </div>
        </div>
          <div class="row mt-3">
            <div class="col-6">
              <!-- <a href="forgot_pwd.php" class="text-light"><small>Forgot password?</small></a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php
  require_once('partials/_footer.php');
  ?>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>

  
<?php 
  // Echo javascript
  echo "<script>";
  echo "      const passwordInput = document.getElementById('password');";
  echo "      const showPasswordCheckbox = document.getElementById('showPassword');";

  echo "      showPasswordCheckbox.addEventListener('change', function () {";
  echo "        if (showPasswordCheckbox.checked) {";
  echo "            passwordInput.type = 'text';";
  echo "        } else {";
  echo "            passwordInput.type = 'password';";
  echo "        }";
  echo "    });";
  echo "</script>";
?>

</body>

</html>
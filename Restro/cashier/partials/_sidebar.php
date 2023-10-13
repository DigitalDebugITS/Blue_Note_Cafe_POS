<?php
$staff_id = $_SESSION['staff_id'];
//$login_id = $_SESSION['login_id'];
$ret = "SELECT * FROM  rpos_staff  WHERE staff_id = '$staff_id'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
while ($staff_id = $res->fetch_object()) {

?>



<!DOCTYPE html>
<html>
<head>
    <!-- Other head elements -->
    <style>
        /* Define the hover effect for the links */
        .navbar-nav .nav-item .nav-link:hover {
            color:   #CB7F41!important;  /* Change the color to red on hover */
        }
    </style>
</head>
<body>
    <nav style="font-size:80px;" class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class=href="">
        <img style="height:200px"  src="../admin/assets/img/brand/POS.png" class="" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../assets/img/">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="change_profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.php">
                <img src="../admin/assets/img/brand/POS.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
      
        <li class="nav-item">
    <a style="font-size: 24px; color: #000000" class="nav-link" href="orders.php">
        <i style="font-size: 24px; color: #000000" class="ri-shopping-cart-line"></i> Make Order
    </a>
</li>
<hr class="my-3">
<li class="nav-item">
    <a style="font-size: 24px; color: #000000" class="nav-link" href="Pending_orders.php">
        <i style="font-size: 24px; color: #000000" class="ri-hourglass-2-fill"></i> Pending 
    </a>
</li>
<hr class="my-3">
<li class="nav-item">
    <a style="font-size: 24px; color: #000000" class="nav-link" href="completed_order.php">
        <i style="font-size: 24px; color: #000000" class="ri-cash-fill"></i> Completed 
    </a>
</li>
</ul>
<!-- Divider -->
<hr class="my-3">
<ul class="navbar-nav mb-md-3">
<li class="nav-item">
    <a style="font-size: 24px; color: #000000" class="nav-link" href="logout.php">
        <i style="font-size: 24px; color: #000000" class="ri-login-box-line"></i> Log Out
    </a>
</li>
</ul>

      </div>
    </div>
  </nav>

<?php } ?>

</body>
</html>

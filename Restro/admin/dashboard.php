<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
require_once('partials/_analytics.php');
?>


<html>
  <head>  '
     <style>
       .btn{
            background-color:#CB7F41;
            color:white;
            border: none;
        }
    .btn:hover{
            background-color:#CB7F41;
            color:white;
        }  

        .icon{
          background-color:#CB7F41;
            color:white;
            border: none;
        }
</style>
      </head>

<body>
<!-- For more projects: Visit codeastro.com  -->
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Staff</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $staff; ?></span>
                    </div><!-- For more projects: Visit codeastro.com  -->
                    <div class="col-auto">
                      <div class="icon icon-shape  text-white rounded-circle shadow">
                        <i class="ri-user-2-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<!-- For more projects: Visit codeastro.com  -->
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $products; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape text-white rounded-circle shadow">
                        <i class="ri-goblet-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Transactions</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $orders; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape text-white rounded-circle shadow">
                        <i class="ri-arrow-left-right-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">K<?php echo $sales; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape text-white rounded-circle shadow">
                        <i class="ri-cash-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	  
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Recent Transactions</h3>
                </div>
                <div class="col text-right">
                  <a href="orders_reports.php" class="btn">See More</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th  scope="col"><b>Code</b></th>
                    <th scope="col"><b>Cashier</b></th>
                    <th  scope="col"><b>Payment Method</b></th>
                    <th scope="col"><b>Total</b></th>
                    <th  scope="col"><b>Date & Time</b></th>
            
                 
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  completed_orders ORDER BY `completed_orders`.`created_at` DESC LIMIT 7 ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();

                  while ($corder = $res->fetch_object()) { // Loop through the orders
                  ?>
                    <tr>
                      <td><?php echo $corder->order_code; ?></th>
                      <td><?php echo $corder->staff_name; ?></td>
                      <td ><?php echo $corder->payment_method; ?></td>
                      <td>K<?php echo $corder->order_total; ?></td>
                      <td ><?php echo date('d/M/Y g:i', strtotime($corder->created_at)); ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div> <!-- Close the main-content div here -->

  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>
<!-- For more projects: Visit codeastro.com  -->
</html>

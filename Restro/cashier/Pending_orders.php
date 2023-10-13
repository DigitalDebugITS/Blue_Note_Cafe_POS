<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

if (isset($_GET['cancel'])) {
    $id = $_GET['cancel'];
    $adn = "DELETE FROM rpos_orders WHERE order_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=Pending_orders.php");
    } else {
        $err = "Try Again Later";
    }
}

require_once('partials/_head.php');

// Fetch data from the rpos_orders table
$selectOrdersQuery = "SELECT * FROM rpos_orders ORDER BY created_at DESC";

$result = $mysqli->query($selectOrdersQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
</style>
</head>
<body>
    <?php require_once('partials/_sidebar.php'); ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php require_once('partials/_topnav.php'); ?>
        <!-- Header -->
        <div style="background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover;" class="header pb-8 pt-5 pt-md-8">
            <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <a href="orders.php" class="btn btn-outline-success">
                            <i class="ri-shopping-cart-line"></i>
                                Make A New Order
                            </a>
                        </div>

                        <!-- Orders Table -->
                        <div class="table-responsive">
                            <div >
                                <h1 class='text-center'> Pending Orders</h1>
                            </div>
                            <table class="table align-items-center table-flush">
                                <thead  class="thead-light">
                                    <tr>
                                
                                        <th>Order Code</th>
                                        <th>Cashier Name</th>
                                        <th>Total</th>
                                        <th scope="col">Ordered At</th>
                                        <th scope="col">Action</th>
                                        
                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            
                                            echo "<td>" . $row["order_code"] . "</td>";
                                            echo "<td>" . $row["staff_name"] . "</td>";
                                            echo "<td>K" . $row["Order_total"] . "</td>";
                                            echo '<td>' . date('Y-m-d H:i', strtotime($row['created_at'])) . '</td>';
                                

                                            echo "<td>";
                                            echo "<a href='?cancel=" . $row["order_id"] . "' class='btn'>Cancel</a>";
                                            echo "<a href='view_order.php?order_code=" . $row["order_code"] . "' class='btn'>View</a>";
                                            echo "<a href='update_order.php?order_code=" . $row["order_code"] . "' class='btn'>Update</a>";
                                            echo "<a href='print_receipt.php?order_code=" . $row["order_code"] . "' class='btn'>Receipt</a>";
                                            echo "</td>";

                                            // Add more columns if needed
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No orders found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

require_once('partials/_head.php');

// Fetch data from the completed_orders table
$selectOrdersQuery = "SELECT * FROM completed_orders ORDER BY created_at DESC";

$result = $mysqli->query($selectOrdersQuery);

// Initialize variables to keep track of the current date and total
$currentDate = null;
$totalForDay = 0;
$cashierTotals = array(); // Array to store individual cashier totals

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
    <style>
        /* Add custom styles for larger size and bold text of date and total rows */
        .bg-gray, .bg-secondary {
            height: 40px;
            line-height: 40px;
            font-weight: bold;
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

                        <!-- Orders Table -->
                        <div class="table-responsive">
                            <div>
                                <h1 class='text-center'>Completed Orders</h1>
                            </div>
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Order Code</th>
                                        <th>Cashier Name</th>
                                        <th>Total</th>
                                        <th scope="col">Ordered At</th>
                                        <th scope="col">Action</th>
                                        <!-- Add more columns if needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // Get the date part of the datetime
                                            $orderDate = date('Y-m-d', strtotime($row['created_at']));

                                            // Check if the date has changed
                                            if ($currentDate !== $orderDate) {
                                                // Display a new heading with the date and total
                                                if ($currentDate !== null) {
                                                    
                                                // Display individual totals for each cashier
                                                foreach ($cashierTotals as $cashier => $cashierTotal) {
                                                    echo "<tr class='bg-secondary text-white'>";
                                                    echo "<td colspan='2'>$cashier's Total</td>";
                                                    echo "<td>K$cashierTotal</td>";
                                                    echo "<td colspan='2'></td>"; // Action column
                                                    echo "</tr>";
                                                }

                                                                                                    

                                                    echo "<tr class='bg-secondary text-white'>";
                                                    echo "<td colspan='2'>Total for $currentDate</td>";
                                                    echo "<td>K$totalForDay</td>";
                                                    echo "<td colspan='2'></td>"; // Action column
                                                    echo "</tr>";

                                                   

                                                    // Reset the total and update the current date
                                                    $currentDate = $orderDate;
                                                    $totalForDay = 0;
                                                    $cashierTotals = array();
                                                    // // Display a new heading with the date
                                                    // echo "<tr class='bg-gray text-white'>";
                                                    // echo "<td colspan='5'>$currentDate</td>";
                                                    // echo "</tr>";
                                                }

                                                // Reset the total and update the current date
                                                $currentDate = $orderDate;
                                                $totalForDay = 0;
                                                $cashierTotals = array();
                                                // Display a new heading with the date
                                                echo "<tr class='bg-gray text-white'>";
                                                echo "<td colspan='5'>$currentDate</td>";
                                                echo "</tr>";
                                            }

                                            // Display the order details
                                            echo "<tr>";
                                            echo "<td>" . $row["order_code"] . "</td>";
                                            echo "<td>" . $row["staff_name"] . "</td>";
                                            echo "<td>K" . $row["order_total"] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                            echo "<td><a href='view_order.php?order_code=" . $row["order_code"] . "' class='btn'>View Order</a></td>";
                                            echo "</tr>";

                                            // Update the total for the day
                                            $totalForDay += $row["order_total"];

                                            // Update individual cashier totals
                                            $cashierName = $row["staff_name"];
                                            if (!isset($cashierTotals[$cashierName])) {
                                                $cashierTotals[$cashierName] = 0;
                                            }
                                            $cashierTotals[$cashierName] += $row["order_total"];
                                        }

                                        // Display the total for the last day
                                        echo "<tr class='bg-secondary text-white'>";
                                        echo "<td colspan='2'>Total for $currentDate</td>";
                                        echo "<td>K$totalForDay</td>";
                                        echo "<td colspan='2'></td>"; // Action column
                                        echo "</tr>";

                                        // Display individual totals for each cashier for the last day
                                        foreach ($cashierTotals as $cashier => $cashierTotal) {
                                            echo "<tr class='bg-secondary text-white'>";
                                            echo "<td colspan='2'>$cashier's Total for $currentDate</td>";
                                            echo "<td>K$cashierTotal</td>";
                                            echo "<td colspan='2'></td>"; // Action column
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No orders found</td></tr>";
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

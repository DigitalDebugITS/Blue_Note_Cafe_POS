<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

if (isset($_GET['order_code'])) {
    $order_code = $_GET['order_code'];

    $selectOrderQuery = "SELECT * FROM rpos_orders WHERE order_code = ?";
    $stmt = $mysqli->prepare($selectOrderQuery);
    $stmt->bind_param('s', $order_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $order_id = $row["order_id"];
        $staff_name = $row["staff_name"];
        $Order_total = $row["Order_total"];
        $created_at = $row["created_at"];
        $order_code = $row["order_code"];
        $payment_method = $row["payment_method"];

        // Insert the order details into the completed_orders table
        $insertQuery = "INSERT INTO completed_orders (order_id, order_code, staff_name, Order_total, created_at, payment_method) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsert = $mysqli->prepare($insertQuery);
        $stmtInsert->bind_param('sssiss', $order_id, $order_code, $staff_name, $Order_total, $created_at, $payment_method);
        $stmtInsert->execute();
        $stmtInsert->close();

        // Loop through the items in the original order and deduct quantities
        $selectOrderDetailsQuery = "SELECT * FROM rpos_order_details WHERE order_code = ?";
        $stmtDetails = $mysqli->prepare($selectOrderDetailsQuery);
        $stmtDetails->bind_param('s', $order_code);
        $stmtDetails->execute();
        $resultDetails = $stmtDetails->get_result();

        while ($orderDetails = $resultDetails->fetch_assoc()) {
            $productId = $orderDetails['prod_id'];
            $quantity = $orderDetails['prod_qty'];

            // Use database queries or an ORM to update the quantity in the database
            // For example, using MySQLi:
            $updateQuantitySql = "UPDATE rpos_products SET prod_quantity = prod_quantity - ? WHERE prod_id = ?";
            $stmtUpdateQuantity = $mysqli->prepare($updateQuantitySql);
            // Bind the parameters
            $stmtUpdateQuantity->bind_param("ii", $quantity, $productId);
            $stmtUpdateQuantity->execute();
            // Handle errors and close the statement
            $stmtUpdateQuantity->close();
        }

        // Delete the original order
        $deleteQuery = "DELETE FROM rpos_orders WHERE order_code = ?";
        $stmtDelete = $mysqli->prepare($deleteQuery);
        $stmtDelete->bind_param('s', $order_code);
        $stmtDelete->execute();
        $stmtDelete->close();
    }

    
    echo '<script>window.print();</script>';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="MartDevelopers Inc">
    <title>BlueNote Cafe Receipt</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../admin/assets/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../admin/assets/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/assets/img/icons/favicon-16x16.png">
    <link rel="manifest" href="../admin/assets/img/icons/site.webmanifest">
    <link rel="mask-icon" href="../admin/assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.js"></script>
    <style>
        body {
            margin-top: 20px;
        }

        /* Regular screen styles */
        .receipt-content {
            font-size: 14px;
            margin: 0 auto;
            max-width: 500px;
        }

        /* Thermal printer styles */
        @media print {
            .receipt-content {
                font-size: 10px; /* Adjust font size for thermal printing */
                margin: 0; /* Remove margin for thermal printing */
            }

            table {
                width: 100%; /* Expand the table to fit the paper width */
                font-size: 8px; /* Adjust font size for the table content */
                margin-bottom: 5px; /* Add a margin between tables (adjust as needed) */
            }

            th, td {
                padding: 2px; /* Reduce cell padding (adjust as needed) */
            }
        }
    </style>

</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div id="Receipt" class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="text-center">
                        <h2> <strong>Blue Note Cafe</strong></h2>
                    </div>
                    <div class="text-center">
                        <address>
                            <strong>Receipt</strong>
                            <br>
                            XXXXXXXXXXXXX
                            <br>
                            Kabwata
                            <br>
                            Thank you, Visit us again!!!
                        </address>
                        <div class="text-center">
                            <p>
                                <em><?php echo date('d/M/Y g:i') ?></em>
                            </p>
                            <p>
                                <em class="text-success">Receipt #: <?php echo $_GET['order_code']; ?></em>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="description">Item</th>
                                <th class="quantity">Q.</th>
                                <th class="price">K</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $order_code = $_GET['order_code'];
                            $ret = "SELECT * FROM  rpos_order_details WHERE order_code = ?";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->bind_param('s', $order_code);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            $total = 0; // Initialize total
                            while ($order = $res->fetch_object()) {
                                $itemTotal = ($order->prod_price * $order->prod_qty);
                                $total += $itemTotal; // Add item total to the total
                            ?>
                            <tr>
                                <td class="col-md-9"><em><?php echo $order->prod_name; ?></em></td>
                                <td class="col-md-1" style="text-align: center"><?php echo $order->prod_qty; ?></td>
                                <td class="col-md-1 text-center">K<?php echo $order->prod_price; ?></td>
                            </tr>
                            <!-- Add more rows for other items if needed -->
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3 text-right">
                        <h4><strong>Total: K<?php echo $total; ?>.00</strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
   window.onload = function() {
        window.print(); // Trigger the print operation
        window.onafterprint = function() {
            window.location.href = 'Pending_orders.php'; // Redirect to Pending_orders.php after printing
        };
    };
    </script>
</body>

</html>

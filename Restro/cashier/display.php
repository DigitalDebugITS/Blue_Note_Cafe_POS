<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

if (isset($_GET['cancel'])) {
    $id = $_GET['cancel'];
    $adn = "DELETE FROM  rpos_orders  WHERE  order_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=payments.php");
    } else {
        $err = "Try Again Later";
    }
}
require_once('partials/_head.php');

// Fetch data from the rpos_orders table
$selectOrdersQuery = "SELECT * FROM rpos_orders";
$result = $mysqli->query($selectOrdersQuery);
?>

<body>
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
        <div style="background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
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
                                <i class="fas fa-plus"></i> <i class="fas fa-utensils"></i>
                                Make A New Order
                            </a>
                        </div>
             

    <!-- Orders Table -->
    <div class="table-responsive">
    <div class="card-header border-0">
                            <h3 class='text-center'>Orders</h3>
                        </div>
        <table class="table align-items-center table-flush">
        <thead class="thead-light">
                <tr>
                    <th>Order ID</th>
                    <th>Order Code</th>
                    <th>Cashier Name</th>
                    <th>Total</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                    <!-- Add more columns if needed -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["order_id"] . "</td>";
                        echo "<td>" . $row["order_code"] . "</td>";
                        echo "<td>" . $row["staff_name"] . "</td>";
                        echo "<td>K" . $row["Order_total"] . "</td>";
                        echo "<td>" . $row["created_at"] . "</td>";

                        echo "<td>";
                        echo "<a href='?cancel=" . $row["order_id"] . "' class='btn btn-sm btn-danger'>Cancel</a>";
                        // echo "<a href='?cancel=" . $row["order_id"] . "' class='btn btn-sm btn-danger'>Cancel</a>";
                        // echo "<a href='?cancel=" . $row["order_id"] . "'class='btn btn-sm btn-danger'>Cancel</a>";
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
    <?php
            require_once('partials/_footer.php');
            ?>

<?php
    require_once('partials/_scripts.php');
    ?>
    <!-- Your existing JavaScript and closing HTML tags here -->

</body>

</html>

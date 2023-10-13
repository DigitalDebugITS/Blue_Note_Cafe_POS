<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
?>

<body>
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
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <?php
                    // Initialize an array to store payments by day
                    $paymentsByDay = array();

                    $ret = "SELECT * FROM rpos_payments ORDER BY `created_at` DESC";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    while ($payment = $res->fetch_object()) {
                        $paymentDate = date('Y-m-d', strtotime($payment->created_at));

                        // If the day key doesn't exist in the array, create it
                        if (!isset($paymentsByDay[$paymentDate])) {
                            $paymentsByDay[$paymentDate] = array(
                                'payments' => array(),
                                'total' => 0,
                            );
                        }

                        // Add the payment to the corresponding day
                        $paymentsByDay[$paymentDate]['payments'][] = $payment;

                        // Update the total for the day
                        $paymentsByDay[$paymentDate]['total'] += $payment->pay_amt;
                    }
                    ?>

                    <?php
                    // Loop through the paymentsByDay array and display payments for each day
                    foreach ($paymentsByDay as $day => $data) {
                    ?>
                        <div class="card shadow">
                            <div class="card-header border-0">
                                Payment Reports for <?php echo date('d/M/Y', strtotime($day)); ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-success" scope="col">Payment Code</th>
                                            <th scope="col">Payment Method</th>
                                            <th class="text-success" scope="col">Order Code</th>
                                            <th scope="col">Amount Paid</th>
                                            <th class="text-success" scope="col">Date Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data['payments'] as $payment) {
                                        ?>
                                            <tr>
                                                <th class="text-success" scope="row">
                                                    <?php echo $payment->pay_code; ?>
                                                </th>
                                                <th scope="row">
                                                    <?php echo $payment->pay_method; ?>
                                                </th>
                                                <td class="text-success">
                                                    <?php echo $payment->order_code; ?>
                                                </td>
                                                <td>
                                                    $ <?php echo $payment->pay_amt; ?>
                                                </td>
                                                <td class="text-success">
                                                    <?php echo date('d/M/Y g:i', strtotime($payment->created_at)) ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3"></th>
                                            <th>Total: $ <?php echo $data['total']; ?></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Footer -->
            <?php
            require_once('partials/_footer.php');
            ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>

</html>

<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $cashierName = $_POST['cashier_name'];
    $orderCode = $_POST['order_code'];
    $orderId = $_POST['order_id'];
    $paymentMethod = $_POST['payment_method'];

    // Calculate the total from the cart
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cartItem) {
            $total += $cartItem['p_price'] * $cartItem['p_quantity'];

            // Update or insert order details based on whether it exists
            $productId = $cartItem['p_id'];
            $productName = $cartItem['p_name'];
            $productPrice = $cartItem['p_price'];
            $quantity = $cartItem['p_quantity'];

            // Check if the order details exist
            $orderDetailsExistQuery = "SELECT * FROM rpos_order_details WHERE order_code = ? AND prod_id = ?";
            $stmtExist = $mysqli->prepare($orderDetailsExistQuery);
            $stmtExist->bind_param("ss", $orderCode, $productId);
            $stmtExist->execute();
            $result = $stmtExist->get_result();

            if ($result->num_rows > 0) {
                // Order details exist, update them
                $updateOrderDetailsQuery = "UPDATE rpos_order_details SET prod_name = ?, prod_price = ?, prod_qty = ? WHERE order_code = ? AND prod_id = ?";
                $stmtUpdate = $mysqli->prepare($updateOrderDetailsQuery);
                $stmtUpdate->bind_param("ssiss", $productName, $productPrice, $quantity, $orderCode, $productId);
                $stmtUpdate->execute();
            } else {
                // Order details do not exist, insert them
                $insertOrderDetailsQuery = "INSERT INTO rpos_order_details (order_code, prod_id, prod_name, prod_price, prod_qty) VALUES (?, ?, ?, ?, ?)";
                $stmtInsert = $mysqli->prepare($insertOrderDetailsQuery);
                $stmtInsert->bind_param("ssssi", $orderCode, $productId, $productName, $productPrice, $quantity);
                $stmtInsert->execute();
            }

            // Reduce quantity of cart item from the database
        //     $amount = $quantity;
        //     $sql = "UPDATE rpos_products SET prod_quantity = prod_quantity - ? WHERE prod_id = ?";
        //     $stmtReduceQuantity = $mysqli->prepare($sql);
        //     $stmtReduceQuantity->bind_param("ii", $amount, $productId);
        //     $stmtReduceQuantity->execute();
        }
    }

    // Update the order information in the rpos_orders table
    $updateOrderQuery = "UPDATE rpos_orders SET staff_name = ?, payment_method = ?, order_total = ? WHERE order_code = ?";
    $stmtUpdateOrder = $mysqli->prepare($updateOrderQuery);

    if ($stmtUpdateOrder) {
        $stmtUpdateOrder->bind_param("ssds", $cashierName, $paymentMethod, $total, $orderCode);

        if ($stmtUpdateOrder->execute()) {
            // Clear the cart after a successful order update
            unset($_SESSION['cart']);

            // Redirect to a success page or do further processing
            header("Location: Pending_orders.php");
            exit();
        } else {
            // Handle execution error
            header("Location: error.php");
            exit();
        }
    } else {
        // Handle prepare error
        header("Location: error.php");
        exit();
    }
} else {
    // Handle cases where the form is not submitted via POST
    header("Location: cart.php"); // Redirect back to the cart page or show an error message
    exit();
}

require_once('partials/_head.php');
?>

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

            //     // Reduce quantity of cart item from database
            //     $productId = $cartItem['p_id'];
            //     $amount = $cartItem['p_quantity'];
                
            //     // Use database queries or an ORM to update the quantity in the database
            //     // For example, using MySQLi:
            //     $sql = "UPDATE rpos_products SET prod_quantity = prod_quantity - ? WHERE prod_id = ?";
            //     $stmt = $mysqli->prepare($sql);
            //     // Bind the parameters
            //     $stmt->bind_param("ii", $amount, $productId);
            //     $stmt->execute();
            //     // Handle errors and close the statement
            //     $stmt->close();
             }
        }

        // Insert order information into the rpos_orders table
        $insertOrderQuery = "INSERT INTO rpos_orders (order_id, order_code, staff_name, payment_method, order_total) VALUES (?, ?,?, ?, ?)";
        $stmt = $mysqli->prepare($insertOrderQuery);

        if ($stmt) {
            $stmt->bind_param("ssssi", $orderId, $orderCode, $cashierName, $paymentMethod, $total);

            if ($stmt->execute()) {
                // Loop through the items in the cart and insert them into the rpos_order_details table
                foreach ($_SESSION['cart'] as $cartItem) {
                    $productId = $cartItem['p_id'];
                    $productName = $cartItem['p_name'];
                    $productPrice = $cartItem['p_price'];
                    $quantity = $cartItem['p_quantity'];

                    // Insert product details along with order details
                    $insertOrderDetailsQuery = "INSERT INTO rpos_order_details (order_code, prod_id, prod_name, prod_price, prod_qty) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $mysqli->prepare($insertOrderDetailsQuery);
                    $stmt->bind_param("sssss", $orderCode, $productId, $productName, $productPrice, $quantity);
                    $stmt->execute();
                }

                // Clear the cart after successful order placement
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

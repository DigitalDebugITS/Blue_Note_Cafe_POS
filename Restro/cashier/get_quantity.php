<?php
// Include necessary files and start the session if not already started
session_start();
include('config/config.php');
include('config/checklogin.php');

// Check if the required POST parameters are set
if (isset($_POST['product_id'])) {
    // Get the product ID from the POST data
    $productId = $_POST['product_id'];

    // Query the database to get the quantity of the product
    $stmt = $mysqli->prepare("SELECT prod_quantity FROM rpos_products WHERE prod_id = ?");
    $stmt->bind_param("s", $productId);
    $stmt->execute();
    $stmt->bind_result($quantity);

    // Fetch the result
    $stmt->fetch();
    $stmt->close();

    // Return the quantity as JSON
    echo json_encode(['quantity' => $quantity]);
} else {
    // Handle the case where product_id is not set
    echo json_encode(['error' => 'Product ID not provided']);
}
?>

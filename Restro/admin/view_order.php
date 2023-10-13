<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Add your CSS styles here for table formatting -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color:#1D6E84;
            color: white;
        }

        .back-button {
            margin-top: 20px;
            display: block;
            margin: 0 auto; /* Center the button */
            height: 40px;
            width: 80px;
            background-color:#1D6E84;
            color: white;
            
        }
        h1{
           color:#CB7F41
        }

        .text-center {
            text-align: center; /* Center the heading */
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include('config/config.php');

    if (isset($_GET['order_code'])) {
        $orderCode = $_GET['order_code'];

        // Fetch product names and quantities for the specified order code
        $selectOrderDetailsQuery = "SELECT prod_name, prod_qty FROM rpos_order_details WHERE order_code = ?";
        $stmt = $mysqli->prepare($selectOrderDetailsQuery);
        $stmt->bind_param("s", $orderCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $productQuantities = array();

        while ($row = $result->fetch_assoc()) {
            $productName = $row['prod_name'];
            $quantity = intval($row['prod_qty']);

            // If the product name already exists in the array, add the quantity
            if (array_key_exists($productName, $productQuantities)) {
                $productQuantities[$productName] += $quantity;
            } else {
                $productQuantities[$productName] = $quantity;
            }
        }
        $stmt->close();
    }
    ?>

    <div class="container">
        <!-- Orders Table -->
        <h1 class='text-center'>Order Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the product names and their total quantities
                foreach ($productQuantities as $productName => $totalQty) {
                    echo "<tr>";
                    echo "<td>" . $productName . "</td>";
                    echo "<td>" . $totalQty . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Back button to return to the previous page -->
        <button class='btn btn-primary back-button' onclick="goBack()">Back</button>
    </div>

    <script>
        // JavaScript function to go back to the previous page
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

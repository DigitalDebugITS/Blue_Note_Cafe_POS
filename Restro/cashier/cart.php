<?php
session_start();

if (isset($_POST['cart_id'])) {

    if ($_POST['action'] == 'add') {

        if (isset($_SESSION['cart'])) {
            $isalreadyExist = 0;
            foreach ($_SESSION['cart'] as $key => $value) {

                if ($_SESSION['cart'][$key]['p_id'] == $_POST['cart_id']) {
                    $isalreadyExist++;
                    $_SESSION['cart'][$key]['p_quantity'] =  $_SESSION['cart'][$key]['p_quantity'] + $_POST['cart_quantity'];
                }
            }
            if ($isalreadyExist < 1) {
                $itemArray = array(
                    'p_id' => $_POST['cart_id'],
                    'p_name' => $_POST['cart_name'],
                    'p_price' => $_POST['cart_price'],
                    'p_quantity' => $_POST['cart_quantity']
                );
                $_SESSION['cart'][]  = $itemArray;
            }
        } else {
            $itemArray = array(
                'p_id' => $_POST['cart_id'],
                'p_name' => $_POST['cart_name'],
                'p_price' => $_POST['cart_price'],
                'p_quantity' => $_POST['cart_quantity']
            );
            $_SESSION['cart'][]  = $itemArray;
        }
    }
}

if ($_POST['action'] == 'remove') {
    foreach ($_SESSION['cart'] as $key => $val) {
        if ($val['p_id'] == $_POST['id_to_remove']) {
            unset($_SESSION['cart'][$key]);
        }
    }
}

$outputTable = ''; // Initialize the outputTable variable

if (!empty($_SESSION['cart'])) {
    $total = 0;
    $outputTable .= "<table class='table table-bordered'><thead><tr><td>Name</td><td>Product total</td><td>Quantity</td><td>Action</td> </tr></thead>";
    foreach ($_SESSION['cart'] as $key => $value) {
        $outputTable .= "<tr><td>" . $value['p_name'] . "</td><td>" . ($value['p_price'] * $value['p_quantity']) . "</td><td>" . $value['p_quantity'] . "</td><td><button id=" . $value['p_id'] . " class='btn delete'>Delete</button></td></tr>";
        $total = $total + ($value['p_price'] * $value['p_quantity']);
    }
    $outputTable .= "</table>";
    $outputTable .= "<div class='total-box'><b style='font-size: 24px;  padding: 10px; margin-top: 20px; text-align: center;'>Amount Due: K" . $total . "</b></div>";

   

}



echo json_encode($outputTable);
?>

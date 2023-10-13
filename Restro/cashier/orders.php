<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');
check_login();

require_once('partials/_head.php');
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

$staff_id = $_SESSION['staff_id'];
$ret = "SELECT * FROM  rpos_staff  WHERE staff_id = '$staff_id'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
if ($res->num_rows == 1) {
    $staff = $res->fetch_object();
    $cashierName = $staff->staff_name;
}
?>

<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        button {
            background-color: #CB7F41;
            color: white;

        }

        i {

        }

        .total-box {
            border: 3px dotted red;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
        }

        .scroll-to-down-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #CB7F41;
            color: #fff;
            border: none;
            border-radius: 10%;
            padding: 10px 15px;
            cursor: pointer;
            display: none;
            z-index: 999;
        }

        .scroll-to-down-button i {
            font-size: 20px;
        }
    </style>
</head>
<body>
<!-- Sidenav -->
<?php require_once('partials/_sidebar.php'); ?>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <?php require_once('partials/_topnav.php'); ?>
    <!-- Header -->
    <div style="background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover;"
         class="header pb-8 pt-5 pt-md-8">
            <span class="mask bg-gradient-dark opacity-8"></span>
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
        <!-- Search bar -->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="productSearch" placeholder="Search for a product...">
                        <div class="input-group-append">
                            <button class="btn " id="clearSearch">X</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        Select Any Product To Make An Order
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Product Code</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $ret = "SELECT * FROM rpos_products ORDER BY `rpos_products`.`created_at` DESC";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            while ($prod = $res->fetch_object()) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        if ($prod->prod_img) {
                                            echo "<img src='../admin/assets/img/products/$prod->prod_img' height='60' width='60' class='img-thumbnail'>";
                                        } else {
                                            echo "<img src='../admin/assets/img/products/default.jpg' height='60' width='60' class='img-thumbnail'>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $prod->prod_name; ?></td>
                                    <td><?php echo $prod->prod_id; ?></td>
                                    <td><?php echo $prod->prod_code; ?></td>
                                    <td style="<?php echo ($prod->prod_quantity <= ($prod->original_quantity * 0.5)) ? 'color: red; font-size: 30px;' : ''; ?>">
    <?php echo $prod->prod_quantity; ?>
                                    <td>K <?php echo $prod->prod_price; ?></td>
                                    <td>
                                        <div class="form-group">
                                            <label>Quantity:</label>
                                            <input style="width: 114px;" type="number" class="form-control"
                                                   id="quantity<?php echo $prod->prod_id ?>" value="0" min="0"readonly>
                                            <input type="hidden" id="name<?php echo $prod->prod_id ?>"
                                                   value='<?php echo $prod->prod_name ?>'>
                                            <input type="hidden" id="price<?php echo $prod->prod_id ?>"
                                                   value='<?php echo $prod->prod_price ?>'>
                                            <button class='btn add' data-id="<?php echo $prod->prod_id ?>">Add to list
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider Line -->
        <div class="row">
            <div class="col text-center">
                <hr style="border-top: 2px solid #ccc; width: 50%;">
            </div>
        </div>

        <!-- Checkout Cart -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div style="background-color: black; color: white;" class="card-header border-0">
                        <h1 style=" color: white;"class='text-center'>Confirm Order / Checkout</h1>
                    </div>
                    <div class="card-body">
                        <form action="make_order.php" method="post" id="checkoutForm">
                            <!-- Cashier Name, Order Code, Order ID, and Payment Method fields -->
                            <div class='form-row'>
                                <div class='col-md-3'>
                                    <label>Cashier Name:</label>
                                    <input type='text' name='cashier_name' id='cashier_name'
                                           value="<?php echo $cashierName; ?>" class='form-control' readonly>
                                </div>

                                <div class='col-md-3'>
                                    <label>Order Code:</label>
                                    <input type='text' name='order_code' id='order_code'
                                           value="<?php echo $alpha; ?>-<?php echo $beta; ?>" class='form-control'
                                           readonly>
                                </div>

                                <div class='col-md-3'>
                                    <label>Order ID:</label>
                                    <input type='text' name='order_id' id='order_id'
                                           value="<?php echo $orderid; ?>" class='form-control' readonly>
                                </div>

                                <div class='col-md-3'>
                                    <label>Select Payment Method:</label>
                                    <select class='form-control' id='payment_method' name='payment_method'>
                                        <option value='cash'>Cash</option>
                                        <option value='Card'>Debit Card</option>
                                        <option value='Mobile_Money'>Mobile Money</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="cart">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="table-responsive" id="displayCheckout">
                                <?php
                                if (!empty($_SESSION['cart'])) {
                                    $outputTable = '';
                                    $total = 0;
                                    $outputTable

                                        .= "<table class='table table-bordered'><thead><tr><td>Product ID</td><td>Name</td><td>Price</td><td>Quantity</td><td>Action</td> </tr></thead>";
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        $outputTable .= "<tr><td>" . $value['p_id'] . "</td><td>" . $value['p_name'] . "</td><td> K" . ($value['p_price'] * $value['p_quantity']) . "</td><td>" . $value['p_quantity'] . "</td><td><button id=" . $value['p_id'] . " class='btn delete'>Delete</button></td>";

                                        // Add a hidden input field for 'prod_id'
                                        $outputTable .= "<input type='hidden' name='prod_id[]' value='" . $value['p_id'] . "'>";

                                        $outputTable .= "</tr>";
                                        $total = $total + ($value['p_price'] * $value['p_quantity']);
                                    }

                                    $outputTable .= "</table>";

                                    // Add a dotted box around the total
                                    $outputTable .= "<div class='total-box'><b style='font-size: 24px;'>Amount Due: K" . $total . "</b></div>";


                                    echo $outputTable;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit order button outside the cart display -->
        <div class="row">
            <div class="col text-center">
                <button class='btn' id="submit_order">Submit Order</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Argon Scripts -->
<?php require_once('partials/_scripts.php'); ?>

<div id="scroll-to-down" class="scroll-to-down-button">
    <i class="fas fa-chevron-down"></i>
</div>


<script>
    $(document).ready(function () {
        alldeleteBtn = document.querySelectorAll('.delete')
        alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click', deleteINsession)
        })

        function deleteINsession() {
            removable_id = this.id;
            $.ajax({
                url: 'cart.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    id_to_remove: removable_id,
                    action: 'remove'
                },
                success: function (data) {
                    $('#displayCheckout').html(data);
                    alldeleteBtn = document.querySelectorAll('.delete')
                    alldeleteBtn.forEach(onebyone => {
                        onebyone.addEventListener('click', deleteINsession)
                    })
                }
            }).fail(function (xhr, textStatus, errorThrown) {
                alert(xhr.responseText);
            });
        }

        $('.add').click(function () {
            id = $(this).data('id');
            name = $('#name' + id).val();
            price = $('#price' + id).val();
            quantityField = $('#quantity' + id);
            quantity = parseInt(quantityField.val());
            quantityField.val(quantity + 1); // Increment the quantity

            $.ajax({
                url: 'cart.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    cart_id: id,
                    cart_name: name,
                    cart_price: price,
                    cart_quantity: 1, // Always add 1 quantity when "Add to list" is clicked
                    action: 'add'
                },
                success: function (data) {
                    $('#displayCheckout').html(data);
                    alldeleteBtn = document.querySelectorAll('.delete')
                    alldeleteBtn.forEach(onebyone => {
                        onebyone.addEventListener('click', deleteINsession)
                    })
                }
            }).fail(function (xhr, textStatus, errorThrown) {
                alert(xhr.responseText);
            });
        })

        // Function to filter the table based on the search input
        function filterTable() {
            var searchText = $('#productSearch').val().toLowerCase();

            $('tbody tr').each(function () {
                var name = $(this).find('td:nth-child(2)').text().toLowerCase(); // Update the column index to 2

                if (searchText === '' || name.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Bind the filter function to the input field's keyup event
        $('#productSearch').keyup(filterTable);

        // Clear search input when "X" button is clicked
        $('#clearSearch').click(function () {
            $('#productSearch').val(''); // Clear the search input
            filterTable(); // Trigger filtering to show all items
        });

        // Scroll to down button
        var scrollButton = $("#scroll-to-down");
        var targetSection = $("#cart"); // Replace with your section's selector

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                scrollButton.fadeIn();
            } else {
                scrollButton.fadeOut();
            }
        });

        scrollButton.click(function () {
            $('html, body').animate({
                scrollTop: targetSection.offset().top
            }, 800); // Adjust the scroll speed (800ms) as needed

            // Prevent the default link behavior
            return false;
        });

        // Handle "Submit Order" button click
        $('#submit_order').click(function (e) {
            e.preventDefault(); // Prevent the default form submission behavior

            // Check if the cart is empty
            if ($('.delete').length === 0) {
                Swal.fire({
                    title: 'Cart is Empty',
                    text: 'You cannot submit an empty cart. Please add items to your cart first.',
                    icon: 'error',
                });
            } else {
                Swal.fire({
                    title: 'Submit Order?',
                    text: 'Are you sure you want to submit this order?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, submit it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Submitted!',
                            'Your order has been submitted.',
                            'success'
                        )
                        $('#checkoutForm').submit(); // Submit the order
                    }
                });
            }
        });
    });
</script>

</body>
</html>

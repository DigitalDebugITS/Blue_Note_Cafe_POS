<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  var_dump($id); // Debugging statement to check the value of $id
  $adn = "DELETE FROM rpos_products WHERE prod_id = ?";
  $stmt = $mysqli->prepare($adn);
  if ($stmt === false) {
    $err = "Error preparing the deletion query: " . mysqli_error($mysqli);
  } else {
    $stmt->bind_param('i', $id); // Assuming prod_id is an integer
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
      $success = "Deleted";
      header("refresh:1; url=products.php");
    } else {
      $err = "No records deleted. Try Again Later";
    }
    $stmt->close();
  }
}

require_once('partials/_head.php');
?>

<html>
  <Head>

  <style>
       .btn{
            background-color:#CB7F41;
            color:white;
            border: none;
        }
    .btn:hover{
            background-color:#CB7F41;
            color:white;
        }  
</style>

      </head>

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
          <div class="card shadow">
            <div class="card-header border-0">
              <a href="add_product.php" class="btn btn-outline-success">
                <i class="fas fa-utensils"></i>
                Add New Product
              </a>
            </div>
        
            <div class="input-group">
                        <input type="text" class="form-control" id="productSearch" placeholder="Search for a product...">
                        <div class="input-group-append">
                            <button class="btn " id="clearSearch">X</button>
                        </div>
                    </div>

            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead style="background-color:#1D6E84; color: white;" >
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  rpos_products ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($prod = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td>
                        <?php
                        if ($prod->prod_img) {
                          echo "<img src='assets/img/products/$prod->prod_img' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                        }

                        ?>
                      </td>
                      <td><?php echo $prod->prod_code; ?></td>
                      <td><?php echo $prod->prod_name; ?></td>
                      <td style="<?php echo ($prod->prod_quantity <= ($prod->original_quantity * 0.5)) ? 'color: red; font-size: 20px;' : ''; ?>">
    <?php echo $prod->prod_quantity; ?> 
</td>


                      <td>K<?php echo $prod->prod_price; ?></td>
                      <td>
                        <a href="products.php?delete=<?php echo $prod->prod_id; ?>">
                          <button class="btn">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </a>

                        <a href="update_product.php?update=<?php echo $prod->prod_id; ?>">
                          <button class="btn">
                            <i class="fas fa-edit"></i>
                            Update
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
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

<script>  // Function to filter the table based on the search input
        function filterTable() {
            var searchText = $('#productSearch').val().toLowerCase();

            $('tbody tr').each(function () {
                var name = $(this).find('td:nth-child(3)').text().toLowerCase(); // Update the column index to 2

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
        
        </script>

</body>



</html>
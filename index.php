<?php
include('../includes/connection.php');
include('../Functions/common_fun.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alankart:Admin Dashboard</title>
  <!-- favicon link -->
  <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
  <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- fontawesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    * {
      padding: 0px;
      margin: 0px;
    }

    #admin {
      margin-top: 12px;
    }

    .container-fuild {
      margin-left: 0px;
      margin-right: 0px;
      overflow: hidden;
    }

    .insertion {
      margin-left: 250px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <div class="container-fuild">

    <ul class="nav justify-content-between bg-info">
      <li class="nav-item">
        <h5 class="justify-content-start text-light mt-3"> &nbsp;&nbsp;<i class="fa-solid fa-basket-shopping fa-fade"></i> Alankart</h5>
      </li>
      <li class="nav-item">
        <h6 class="nav-link active text-light mt-2" aria-current="page" href=""><i class="fa-regular fa-circle-user"></i> Welcome Admin <?php echo $_SESSION["user_name"] ?></h6>
      </li>
    </ul>
    <div class="bg-light">
      <h4 class="text-center text-success bg-light">Manage Details</h4>
      <div class="row">
        <div class="col-md-2 bg-secondary p-0">
          <ul class="navbar-nav me-auto text-center">

            <li class="nav-item bg-info">
              <img src="https://t3.ftcdn.net/jpg/03/62/56/24/360_F_362562495_Gau0POzcwR8JCfQuikVUTqzMFTo78vkF.jpg" alt="" srcset="" height="100px" id="admin">
              <a href="#" class="nav-link text-light">
                <h5>Admin Panel</h5>
              </a>
            </li>
            <li class="nav-item ">
              <a href="index.php?insert_product" class="btn btn-warning mt-2 w-50">Insert Product</a>
            </li>
            <li class="nav-item ">
              <a href="index.php?view_products" class="btn btn-warning mt-2 w-50">View Products</a>
            </li>
            <li class="nav-item ">
              <a href="index.php?insert_category" class="btn btn-warning mt-2 ">Insert Category</a>
            </li>
            <li class="nav-item ">
              <a href="index.php?view_categories" class="btn btn-warning mt-2 ">View Category</a>
            </li>
            <li class="nav-item ">
              <a href="index.php?insert_brand" class="btn btn-warning mt-2 w-50">Insert Brands </a>
            </li>
            <li class="nav-item ">
              <a href="index.php?view_brands" class="btn btn-warning mt-2 w-50">View Brands</a>
            </li>
            <li class="nav-item ">
              <a href="index.php?list_orders" class="btn btn-warning mt-2 w-50">All Orders</a>
            </li>
            <li class="nav-item ">
              <a href="index.php?view_payments" class="btn btn-warning mt-2 w-50">All Payments</a>
            </li>
            <li class="nav-item ">
              <a href="index.php?view_users" class="btn btn-warning mt-2 w-50">List Users</a>
            </li>
            <li class="nav-item ">
              <a href="./logout.php" class="btn btn-warning mt-2 mb-4 w-50">Logout</a>
            </li>

          </ul>

        </div>
        <div class="col-md-6">
          <br><br>
          <div class="insertion">
            <h3 class="text-center text-warning">Welcome to Admin Dashboard</h3><br>
            <?php
            if (isset($_GET['insert_category'])) {
              include('insert_categories.php');
            }

            if (isset($_GET['insert_brand'])) {
              include('insert_brands.php');
            }

            if (isset($_GET['insert_product'])) {
              include('insert_products.php');
            }

            if (isset($_GET['view_products'])) {
              include('view_products.php');
            }

            if (isset($_GET['edit_product'])) {
              include('edit_product.php');
            }

            if (isset($_GET['delete_product'])) {
              include('delete_product.php');
            }

            if (isset($_GET['view_categories'])) {
              include('view_categories.php');
            }

            if (isset($_GET['view_brands'])) {
              include('view_brands.php');
            }

            if (isset($_GET['edit_category'])) {
              include('edit_category.php');
            }

            if (isset($_GET['edit_brand'])) {
              include('edit_brand.php');
            }

            if (isset($_GET['delete_category'])) {
              include('delete_category.php');
            }

            if (isset($_GET['delete_brand'])) {
              include('delete_brand.php');
            }

            if (isset($_GET['list_orders'])) {
              include('list_orders.php');
            }

            if (isset($_GET['delete_order'])) {
              include('delete_order.php');
            }

            if (isset($_GET['view_payments'])) {
              include('view_payments.php');
            }

            if (isset($_GET['delete_payment'])) {
              include('delete_payment.php');
            }

            if (isset($_GET['view_users'])) {
              include('view_users.php');
            }

            if (isset($_GET['delete_user'])) {
              include('delete_user.php');
            }
            ?>
          </div>
        </div>
      </div>
    </div>

  </div>
  <br>
  <footer>
    <div class="text-center bg-info p-3">
      © 2023 Copyright | Alankart
    </div>
  </footer>



  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
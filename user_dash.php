<?php
include('../includes/connection.php');
include('../Functions/common_fun.php');

//session start
session_start();
//  $user_name = $_SESSION['user_name'] ;
$select_name = "SELECT * FROM `user_data` WHERE user_name = 0 ";
$name_query = mysqli_query($con, $select_name);
$row_name = mysqli_fetch_array($name_query);
$user_name = $row_name['user_name'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alankart: User Dashboard</title>
  <!-- favicon link -->
  <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
  <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- fontawesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .container-fuild {
      margin-left: 0px;
      margin-right: 0px;
      overflow: hidden;
    }

    a {
      text-decoration: none;
      color: black;
    }

    img {
      height: 40%;
      margin: auto;
      display: block;
      width: 50%;
      margin-top: 5px;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fuild p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-basket-shopping fa-fade"></i> Alankart</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../displayall.php">Products</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../userarea/user_dash.php">My Account</a>
            </li>
            <!-- <li class="nav-item">
          <a class="nav-link" href="../userarea/userlogin.php">Login</a>
        </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php get_cart_num(); ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price: <?php total_cart(); ?>/-</a>
            </li>
          </ul>
          <form class="d-flex" action="../search.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <!-- <button class="btn btn-outline-dark" type="submit">Search</button> -->
            <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">&nbsp;&nbsp;
            <?php
            if (isset($_SESSION['username'])) {
              echo "<a href='./userarea/userlogin.php'  class='btn btn-outline-dark btn-btn-link' name='login'>Login</a>";
            } else {
              echo "<a href='logout.php'  class='btn btn-outline-dark btn-btn-link' name='login'>Logout</a>";
            }
            ?>
            <!-- <a href="./userarea/checkout.php"  class="btn btn-outline-dark btn-btn-link" name="login"  >Login</a> -->
          </form>
        </div>
      </div>
    </nav>
    <?php
    if (isset($_SESSION['username'])) {
      echo "<h5 class='text-center text-light bg-secondary p-2'>Welcome " . $user_name . "</h5>";
    } else {
      echo "<h5 class='text-center text-light bg-secondary p-2'>Welcome" . $_SESSION['username'] . "</h5>";
    }

    ?>
    <div class="bg-light">
      <h3 class="text-center">Alankart</h3>
      <p class="text-center">The new world of online shopping</p>
    </div>
    <div class="row">
      <div class="col-md-2 p-0">
        <ul class="navbar-nav bg-secondary text-center">
          <li class="nav-item bg-info ">
            <a class="nav-link text-light" href="#">
              <h5>Your Profile</h5>
            </a>
          </li>
          <li class="nav-item bg-secondary ">
            <img src="https://archive.org/download/HeaderIconUser/Header-Icon-User.png" />
          </li>
          <li class="nav-item bg-secondary mt-4 ">
            <a class="btn btn-dark text-light" href="./user_dash.php">
              <h6>Pending Orders</h6>
            </a>
          </li>
          <li class="nav-item bg-secondary mt-3 ">
            <a class="btn btn-dark text-light" href="user_dash.php?edit_account">
              <h6>Edit Account</h6>
            </a>
          </li>
          <li class="nav-item bg-secondary mt-3">
            <a class="btn btn-dark text-light" href="user_dash.php?my_orders">
              <h6>My Orders</h6>
            </a>
          </li>
          <li class="nav-item bg-secondary mt-3 ">
            <a class="btn btn-dark text-light" href="user_dash.php?delete_account">
              <h6>Delete Account</h6>
            </a>
          </li>
          <li class="nav-item bg-secondary mt-3 mb-5">
            <a class="btn btn-dark text-light" href="logout.php">
              <h6>Logout</h6>
            </a>
          </li>
          <li class="nav-item bg-secondary mt-2 mb-5">
            <a></a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 text-center">
        <?php

        getorder_details();

        if (isset($_GET['edit_account'])) {
          include('edit_account.php');
        }
        if (isset($_GET['my_orders'])) {
          include('user_orders.php');
        }


        if (isset($_GET['delete_account'])) {
          include('delete_account.php');
        }

        ?>
      </div>
    </div>

    <div class="container-fuild mt-5">
      <?php
      include('../footer.php');
      ?>
    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
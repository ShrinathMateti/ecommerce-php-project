<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alankart: The new world of shopping</title>
    <!-- favicon link -->
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
     .container-fuild{
          margin-left: 0px;
          margin-right: 0px;
          overflow: hidden;
        }
      
      a{
        text-decoration: none;
        color:black;
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
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./displayall.php">Products</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="./userarea/user_registration.php">Register</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:28999/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-dark" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product" >&nbsp;&nbsp;
        <?php
        if(!isset($_SESSION['username'])){
          echo"<a href='./userarea/userlogin.php'  class='btn btn-outline-dark btn-btn-link' name='login'>Login</a>";
        }else{
          echo"<a href='logout.php'  class='btn btn-outline-dark btn-btn-link' name='login'>Logout</a>";
        }
        ?>
      </form>
    </div>
  </div>
</nav>
<?php
  if(!isset($_SESSION['username']))
  {
        echo"<h5 class='text-center text-light bg-secondary p-2'>Welcome User</h5>";
      }
  else{
        echo"<h5 class='text-center text-light bg-secondary p-2'>Welcome".$user_username."</h5>";
  }
  ?>
  
      <!-- <h5 class="text-center text-light bg-secondary p-2">Welcome User</h5> -->
  

<div class="bg-light">
  <h3 class="text-center">Alankart</h3>
  <p class="text-center">The new world of online shopping</p>
</div>

<div class="row p-0">
<div class="col-md-10 ">
<div class="row px-4">
  
  
  
  <!-- Fetch data to display-->
  <?php
  include('./includes/connection.php');
  include('./Functions/common_fun.php');

  // calling fun
  getallproducts();
  // Getting Unique Categories
  // getuniquecategories();
  // // Getting Unique Brands
  // getuniquebrands()
  // Ip Address function
  
 
  
   
//   $select_query ="SELECT * FROM products ORDER BY rand() LIMIT 0,6";
//   $res = mysqli_query($con,$select_query);
//   while($row = mysqli_fetch_assoc($res))
//   {
//   $product_id = $row['product_id'];
//   $product_title =$row['product_title'];
//   $product_description =$row['product_description'];
//   $product_category = $row['product_category'];
//   $product_brands = $row['product_brands'];
//   $product_image = $row['product_image'];
//   $product_price = $row['product_price'];
  
//   echo "<div class='col-md-4 mb-4'>
//    <div class='card' style='width: 17rem;'>
// <img src='$product_image' class='card-img-top' alt='$product_title' height='300px'>
// <div class='card-body'>
//  <h5 class='card-title '>$product_title</h5>
//  <p class='card-text '>$product_description</p>
//  <a href='#' class='btn btn-warning '>Add to Cart</a>
//  <a href='#' class='btn btn-info '>View More</a>
// </div>
// </div>
// </div>";}
?>
</div>
</div>

<!-- Side NavBar -->
<div class="col-md-2 bg-secondary p-0">
<ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h5>Categories</h5></a>
      </li>
      <?php
      // Getting Categories
       getcategories();
      
      
      // $select_categories = "SELECT * FROM categories";
      // $result_categories = mysqli_query($con,$select_categories);
      // while($row_data=mysqli_fetch_assoc($result_categories)){
      //   $category_title = $row_data['category_title'];
      //   $category_id = $row_data['category_id'];
      
      // echo" <li class='nav-item'>
      // <a href='index.php?brand=$category_id'class='nav-link text-light'>$category_title</a>
      // </li> ";


      // }
      
      ?>
    </ul>
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h5>Delivery Brands</h5></a>
      </li>
      <?php

      include('./includes/connection.php');
       //Getting Brands Function
        getbrands();
      // $select_brands = "SELECT * FROM brands";
      // $result_brands = mysqli_query($con,$select_brands);
      // while($row_data=mysqli_fetch_assoc($result_brands)){
      //   $brand_title = $row_data['brand_title'];
      //   $brand_id = $row_data['brand_id'];

      // echo" <li class='nav-item'>
      // <a href='index.php?brand=$brand_id'class='nav-link text-light'>$brand_title</a>
      // </li> ";


      // }
      ?>
    </ul>
    
  </div>
</div>
<div class="container-fuild">
  <?php
 include('./footer.php');
 ?>
  </div>
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
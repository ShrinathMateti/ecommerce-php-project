<?php  
include('./includes/connection.php');
include('./Functions/common_fun.php');
?>


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
      .cart_img{
        width: 130px;
        height: 130px;
        object-fit: contain;
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
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php get_cart_num(); ?></sup></a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>

  
      <!-- <h5 class="text-center text-light bg-secondary p-2">Welcome User</h5> -->
  

<div class="bg-light">
  <h3 class="text-center">Alankart</h3>
  <p class="text-center">The new world of online shopping</p>
</div>
<br>
<br>

<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
             
             <tbody>
              <?php 
               global $con;
               $vIP = visitorip();
               $total_price = 0;
               $total_query = "SELECT * FROM `cart_details` WHERE ip_address='$vIP' ";
               $result = mysqli_query($con,$total_query);
                $result_count = mysqli_num_rows($result);
                if($result_count>0){
                   echo"<thead>
                   <tr>
                       <th>Product Title</th>
                       <th>Product Image</th>
                       <th>Quantity</th>
                       <th>Total Price</th>
                       <th>Remove</th>
                       <th>Operations</th>
                   </tr>
                </thead>";
                
               while($row = mysqli_fetch_array($result)){
                $product_id = $row['product_id'];
                $_query = "SELECT * FROM `products` WHERE product_id=$product_id ";
                $res = mysqli_query($con,$_query);
                while($row_product_price = mysqli_fetch_array($res)){
                   $product_price = array($row_product_price['product_price']);
                   $price_table = $row_product_price['product_price'];
                   $product_title = $row_product_price['product_title'];
                   $product_image = $row_product_price['product_image'];
                   $product_values = array_sum($product_price);
                   $total_price+=$product_values;
                   

              ?>
              <tr>
                <td><?php echo $product_title ?></td>
                <td><img src="<?php echo $product_image ?>" height="200px" class="cart_img"></td>
                <td><input  name="qty" class="form-input w-50 " placeholder="1" disabled></td>
                <?php 
                 $vIP = visitorip();
                 if(isset($_POST['update_cart'])){
                  $qty = $_POST['qty'];
                  $update = " UPDATE `cart_details` SET quantity =$qty  WHERE ip_address ='$vIP'  ";
                  $qtyres = mysqli_query($con,$update);
                  // $total_price=$total_price*$qty;
                  

                 }
                ?>
                <td><?php echo $price_table ?>/-</td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                <td>
                  <!-- <button class="btn-info text-dark px-3 rounded">Update</button> -->
                  <input type="submit" class="btn-info text-dark px-3 rounded" value="Update Cart" name="update_cart">
                  <!-- <button class="btn-info text-dark px-3 rounded">Remove</button> -->
                  <input type="submit" class="btn-info text-dark px-3 rounded" value="Remove" name="remove_cart">
                </td>
              </tr>
              <?php
                 } }
              }
              else{
                echo"<h2 class='text-center text-danger'>Cart is Empty</h2>";
                
              }
              ?>
             </tbody>
        </table>
        <!-- Subtotal -->
        <div class="d-flex mb-5 mt-4">
          <?php
           global $con;
           $vIP = visitorip();
          //  $total_price = 0;
           $total_query = "SELECT * FROM `cart_details` WHERE ip_address='$vIP' ";
           $result = mysqli_query($con,$total_query);
            $result_count = mysqli_num_rows($result);
            if($result_count>0){
             echo"<h5 class='px-3'>Subtotal:<strong class='text-info'>$total_price/-</strong></h5>
             <input type='submit' class='btn-warning text-dark px-3 rounded' value='Continue Shopping' name='Continue_Shopping'>
             
             <button class='btn-info text-dark px-3  ms-2 rounded'><a href='userarea/checkout.php' class='text-dark'>Checkout</a></button>";

            }
            else{
             echo"<input type='submit' class='btn-warning text-dark px-3 rounded' value='Continue Shopping' name='Continue_Shopping'>" ;
            }
            if(isset($_POST['Continue_Shopping'])){
              echo"<script>window.open('index.php','_self')</script>";
            }
          ?>
          
        </div><br><br>
    </div>
</div></form>
<?php 
function remove_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem']as $remove_id){
      echo $remove_id;
      $delete = "DELETE FROM `cart_details` WHERE product_id = $remove_id ";
      $run_delete = mysqli_query($con,$delete);
      if($run_delete){
        echo"<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item = remove_item();
?>
<div class="row p-0">
<div class='col-md-10 '>
<div class='row px-4'>
<!-- Fetch data to display-->
  <?php
  // include('./includes/connection.php');
  // include('./Functions/common_fun.php');

  // calling fun
    // getproducts();
  // Getting Unique Categories
//   getuniquecategories();
  // Getting Unique Brands
//   getuniquebrands();
  // Ip Address function
  
    visitorip();
  // echo "Visitor IP Addr:".$vIP;
  
   // Get Cart
   getcart();

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
<!-- <div class="col-md-2 bg-secondary p-0">
<ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h5>Categories</h5></a>
      </li>
      <?php
      // Getting Categories
    //   getcategories();
      
      
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

    //   include('./includes/connection.php');
       //Getting Brands Function
    //    getbrands();
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
    
  </div> -->
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
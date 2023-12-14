<?php
//include('../includes/connection.php')

//getting products

 function getproducts(){
   global $con;
  //isset condn check
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    $select_query ="SELECT * FROM products ORDER BY rand() LIMIT 0,6";
    $res = mysqli_query($con,$select_query);
    while($row = mysqli_fetch_assoc($res))
    {
    $product_id = $row['product_id'];
    $product_title =$row['product_title'];
    $product_description =$row['product_description'];
    $product_category = $row['product_category'];
    $product_brands = $row['product_brands'];
    $product_image = $row['product_image'];
    $product_price = $row['product_price'];
    
    echo "<div class='col-md-4 mb-4'>
     <div class='card' style='width: 17rem;'>
  <img src='$product_image' class='card-img-top' alt='$product_title' height='300px'>
  <div class='card-body'>
   <h5 class='card-title '>$product_title</h5>
   <p class='card-text '>$product_description</p>
   <h6 class='card-text'> ₹ $product_price</h6>
   <a href='index.php?addtocart=$product_id' class='btn btn-warning '>Add to Cart</a>
   <a href='product_details.php?product_id=$product_id' class='btn btn-info '>View More</a>
  </div>
  </div>
  </div>";}
     }
    }
  }

//Getting unique categories

function getuniquecategories(){
     global $con;
 // Checking isset or not
     if(isset($_GET['category'])){
      $product_category = $_GET['category'];
      $select_query ="SELECT * FROM products WHERE product_category = $product_category ";
      $res = mysqli_query($con,$select_query);
      $num_of_rows = mysqli_num_rows($res);
     if($num_of_rows==0){
      echo"<h3 class='text-center text-danger'>No Stock Available For This Category</h3>";
     }


      while($row = mysqli_fetch_assoc($res))
      {
      $product_id = $row['product_id'];
      $product_title =$row['product_title'];
      $product_description =$row['product_description'];
      $product_category = $row['product_category'];
      $product_brands = $row['product_brands'];
      $product_image = $row['product_image'];
      $product_price = $row['product_price'];
      
      echo "<div class='col-md-4 mb-4'>
       <div class='card' style='width: 17rem;'>
    <img src='$product_image' class='card-img-top' alt='$product_title' height='300px'>
    <div class='card-body'>
     <h5 class='card-title '>$product_title</h5>
     <p class='card-text '>$product_description</p>
     <a href='index.php?addtocart=$product_id' class='btn btn-warning '>Add to Cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-info '>View More</a>
    </div>
    </div>
    </div>";}
      }
  
}

// Getting Unique Brands

function getuniquebrands(){
  global $con;
// Checking isset or not
  if(isset($_GET['brand'])){
   $product_brands = $_GET['brand'];
   $select_query ="SELECT * FROM products WHERE product_brands = $product_brands ";
   $res = mysqli_query($con,$select_query);
   $num_of_rows = mysqli_num_rows($res);
  if($num_of_rows==0){
   echo"<h3 class='text-center text-danger'>This Brand Not Available For Sevice</h3>";
  }


   while($row = mysqli_fetch_assoc($res))
   {
   $product_id = $row['product_id'];
   $product_title =$row['product_title'];
   $product_description =$row['product_description'];
   $product_category = $row['product_category'];
   $product_brands = $row['product_brands'];
   $product_image = $row['product_image'];
   $product_price = $row['product_price'];
   
   echo "<div class='col-md-4 mb-4'>
    <div class='card' style='width: 17rem;'>
 <img src='$product_image' class='card-img-top' alt='$product_title' height='300px'>
 <div class='card-body'>
  <h5 class='card-title '>$product_title</h5>
  <p class='card-text '>$product_description</p>
  <a href='index.php?addtocart=$product_id' class='btn btn-warning '>Add to Cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-info '>View More</a>
 </div>
 </div>
 </div>";}
   }

}

// Brands Function

function getbrands(){
    global $con;
    $select_brands = "SELECT * FROM brands";
      $result_brands = mysqli_query($con,$select_brands);
      while($row_data=mysqli_fetch_assoc($result_brands)){
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];

      echo" <li class='nav-item'>
      <a href = 'index.php?brand=$brand_id'class='nav-link text-light'>$brand_title</a>
      </li> ";


      }
}



function getcategories(){
    global $con;
    $select_categories = "SELECT * FROM categories";
      $result_categories = mysqli_query($con,$select_categories);
      while($row_data=mysqli_fetch_assoc($result_categories)){
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];

      echo" <li class='nav-item'>
      <a href='index.php?category=$category_id'class='nav-link text-light'>$category_title</a>
      </li> ";

      }
    
}


//getting allproducts

function getallproducts(){

  global $con;
//isset condn check
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
  $select_query ="SELECT * FROM products ORDER BY rand() ";
  $res = mysqli_query($con,$select_query);
  while($row = mysqli_fetch_assoc($res))
  {
  $product_id = $row['product_id'];
  $product_title =$row['product_title'];
  $product_description =$row['product_description'];
  $product_category = $row['product_category'];
  $product_brands = $row['product_brands'];
  $product_image = $row['product_image'];
  $product_price = $row['product_price'];
  
  echo "<div class='col-md-4 mb-4'>
   <div class='card' style='width: 17rem;'>
<img src='$product_image' class='card-img-top' alt='$product_title' height='300px'>
<div class='card-body'>
 <h5 class='card-title '>$product_title</h5>
 <p class='card-text '>$product_description</p>
 <h6 class='card-text'> ₹ $product_price</h6>
 <a href='index.php?addtocart=$product_id' class='btn btn-warning '>Add to Cart</a>
 <a href='product_details.php?product_id=$product_id' class='btn btn-info '>View More</a>
</div>
</div>
</div>";}
   }
  }
}

//Get Search 
function search_products(){
  global $con;
  //isset condn
   if(isset( $_GET['search_data_product'])){
     $search_data = $_GET['search_data'];
    $search_query ="SELECT * FROM products WHERE product_keywords like '%$search_data%'";
    $res = mysqli_query($con,$search_query);
    $num_of_rows = mysqli_num_rows($res);
     if($num_of_rows==0){
      echo"<h3 class='text-center text-danger'> No Result Matched,No Product Found. </h3>";
     }
    while($row = mysqli_fetch_assoc($res))
    {
    $product_id = $row['product_id'];
    $product_title =$row['product_title'];
    $product_description =$row['product_description'];
    $product_category = $row['product_category'];
    $product_brands = $row['product_brands'];
    $product_image = $row['product_image'];
    $product_price = $row['product_price'];
    
    echo "<div class='col-md-4 mb-4'>
     <div class='card' style='width: 17rem;'>
  <img src='$product_image' class='card-img-top' alt='$product_title' height='300px'>
  <div class='card-body'>
   <h5 class='card-title '>$product_title</h5>
   <p class='card-text '>$product_description</p>
   <h6 class='card-text'> ₹ $product_price</h6>
   <a href='index.php?addtocart=$product_id' class='btn btn-warning '>Add to Cart</a>
   <a href='product_details.php?product_id=$product_id' class='btn btn-info '>View More</a>
  </div>
  </div>
  </div>";}
     }
    }

// Get Ip Address Function

  
  function visitorip() {  
  //Check if visitor is from shared network 
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $vIP = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //Check if visitor is using a proxy 
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){  
              $vIP = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
  //check for the remote address of visitor.  
  else{  
            $vIP = $_SERVER['REMOTE_ADDR'];  
    }  
    return $vIP;  
  }  
    
  
// Cart Function

function getcart(){
// check isset condn
if(isset($_GET['addtocart'])){
  global $con;
  $vIP = visitorip();
  $get_product_id = $_GET['addtocart'];
  $add_query = "SELECT * FROM `cart_details` WHERE ip_address='$vIP' AND product_id= $get_product_id ";
  $result = mysqli_query($con,$add_query);
  $num_of_rows = mysqli_num_rows($result);
     if($num_of_rows>0){
      echo"<script>alert('Item Already Exist In Cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";
     }
     else{
      $in_query = "INSERT INTO cart_details(product_id, ip_address, quantity) VALUES ($get_product_id,'$vIP',0)";
      $res = mysqli_query($con,$in_query);
      echo"<script>alert('Item Added to Cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";
     }
}
}

// Get Cart Icon Number

function get_cart_num(){
  // check isset condn
if(isset($_GET['addtocart'])){
  global $con;
  $vIP = visitorip();
  $add_query = "SELECT * FROM `cart_details` WHERE ip_address='$vIP' ";
  $result = mysqli_query($con,$add_query);
  $num_of_rows = mysqli_num_rows($result);
}
else{
  global $con;
  $vIP = visitorip();
  $add_query = "SELECT * FROM `cart_details` WHERE ip_address='$vIP' ";
  $result = mysqli_query($con,$add_query);
  $num_of_rows = mysqli_num_rows($result);
}
echo $num_of_rows;
}

function total_cart(){
  global $con;
  $vIP = visitorip();
  $total_price = 0;
  $total_query = "SELECT * FROM `cart_details` WHERE ip_address='$vIP' ";
  $result = mysqli_query($con,$total_query);
  while($row = mysqli_fetch_array($result)){
   $product_id = $row['product_id'];
   $_query = "SELECT * FROM `products` WHERE product_id=$product_id ";
   $res = mysqli_query($con,$_query);
   while($row_product_price = mysqli_fetch_array($res)){
      $product_price = array($row_product_price['product_price']);
      $product_values = array_sum($product_price);
      $total_price+=$product_values;
   }
  }
 echo $total_price;
}

//Get Order Details

function getorder_details(){
global  $con;
$order_details = "SELECT * FROM `user_data` WHERE user_name = 0 ";
$order_result = mysqli_query($con,$order_details);
while($row_query=mysqli_fetch_array($order_result)){
  $user_id = $row_query['user_id'];
  if(!isset($_GET['edit_account'])){
    if(!isset($_GET['my_orders'])){
      if(!isset($_GET['delete_account'])){
        $get_orders ="SELECT * FROM `user_orders` WHERE user_id = $user_id AND order_status='pending'";
        $get_orders_result = mysqli_query($con,$get_orders);
        $count_rows = mysqli_num_rows($get_orders_result);
        if($count_rows>0){
          echo "<h4 class='text-center text-success my-3'>You have <span class='text-danger'>$count_rows </span> pending orders</h4>
          <p class='text-center'><a href='user_dash.php?my_orders' class='text-decoration-underline'>Orders Details</a></p>";
        }
        else{
          echo "<h4 class='text-center text-success my-3'>You have <span class='text-danger'>0</span> pending orders</h4>
          <p class='text-center'><a href='../index.php' class='text-decoration-underline'>Explore Products</a></p>";
        }
      }
    }
  }
}
}

?>




<?php
include('../includes/connection.php');
include('../Functions/common_fun.php');

if(isset($_GET['user_id'])){
   $user_id = $_GET['user_id'];
   
}


//getting total items & total price of all items
$get_ip = visitorip();
$total_price=0;
$cart_query = "SELECT * FROM `cart_details` WHERE  ip_address='$get_ip'";
$result_cart_query= mysqli_query($con,$cart_query);
$invoice_number = mt_rand() ;
$status='pending';
$count_products = mysqli_num_rows($result_cart_query);
while($row_price =mysqli_fetch_array($result_cart_query)){
   $product_id = $row_price['product_id'] ;
   $product_query = "SELECT * FROM `products` WHERE  product_id=$product_id";
   $p_res=mysqli_query($con,$product_query);
   while($row_product_price =mysqli_fetch_array($p_res)){
    $product_price = array($row_product_price['product_price'] );
    $product_values = array_sum($product_price);
    $total_price+=$product_values;
   }
}

//getting quantity from cart

$get_cart ="SELECT * FROM `cart_details`";
$run_cart = mysqli_query($con,$get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];
if($quantity==0){
   $quantity=1;
   $subtotal=$total_price;

}else{
   $quantity=$quantity;
   $subtotal=$total_price*$quantity;
}

//Insert Query For Orders

$insert_orders="INSERT INTO `user_orders`( user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_order=mysqli_query($con,$insert_orders);
if($result_order){
    echo"<script>alert('Orders are submitted successfully')</script>";
    echo"<script>window.open('user_dash.php','_self')</script>";
}


//Query for pending orders

$insert_pending_orders="INSERT INTO `order_pending`( user_id,invoice_number,product_id,quantity,order_status) VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_order_pending= mysqli_query($con,$insert_pending_orders);

//deleting cart items

$empty_cart="DELETE FROM `cart_details` WHERE ip_address='$get_ip' ";
$del_cart=mysqli_query($con,$empty_cart);


?>
<!DOCTYPE html>
<html>
<head>
<title>Alankart: Order Page</title>
<!-- favicon link -->
<link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
 <!-- bootstrap cdn -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>








<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
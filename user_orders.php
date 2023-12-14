<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<?php
//  include('../includes/connection.php');
$getuser ="SELECT *FROM `user_data` WHERE user_name = 0 ";
$res = mysqli_query($con,$getuser);
$row_fetch = mysqli_fetch_assoc($res);
$user_id = $row_fetch['user_id'];

?>
<h4 class="text-success">All My Orders</h4>
<table class="table table-bordered mt-5">
<thead class="bg-info">
    <tr>
        <th>Sr No</th>
        <th>Amount Due</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $get_orders ="SELECT * FROM `user_orders` WHERE user_id = $user_id ";
    $get_orders_result = mysqli_query($con,$get_orders);
    $number=1;
    while($row_orders = mysqli_fetch_assoc($get_orders_result)){
     $order_id = $row_orders['order_id'];
     $amount_due = $row_orders['amount_due'];
     $invoice_number = $row_orders['invoice_number'];
     $total_products = $row_orders['total_products'];
     $order_date = $row_orders['order_date'];
     $order_status = $row_orders['order_status'];
     if($order_status=='pending'){
        $order_status='Incomplete';
     }else{
        $order_status='Complete';
     }
     $number=1;
     echo" <tr>
     <th>$number</th>
     <th>$amount_due</th>
     <th>$invoice_number</th>
     <th>$total_products</th>
     <th>$order_date</th>
     <th>$order_status</th>
     <td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
     </tr>";
     $number++;
    }
    ?>
   
</tbody>
</table>
</body>
</html>
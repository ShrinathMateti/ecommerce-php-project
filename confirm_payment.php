<?php
include('../includes/connection.php');
//session start
 session_start();

 if(isset($_GET['order_id'])){
  $order_id = $_GET['order_id'];
  $select_data ="SELECT * FROM `user_orders` WHERE order_id=$order_id ";
  $query = mysqli_query($con,$select_data);
  $fetch_order = mysqli_fetch_assoc($query);
  $invoice_number = $fetch_order['invoice_number'];
  $amount_due = $fetch_order['amount_due'];
 }

 if(isset($_POST['confirm_payment'])){
  $invoice_number = $_POST['invoice_number'];
  $amount = $_POST['amount'];
  $payment_mode =$_POST['payment_mode'];
  $insert_pay = "INSERT INTO `user_payments`( order_id, invoice_number, amount, payment_mode) VALUES ($order_id,$invoice_number,$amount,'$payment_mode')";
  $res_insert = mysqli_query($con,$insert_pay);
  if($res_insert){
    echo"<script>window.open('user_dash.php?my_orders','_self')</script>";
  }

  $update_query ="UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
  $up_result = mysqli_query($con,$update_query);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <br/>
    <h3 class="text-center text-light mb-5 mt-5">Confirm Payment</h3>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 my-4 ">
              <img src="https://archive.factordaily.com/wp-content/uploads/2019/04/India-Payments.jpg" alt="noimage" height="30%">
            </div>
            <div class="col-md-6 my-4 text-center">
                <form method="post" action="" class="mt-3">
                    <div class="form-outline mb-4">
                    <input type="text" class="form-control w-50 m-auto text-center" name="invoice_number" value="<?php echo $invoice_number ?>">
                    </div>
                    <div class="form-outline mb-4">
                    <label class="text-light" >Amount</label>
                    <input type="text" class="form-control w-50 m-auto text-center" name="amount" value="<?php echo $amount_due ?>"> 
                    </div>
                    <div class="form-outline mb-4">
                    <select name="payment_mode" class="form-select w-50 m-auto">
                        <option>Select Payment Mode</option>
                        <option>UPI</option>
                        <option>Netbanking</option>
                        <option>PayPal</option>
                        <option>Pay On Delivery</option>
                    </select>
                    </div>
                    <div class="form-outline mb-4">
                    <input type="submit"  name="confirm_payment" value="Confirm Payment" class="bg-info text-dark w-50 px-3 py-2 m-auto border-0">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
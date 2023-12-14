<?php  
include('../includes/connection.php');
include('../Functions/common_fun.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alankart:Payment Page</title>
    <!-- favicon link -->
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
 img{
    height: 70%;
    width: 100%;
 }
 #i{
    height: 356px;
 }
</style>
</head>
<?php
$ip = visitorip();
$get_user="SELECT * FROM `user_data` WHERE user_ip='$ip'";
$result=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];

?>
<body class="bg-dark">
    <div class="container mt-3">
        <h2 class="text-center text-info">Payment Options</h2>
        <br>
        <div class="row d-flex justify-content-center align-items-center mt-4">
            <div class="col-md-6 text-center">
                <a href="https://www.razorpay.com/" target="blank"><img src="https://akm-img-a-in.tosshub.com/indiatoday/images/story/202212/upi_0-sixteen_nine.jpg?VersionId=0zmtsk5G5IIzr_90yS4kX22cpZWwGfWO&size=690:388" alt="online payment" />Online Payment</a>
            </div>
            <div class="col-md-6 text-center">
                <a href="./order.php?user_id=<?php echo $user_id  ?>"><img src="https://d2kh7o38xye1vj.cloudfront.net/wp-content/uploads/2019/02/pay-on-delivery-for-eCommerce-1.jpg" id="i" alt="offline payment" />Pay On Delivery</a>
            </div>
        </div>
    </div>




<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
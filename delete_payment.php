<html>

<?php

if (isset($_GET['delete_payment'])) {
    $delete_id = $_GET['delete_payment'];
    // echo $delete_id;
    $delete = "DELETE FROM `user_payments` WHERE payment_id=$delete_id";
    $del_result = mysqli_query($con, $delete);
    if ($del_result) {
        echo "<div class='alert alert-success' role='alert'>
        This is a success alert—check it out!
      </div>";
        echo "<script>alert('Payment Deleted Successfully')</script>";
        echo "<script>window.open('./view_payments.php','_self')</script>";
    }
}
?>

</html>
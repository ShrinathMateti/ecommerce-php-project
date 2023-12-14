<html>

<?php

if (isset($_GET['delete_order'])) {
    $delete_id = $_GET['delete_order'];
    // echo $delete_id;
    $delete = "DELETE FROM `user_orders` WHERE order_id=$delete_id";
    $del_result = mysqli_query($con, $delete);
    if ($del_result) {
        echo "<div class='alert alert-success' role='alert'>
        This is a success alert—check it out!
      </div>";
        echo "<script>alert('Order Deleted Successfully')</script>";
        echo "<script>window.open('./list_orders.php','_self')</script>";
    }
}
?>

</html>
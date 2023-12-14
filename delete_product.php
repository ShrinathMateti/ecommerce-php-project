<html>

<?php

if (isset($_GET['delete_product'])) {
    $delete_id = $_GET['delete_product'];
    // echo $delete_id;
    $delete = "DELETE FROM `products` WHERE product_id=$delete_id";
    $del_result = mysqli_query($con, $delete);
    if ($del_result) {
        echo "<div class='alert alert-success' role='alert'>
        This is a success alert—check it out!
      </div>";
        echo "<script>alert('Product Deleted Successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>

</html>
<html>

<?php

if (isset($_GET['delete_brand'])) {
    $delete_id = $_GET['delete_brand'];
    // echo $delete_id;
    $delete = "DELETE FROM `brands` WHERE brand_id=$delete_id";
    $del_result = mysqli_query($con, $delete);
    if ($del_result) {
        echo "<div class='alert alert-success' role='alert'>
        This is a success alert—check it out!
      </div>";
        echo "<script>alert('Brand Deleted Successfully')</script>";
        echo "<script>window.open('./view_brands.php','_self')</script>";
    }
}
?>

</html>
<html>

<?php

if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];
    // echo $delete_id;
    $delete = "DELETE FROM `categories` WHERE category_id=$delete_id";
    $del_result = mysqli_query($con, $delete);
    if ($del_result) {
        echo "<div class='alert alert-success' role='alert'>
        This is a success alert—check it out!
      </div>";
        echo "<script>alert('Category Deleted Successfully')</script>";
        echo "<script>window.open('./view_categories.php','_self')</script>";
    }
}
?>

</html>
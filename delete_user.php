<html>

<?php

if (isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];
    // echo $delete_id;
    $delete = "DELETE FROM `user_data` WHERE user_id=$delete_id";
    $del_result = mysqli_query($con, $delete);
    if ($del_result) {
        echo "<div class='alert alert-success' role='alert'>
        This is a success alert—check it out!
      </div>";
        echo "<script>alert('User Deleted Successfully')</script>";
        echo "<script>window.open('./view_users.php','_self')</script>";
    }
}
?>

</html>
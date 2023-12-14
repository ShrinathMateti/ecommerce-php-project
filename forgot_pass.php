<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alankart: Forgot Password</title>
    <!-- favicon link -->
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <br />
    <h5 class="text-light text-center mt-5 mb-5">Update Your Password Here</h5>

    <center>
        <form method="post" action="">
            <input type="password" placeholder="Enter Old Password" class="" name="old"><br /><br />
            <input type="password" placeholder="Enter New Password" class="" name="new"><br /><br />
            <input type="password" placeholder="Confirm New Password" class="" name="again"><br /><br />
            <input type="submit" value="Update Password" class="text-light mt-2 btn btn-primary mb-3" name="update"><br />
            <a href="./admin_login.php" class="text-primary">Click Here To Login</a>


        </form>
    </center>

</body>
<?php
include('../includes/connection.php');
if (isset($_POST['update'])) {
    $old_pass = $_POST['old'];
    $new_pass = $_POST['new'];
    $confrimpass = $_POST['again'];
    if ($new_pass == $confrimpass) {
        //update query for password
        $pass_update = "UPDATE `admin_details` SET password='$new_pass' WHERE password='$old_pass'";
        $result = mysqli_query($con, $pass_update);
        echo "<script>alert('Password Updated Successfully')</script>";
    } else {
        echo "<script>alert('new password not matched')</script>";
    }
}


?>

</html>
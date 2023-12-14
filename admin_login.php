<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alankart: Admin Login</title>
    <!-- favicon link -->
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark">
    <div class="container">
        <br />
        <div class="row">
            <h4 class="text-light text-center mt-5"><i class="fa-solid fa-basket-shopping"></i> Alankart Admin Login</h4>
            <div class="col-md-6 mt-5">
                <img src="https://t4.ftcdn.net/jpg/02/55/77/03/360_F_255770374_rbmJO9gkkIhMBcyVPc3iW016BCLDvcWc.jpg" alt="admin_image" height="425px" class="img-fluid">
            </div>
            <div class="col-md-6 text-center text-light mt-4">

                <img src="https://img.freepik.com/premium-vector/freelance-sticker-logo-icon-vector-man-with-desktop-blogger-with-laptop-icon-vector-isolated-background-eps-10_399089-1098.jpg" alt="" class="margin-auto mt-4" height="70px">
                <form method="post" action="">
                    <center>
                        <div class="mb-2 mt-2">
                            <label for="Username" class="form-label"></label>
                            <input type="text" class="form-control w-50 " id="exampleInputText" name="username" aria-describedby="nameHelp" placeholder="Enter Username" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label"></label>
                            <input type="password" class="form-control w-50 " id="exampleInputPassword1" name="password" placeholder="Enter Password" required>
                        </div>
                        <input type="submit" class="btn btn-info w-50 mt-3 text-dark" value="Login" name="login">

                    </center>
                </form>
                <br />
                Don't Have An Account? <a href="./admin_registration.php" class="text-info">Register</a>
                <br />
                <br />
                Forgot your Password? <a href="./forgot_pass.php" class="">Click Here</a>
                <br />
                <a href="../index.php" class="text-warning">Click Here For Website</a>
            </div>
        </div>
    </div>
</body>
<?php
include('../includes/connection.php');
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION["user_name"] = $username;
    //Query
    $log_query = "SELECT * FROM `admin_details` WHERE user_name='$username' && password='$password'";
    $log_result = mysqli_query($con, $log_query);
    $row_count = mysqli_num_rows($log_result);
    if ($row_count > 0) {
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "<script>alert('Invalid Username or Password')</script>";
    }
}


?>

</html>
<?php
include('../includes/connection.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];
    //Checking does user already exist
    // $sql = "SELECT * FROM admin_details WHERE user_name=$username";
    // $check = mysqli_query($con, $sql);
    // $row_count = mysqli_num_rows($check);
    // if ($row_count > 0) {
    //     echo "<script>alert('Username already exists')</script>";
    // } else if ($password != $cpass) {
    //     echo "<script>alert('Passwords Not Matched')</script>";
    // } else {
    // insert query
    if ($password != $cpass) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Passwords Not Matched</strong> Both Passwords Must Match
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {
        $admin = "INSERT INTO `admin_details`(user_name, email, password) VALUES ('$username','$email','$password')";
        $result = mysqli_query($con, $admin);
        if ($result) {
            echo "<script>alert('Admin Registration Successful')</script>";
            echo "<script>window.open('./admin_login.php','_self')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alankart: Admin Registration</title>
    <!-- favicon link -->
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-y: hidden;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row">
            <h4 class="text-light text-center mt-5"><i class="fa-solid fa-basket-shopping"></i> Alankart Admin Registration</h4>
            <div class="col-md-6 mt-4">
                <img src="https://img.freepik.com/free-vector/businessman-technology-measuring-eye-position-movement-tiny-people-eye-tracking-technology-gaze-tracking-eye-position-sensor-concept_335657-2443.jpg" alt="admin_image" class="mt-5 img-fluid" height="470px">
            </div>
            <div class="col-md-6 text-center text-light mt-5">
                <img src="https://img.freepik.com/premium-vector/profile-icon_942802-353.jpg?w=360" alt="" class="margin-auto mt-3" height="50px">
                <form method="post" action="">
                    <center>
                        <div class="mb-2 mt-2">
                            <label for="Username" class="form-label"></label>
                            <input type="text" class="form-control w-50 " id="exampleInputText" name="username" aria-describedby="nameHelp" placeholder="Enter Username" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"></label>
                            <input type="email" class="form-control w-50 " id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter Email address" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label"></label>
                            <input type="password" class="form-control w-50 " id="exampleInputPassword1" name="password" placeholder="Enter Password" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputPassword2" class="form-label"></label>
                            <input type="password" class="form-control w-50 " id="exampleInputPassword2" placeholder="Confirm Password" name="cpass" required>
                        </div>
                        <input type="submit" class="btn btn-info w-50 mt-3 text-dark" value="Register" name="register">

                    </center>
                </form>
                <br />
                Already Have An Account? <a href="./admin_login.php" class="text-info">Login</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
<?php
include('../includes/connection.php');
include('../Functions/common_fun.php');

if (isset($_POST['user_register'])) {
  $user_name = $_POST['user_name'];
  $user_email = $_POST['email'];
  $user_password = $_POST['password'];
  $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
  $cpassword = $_POST['cpassword'];
  $user_address = $_POST['user_address'];
  $user_mobile = $_POST['mobile_no'];
  $get_userip = visitorip();
  // select query
  $choice = "SELECT * FROM `user_data` WHERE user_name='$user_name'";
  $got = mysqli_query($con, $choice);
  $rows_count = mysqli_num_rows($got);
  if ($rows_count > 0) {
    echo "<script>alert('Username Already Exists')</script>";
  } else if ($user_password != $cpassword) {
    echo "<script>alert('Passwords Not Matched')</script>";
  } else {
    // insert query
    $register = "INSERT INTO `user_data`( user_name, email, password, user_ip, user_address, mobile_no) VALUES ('$user_name','$user_email','$hash_password','$get_userip','$user_address','$user_mobile')";
    $sql_register = mysqli_query($con, $register);
    if ($sql_register) {
      echo "<script>alert('Registered Successfully')</script>";
    }
  }
  //selecting cart items
  $sel = "SELECT * FROM `cart_details` WHERE ip_address='$get_userip'";
  $res = mysqli_query($con, $sel);
  $rows_count = mysqli_num_rows($res);
  if ($rows_count > 0) {
    $_SESSION['user_name'] = $user_name;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  } else {
    echo "<script>window.open('../index.php','_self')</script>";
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Alankart:Registration</title>
  <!-- favicon link -->
  <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .container-fuild {
      margin-left: 0px;
      margin-right: 0px;
      overflow: hidden;
    }

    a {
      text-decoration: none;
      color: black;
    }

    #u {
      text-decoration: underline;
      color: blue;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fuild p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-basket-shopping fa-fade"></i> Alankart</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./checkout.php">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>

          </ul>

        </div>
      </div>
    </nav>
    <div class="container mt-2">
      <center>
        <img src="https://melissokomikossullogosfarsalon.gr/wp-content/uploads/2022/12/registration.png" alt="" srcset="" height="80px" class="align-items-center justify-content-center">
      </center>
      <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
          <form action="" method="post">
            <div class="form-outline mb-3">
              <label for="name">Username</label>
              <input type="text" class="form-control" name="user_name" id="username" placeholder="Enter your username" required>
            </div>
            <div class="form-outline mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-outline mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="form-outline mb-3">
              <label for="password">Confirm Password</label>
              <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password" required>
            </div>
            <div class="form-outline mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="user_address" id="addresss" placeholder="Enter your address" required>
            </div>
            <div class="form-outline mb-3">
              <label for="mobile">Mobile No</label>
              <input type="number" class="form-control" name="mobile_no" id="mobile" placeholder="Enter your Mobile No" required>
            </div>
            <div class="text-center">
              <input type="submit" name="user_register" class="btn btn-info w-100" value="Register">
              <p class="fw-bold mt-2">
                Already have an account?<a href="./checkout.php" id="u"> Login</a>
              </p>
              <a href="../index.php" class="btn btn-warning">Back To Home</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container-fuild">
      <?php
      include('../footer.php');
      ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
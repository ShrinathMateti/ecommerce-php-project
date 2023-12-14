<?php  
include('../includes/connection.php');
// include('./Functions/common_fun.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alankart: The new world of shopping</title>
    <!-- favicon link -->
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
     .container-fuild{
          margin-left: 0px;
          margin-right: 0px;
          overflow: hidden;
        }
      
      a{
        text-decoration: none;
        color:black;
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
          <a class="nav-link" href="../displayall.php">Products</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="./user_registration.php">Register</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        
      </ul>
      <form class="d-flex" action="search.php" method="get">
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-dark" type="submit">Search</button> -->
        
        <!-- <a href="./userarea/checkout.php"  class="btn btn-outline-dark btn-btn-link" name="login"  >Login</a> -->
      </form>
    </div>
  </div>
</nav>

  
      <!-- <h5 class="text-center text-light bg-secondary p-2">Welcome User</h5> -->
  

<div class="bg-light">
  <h3 class="text-center">Alankart</h3>
  <p class="text-center">The new world of online shopping</p>
</div>

<div class="row p-0">
<div class='col-md-10 '>
<div class='row px-4'>
<?php
if(!isset($_SESSION['username'])){
    include('./userlogin.php');
}
else{
    include('./payment.php');
}
?>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container-fuild">
  <?php
 include('../footer.php');
 ?>
  </div>
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
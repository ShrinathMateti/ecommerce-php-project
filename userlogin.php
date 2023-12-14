
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alankart:User Login</title>
    <!-- favicon link -->
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1237/1237021.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      
        .login {
            max-width: 400px;
            margin-left: 530px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        
        .login img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px;
        }
        
        .login input[type="text"],
        .login input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .login button {
             
            color: white;
            padding: 14px 20px;
            margin-top: 5px;
            width: 100%;
            font-size: large;
            cursor: pointer;
        }

        h4{
            text-align: center;
        }
        a{
        text-decoration: none;
        color:black;
    }
    #u{
      text-decoration: underline;
      color:blue;
    }
    
    </style>
</head>
<body>
<div class="login">
        <img src="https://t3.ftcdn.net/jpg/05/17/79/88/360_F_517798849_WuXhHTpg2djTbfNf0FQAjzFEoluHpnct.jpg" alt="Logo" height="100px">
        <h4>User Login</h4>
        <form action="" method="post">
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="pass" required>
            <a href="#"><button type="submit" class="btn-info text-dark" name="userlogin">Login</button></a>
        </form>
        <br>
        <center>
        Don't have an account?<a href="./user_registration.php" id="u">Register</a>
        </center>
</div>
</body>
</html>
<?php
include('../includes/connection.php');
include('../Functions/common_fun.php');
@session_start();
if(isset($_POST['userlogin'])){
    $user_username = $_POST['username'];
    $user_userpassword = $_POST['pass'];
    $ip = visitorip();
    $sql = "SELECT * FROM `user_data` WHERE user_name='$user_username'";
    $res = mysqli_query($con,$sql);

    $row_count = mysqli_num_rows($res);
    $row_data = mysqli_fetch_assoc($res);
//   Cart Item Query
$select_sql = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
$result = mysqli_query($con,$select_sql);

$row_count_cart= mysqli_num_rows($result);
    if($row_count>0){
        $_SESSION['user_name']=$user_username;
     if(password_verify($user_userpassword,$row_data['password'])){
        // echo"<script>alert('Login Successfully')</script>";
        if($row_count==1 and $row_count_cart=0){
            $_SESSION['user_name']=$user_username;
            echo"<script>alert('Login Successfully')</script>";
            echo"<script>window.open('user_dash.php','_self')</script>";
        }else{
            $_SESSION['user_name']=$user_username;
            echo"<script>alert('Login Successfully')</script>";
            echo"<script>window.open('payment.php','_self')</script>";
        }
     }else{
        echo"<script>alert('Invalid Credentials')</script>";
    }
    }
    else{
        echo"<script>alert('Invalid Credentials')</script>";
    }
}
?>
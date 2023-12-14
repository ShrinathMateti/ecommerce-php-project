<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h3 class="text-danger mt-5 mb-5">Delete Account</h3>
    <form action="" method="post" class="mt-4">
       <div class="form-outline mb-4 ">
          <input type="submit" value="Delete Account" name="delete" class="form-control bg-danger text-light w-50 m-auto ">
       </div>
       <div class="form-outline mb-4 ">
          <input type="submit" value="Don't Delete Account" class="form-control bg-danger text-light w-50 m-auto " name="dont_delete">
       </div>
    </form>
</body>
</html>
<?php
$select_name = "SELECT * FROM `user_data` WHERE user_name = 0 ";
$name_query = mysqli_query($con,$select_name) ;
$row_name = mysqli_fetch_array($name_query);
$user_name = $row_name['user_name'];

if(isset($_POST['delete'])){
    $delete ="DELETE FROM `user_data` WHERE user_name= $user_name ";
    $del_result = mysqli_query($con,$delete);
    if($del_result){
        session_destroy();
        echo"<script>alert('Account Deleted Successfully')</script>";
        echo"<script>window.open('../index.php','_self')</script>";
    }
}

if(isset($_POST['dont_delete'])){
    echo"<script>window.open('user_dash.php','_self')</script>";
}
?>
<?php
if(isset($_GET['edit_account'])){
    $select = "SELECT * FROM `user_data` WHERE user_name = 0 ";
    $name = mysqli_query($con,$select) ;
    $fetch = mysqli_fetch_assoc($name);
    $user_id = $fetch['user_id'];
    $user_name = $fetch['user_name'];
    $user_email = $fetch['email'];
    $user_address = $fetch['user_address'];
    $user_mobile = $fetch['mobile_no'];}
     
    if(isset($_POST['update'])){
        $update_id = $user_id;
        $user_name = $_POST['user_name'];
        $user_email = $_POST['email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['mobile_no'];
        
        //Update Account Query

        $update_data = "UPDATE `user_data` SET user_name='$user_name',email='$user_email',user_address='$user_address',mobile_no='$user_mobile' WHERE user_id=$update_id ";
        $update_result = mysqli_query($con,$update_data);

        if($update_result){
            echo"<script>alert('Account Updated')</script>";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
    .p{
       height: 100px;
       width: 100px;
    }
</style>
<body>
    
    <h4 class="text-success mb-2 mt-5">Edit Account</h4>
    <img src="https://cdn.iconscout.com/icon/premium/png-128-thumb/account-update-4468257-3704755.png" alt="noimage" class="p">
    <form action="" method="post" >
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_name" placeholder="Enter new username" value="<?php echo $user_name ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="email" placeholder="Enter your email id" value="<?php echo $user_email ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" placeholder="Enter your address" value="<?php echo $user_address ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="mobile_no" placeholder="Enter your mobile number" value="<?php echo $user_mobile ?>">
        </div>
        <input type="submit" class="bg-info w-50 m-auto" value="Update Account" name="update">
    </form>
</body>
</html>
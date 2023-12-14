<?php
  
include('../includes/connection.php');

if(isset($_POST['insert_brand'])){
  $brand_title = $_POST['brand_title'];

  $select_query ="SELECT * FROM brands WHERE brand_title = '$brand_title' ";
  $answer_select = mysqli_query($con,$select_query);
  $number = mysqli_num_rows($answer_select);
  if($number>0){
    echo"<script>alert('This Brand Already Exists')</script>";
  }
  else{
  $insert_query ="INSERT INTO `brands`(brand_title) VALUES ('$brand_title') ";
  $result = mysqli_query($con,$insert_query);
  if($result){
    echo"<script>alert('Brand Added Successfully')</script>";
  }
}
}
?>


<h3 class="text-center  text-info">Insert Brand</h3>
<br><br>


<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control"name ="brand_title" placeholder="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2">
  
  <input type="submit" name ="insert_brand" value="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1" class="w-100 m-1 p-1 bg-info">
</div>
</form>
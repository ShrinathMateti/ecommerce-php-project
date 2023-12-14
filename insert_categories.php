<?php
  
include('../includes/connection.php');

if(isset($_POST['insert_cat'])){
  $category_title = $_POST['cat_title'];

  $select_query ="SELECT * FROM categories WHERE category_title = '$category_title' ";
  $answer_select = mysqli_query($con,$select_query);
  $number = mysqli_num_rows($answer_select);
  if($number>0){
    echo"<script>alert('This Category Already Exists')</script>";
  }
  else{
  $insert_query ="INSERT INTO `categories`( category_title) VALUES ('$category_title') ";
  $result = mysqli_query($con,$insert_query);
  if($result){
    echo"<script>alert('Category Added Successfully')</script>";
  }
}
}
?>


<h3 class="text-center  text-info">Insert Category</h3>
<br><br>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name ="cat_title" placeholder="Insert Category" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2">
  
  <input type="submit" name ="insert_cat" value="Insert Category" aria-label="Category" aria-describedby="basic-addon1" class=" w-100 m-1 p-1 bg-info">
</div>
</form>
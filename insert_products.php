<?php
 include('../includes/connection.php');
 if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_image = $_POST['product_image'];
    $product_price = $_POST['product_price'];
    $product_date = $_POST['product_date'];
   
        

        // insert query

        $insert_products ="INSERT INTO `products`( `product_title`, `product_description`, `product_keywords`, `product_category`, `product_brands`, `product_image`, `product_price`, `product_date`) VALUES ('$product_title','$product_description','$product_keywords','$product_category','$product_brands','$product_image','$product_price','$product_date')";
        $query = mysqli_query($con,$insert_products);
        if($query){
            echo"<script>alert('Product Inserted Successfully')</script>";
        }
    }


?>
<h3 class="text-center text-info">Insert Product</h3>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-3">
        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required>
    </div>
    <div class="form-outline mb-3">
        <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required>
    </div>
    <div class="form-outline mb-3">
        <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required>
    </div>
    <div class="form-outline mb-3">
        <select name="product_category" id="" class="form-select">
            <option value="">Select A Category</option>

            <?php
            include('../includes/connection.php');
            $select_query ="SELECT * FROM categories";
            $result= mysqli_query($con,$select_query);
            while($row_data=mysqli_fetch_assoc($result)){
              $category_title = $row_data['category_title'];
              $category_id = $row_data['category_id'];

              echo"<option value='$category_id'>$category_title</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-outline mb-3">
        <select name="product_brands" id="" class="form-select">
            <option value="">Select A Brand</option>
             <?php 
             include('../includes/connection.php');
             $query = "SELECT * FROM brands";
             $ans = mysqli_query($con,$query);
             while($row_data = mysqli_fetch_assoc($ans)){
             $brand_title = $row_data['brand_title'];
             $brand_id = $row_data['brand_id'];

             echo"<option value='$brand_id'>$brand_title</option>";
            }
            ?>
            
        </select>     
     </div>
    <div class="form-outline mb-3">
        <!-- <label>Product  Image Link</label> -->
        <input type="text" name="product_image" id="product_image1" class="form-control"  placeholder="Product Image Link" autocomplete="off" required>
    </div>
  
    <div class="form-outline mb-3">
        <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required>
    </div>
    <div class="form-outline mb-3">
        <input type="date" name="product_date" id="product_date" class="form-control" autocomplete="off" required>
    </div>
    <div class="input-group w-10 mb-2">
  
  <input type="submit" name ="insert_product" value="Insert Product" aria-label="Product" aria-describedby="basic-addon1" class=" w-100 m-1 p-1 bg-info">
</div>
</form>
<style>
    label{
        margin-left: 14px;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    if (isset($_GET['edit_product'])) {
        $edit_id = $_GET['edit_product'];
        $get_info = "SELECT * FROM `products` WHERE product_id = $edit_id";
        $info_result = mysqli_query($con, $get_info);
        $row = mysqli_fetch_assoc($info_result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_category = $row['product_category'];
        $product_brands = $row['product_brands'];
        $product_image = $row['product_image'];
        $product_price = $row['product_price'];

        //Fetching product category
        $fetch_category = "SELECT * FROM `categories` WHERE category_id = $product_category ";
        $result_category = mysqli_query($con, $fetch_category);
        $row_category = mysqli_fetch_assoc($result_category);
        $category_name = $row_category['category_title'];

        //Fetching brands 
        $fetch_brand = "SELECT * FROM `brands` WHERE brand_id = $product_brands ";
        $result_brand = mysqli_query($con, $fetch_brand);
        $row_brand = mysqli_fetch_assoc($result_brand);
        $brand_name = $row_brand['brand_title'];
    }


    ?>

    <div class="container">
        <h3 class="text-center text-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit Products</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-3">
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" value="<?php echo $product_title ?>" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3">
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" value="<?php echo $product_description ?>" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3">
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" value="<?php echo $product_keywords ?>" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3">

                <input value="<?php echo $category_name ?>" class="form-control" name="product_category">


            </div>
            <div class="form-outline mb-3">

                <input value="<?php echo $brand_name ?>" class="form-control" name="product_brands">

            </div>
            <div class="form-outline mb-3">
                <!-- <label>Product  Image Link</label> -->
                <div class="d-flex">
                    <input type="text" name="product_image" id="product_image1" class="form-control" placeholder="Product Image Link" value="<?php echo $product_image ?>" autocomplete="off" required>
                    <img src="<?php echo $product_image ?>" alt="noimage" srcset="" height="70px">
                </div>
            </div>
            <div class="form-outline mb-3">
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" value="<?php echo $product_price ?>" autocomplete="off" required>
            </div>
            <div class="input-group w-10 mb-2">

                <input type="submit" name="update_product" value="Update Product" aria-label="Product" aria-describedby="basic-addon1" class=" w-100 m-1 p-1 bg-info">
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['update_product'])) {
        $product_title = $_POST['product_title'];
        $product_description = $_POST['product_description'];
        $product_keywords = $_POST['product_keywords'];
        $product_category = $_POST['product_category'];
        $product_brands = $_POST['product_brands'];
        $product_image = $_POST['product_image'];
        $product_price = $_POST['product_price'];
        // Update query
        $update_product = "UPDATE `products` SET product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',product_category='$product_category',product_brands='$product_brands',product_image='$product_image',product_price='$product_price' WHERE product_id=$edit_id";
        $up_result = mysqli_query($con, $update_product);
        if ($up_result) {
            echo "<script>alert('Product Updated Successfully')</script>";
            echo "<script>window.open('./index.php?insert_product','_self')</script>";
        }
    }

    ?>
</body>

</html>
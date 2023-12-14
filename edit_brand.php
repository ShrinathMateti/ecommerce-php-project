<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    if (isset($_GET['edit_brand'])) {
        $edit_brand = $_GET['edit_brand'];
        //query
        $get_brand = "SELECT * FROM `brands` WHERE brand_id=$edit_brand";
        $res_brand = mysqli_query($con, $get_brand);
        $row = mysqli_fetch_assoc($res_brand);
        $brand_title = $row['brand_title'];
    }

    ?>


    <h3 class="text-center text-info">Edit Brand</h3>
    <br><br>
    <form action="" method="post" class="mb-2">
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brand_title" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $brand_title ?>" required>
        </div>
        <div class="input-group w-10 mb-2">

            <input type="submit" name="update_brand" value="Update Brand" aria-label="Category" aria-describedby="basic-addon1" class=" w-100 m-1 p-1 bg-info">
        </div>
    </form>
    <?php
    if (isset($_POST['update_brand'])) {
        $btitle = $_POST['brand_title'];
        // Update Query
        $b_update = "UPDATE `brands` SET brand_title='$btitle' WHERE brand_id=$edit_brand";
        $bres = mysqli_query($con, $b_update);
        if ($bres) {
            echo "<script>alert('Brand Updated')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }
    }

    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    if (isset($_GET['edit_category'])) {
        $edit_category = $_GET['edit_category'];
        //query
        $get_cat = "SELECT * FROM `categories` WHERE category_id=$edit_category";
        $res_cat = mysqli_query($con, $get_cat);
        $row = mysqli_fetch_assoc($res_cat);
        $cat_title = $row['category_title'];
    }

    ?>


    <h3 class="text-center text-info">Edit Category</h3>
    <br><br>
    <form action="" method="post" class="mb-2">
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cat_title" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $cat_title ?>" required>
        </div>
        <div class="input-group w-10 mb-2">

            <input type="submit" name="update_cat" value="Update Category" aria-label="Category" aria-describedby="basic-addon1" class=" w-100 m-1 p-1 bg-info">
        </div>
    </form>
    <?php
    if (isset($_POST['update_cat'])) {
        $ctitle = $_POST['cat_title'];
        // Update Query
        $c_update = "UPDATE `categories` SET category_title='$ctitle' WHERE category_id=$edit_category";
        $cres = mysqli_query($con, $c_update);
        if ($cres) {
            echo "<script>alert('Category Updated')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }
    }

    ?>
</body>

</html>
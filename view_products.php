<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h3 class="text-center text-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Products</h3>
    <table class="table table-bordered mt-3 ">
        <thead class="bg-info text-dark">
            <tr>
                <th>Product Id</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php

            //Getting Products
            $get_products = "SELECT * FROM `products`";
            $result = mysqli_query($con, $get_products);
            // 

            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image = $row['product_image'];
                $product_price = $row['product_price'];
                //orders sum query
                $get_count = "SELECT * FROM `order_pending` WHERE product_id=$product_id";
                $getresult = mysqli_query($con, $get_count);
                $row_count = mysqli_num_rows($getresult);
                echo "<tr class='text-center'>
                <td>$product_id</td>
                <td>$product_title</td>
                <td><img src='$product_image' height='100px'></td>
                <td>$product_price</td>
                <td>$row_count</td>
                <td>True</td>
                <td>&nbsp;&nbsp;<a href='index.php?edit_product=$product_id' class='text-light'><i class='fa-regular fa-pen-to-square'></i></a></td>
                <td>&nbsp;&nbsp;<a href='index.php?delete_product=$product_id' class='btn btn-secondary text-light' type='button'  data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-trash-can'></i></a></td>
            </tr>";
            }
            ?>

        </tbody>
    </table>
    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Are Sure You Want Delete This?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"><a href='index.php?delete_product=<?php echo $product_id ?>' class="text-light text-decoration-none">Yes</a></button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="index.php?view_products" class="text-light text-decoration-none">No</a></button>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
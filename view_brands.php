<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h3 class="text-center text-info">&nbsp;All Brands</h3>
    <table class="table table-bordered mt-3 ">
        <thead class="bg-info text-dark text-center">
            <tr>
                <th>Sr-No</th>
                <th>Brand Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light text-center">
            <?php
            //Getting Categories
            $get_brand = "SELECT * FROM `brands`";
            $result = mysqli_query($con, $get_brand);
            // 
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$brand_title</td>
                <td>&nbsp;<a href='index.php?edit_brand=$brand_id' class='text-light'><i class='fa-regular fa-pen-to-square'></i></a></td>
                <td>&nbsp;<a href='index.php?delete_brand=$brand_id' class='btn btn-secondary text-light' type='button'  data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-regular fa-trash-can'></i></a></td>
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
                    <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id ?>' class="text-light text-decoration-none">Yes</a></button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="index.php?view_brands" class="text-light text-decoration-none">No</a></button>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
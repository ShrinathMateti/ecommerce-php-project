<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h3 class="text-center text-info">&nbsp;All Orders</h3>
    <table class="table table-bordered mt-3 ">
        <?php
        echo "<thead class='bg-info text-dark text-center'>
            <tr>
                <th>SNo</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Total Products</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='bg-secondary text-light text-center'>";


        //Getting Products
        $get_orders = "SELECT * FROM `user_orders`";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);
        if ($row_count == 0) {
            echo "<h5 class='text-danger text-center'>No Orders Has Been Done Yet</h5>";
        } else {
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                $order_id = $row['order_id'];
                $user_id = $row['user_id'];
                $due = $row['amount_due'];
                $invoice_number = $row['invoice_number'];
                $total_products = $row['total_products'];
                $order_date = $row['order_date'];
                $order_status = $row['order_status'];
                $number++;
                echo "<tr>
                <th>$number</th>
                <th>$due</th>
                <th>$invoice_number</th>
                <th>$total_products</th>
                <th>$order_date</th>
                <th>$order_status</th>
                <th>&nbsp;&nbsp;<a href='index.php?delete_order=$order_id' class=' text-light'><i class='fa-solid fa-trash'></i></a></th>
            </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</body>

</html>
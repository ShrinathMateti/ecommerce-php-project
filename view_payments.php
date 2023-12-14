<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h3 class="text-center text-info">&nbsp;All Payments</h3>
    <table class="table table-bordered mt-3 ">
        <?php
        echo "<thead class='bg-info text-dark text-center'>
            <tr>
                <th>SNo</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Order Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='bg-secondary text-light text-center'>";


        //Getting Products
        $get_payments = "SELECT * FROM `user_payments`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);
        if ($row_count == 0) {
            echo "<h5 class='text-danger text-center'>No Payments Has Been Done Yet</h5>";
        } else {
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['order_id'];
                $payment_id = $row['payment_id'];
                $invoice_number = $row['invoice_number'];
                $amount = $row['amount'];
                $mode = $row['payment_mode'];
                $order_date = $row['date'];

                $number++;
                echo "<tr>
                <th>$number</th>
                <th>$invoice_number</th>
                <th>$amount</th>
                <th>$mode</th>
                <th>$order_date</th>
                
                <th>&nbsp;<a href='index.php?delete_payment=$payment_id' class=' text-light'><i class='fa-solid fa-trash'></i></a></th>
            </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</body>

</html>
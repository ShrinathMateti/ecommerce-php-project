<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h3 class="text-center text-info">&nbsp;All Users</h3>
    <table class="table table-bordered mt-3 ">
        <?php
        echo "<thead class='bg-info text-dark text-center'>
            <tr>
                <th>SNo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Mobile No</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='bg-secondary text-light text-center'>";


        //Getting Products
        $get_users = "SELECT * FROM `user_data`";
        $result = mysqli_query($con, $get_users);
        $row_count = mysqli_num_rows($result);
        if ($row_count == 0) {
            echo "<h5 class='text-danger text-center'>No Users Registered Yet</h5>";
        } else {
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['user_id'];
                $name = $row['user_name'];
                $email = $row['email'];
                $user_address = $row['user_address'];
                $mobile_no = $row['mobile_no'];


                $number++;
                echo "<tr>
                <th>$number</th>
                <th>$name</th>
                <th>$email</th>
                <th>$user_address</th>
                <th>$mobile_no</th>
                
                <th>&nbsp;<a href='index.php?delete_user=$user_id' class=' text-light'><i class='fa-solid fa-trash'></i></a></th>
            </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</body>

</html>
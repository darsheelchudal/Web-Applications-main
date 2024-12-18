
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
    <?php
    include 'admin-header.php';
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <table class="table text-center table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Address</th>
                            <th scope="col">Pay Mode</th>

                            <th scope="col">Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT `Order_id`, `Full_name`, `Phone_No`, `Address`, `Pay_Mode` FROM `order_manager`";
                        $user_result = mysqli_query($conn, $sql);
                        while ($user_fetch = mysqli_fetch_assoc($user_result)) {
                            echo "
                        <tr>
                        <td>{$user_fetch['Order_id']}</td>
                        <td>{$user_fetch['Full_name']}</td>
                        <td>{$user_fetch['Phone_No']}</td>
                        <td>{$user_fetch['Address']}</td>
                        <td>{$user_fetch['Pay_Mode']}</td>
                        <td>
                        <table class='table text-center table-dark'>
                        <thead>
                        <tr>
                        <th scope='col'>Item Name</th>
                        <th scope='col'>Price</th>
                        <th scope='col'>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
                            $order_query = "SELECT `Order_id`, `Item_Name`, `Price`, `Quantity` FROM `users_orders` WHERE `Order_id`= {$user_fetch['Order_id']}";
                            $order_result = mysqli_query($conn, $order_query);
                            while ($order_fetch = mysqli_fetch_assoc($order_result)) {
                                echo "
                            <tr>
                            <td>{$order_fetch['Item_Name']}</td>
                            <td>{$order_fetch['Price']}</td>
                            <td>{$order_fetch['Quantity']}</td>
                            </tr>
                            ";
                            }
                            echo "
                            </tbody>
                        </table>
                        </td>
                        </tr>
                        ";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
</body>

</html>

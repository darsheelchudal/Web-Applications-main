<?php
include 'database.php';
require 'userfunction.php';
session_start(); // Start the session if not already started

if (isset($_SESSION['user'])) {
    if (isset($_POST['placeOrderBtn'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $streetno = mysqli_real_escape_string($conn, $_POST['streetno']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
        $payment_id = isset($_POST['payment_id']) ? mysqli_real_escape_string($conn, $_POST['payment_id']) : ''; // Check if payment_id is set

        if ($name == "" || $email == "" || $phone == "" || $streetno == "" || $address == "") {
            $_SESSION['message'] = "All fields are mandatory"; // Corrected spelling of "fields"
            header('Location: checkout.php'); // Removed space after checkout.php
            exit(0); // Terminate script execution after redirection
        }

        $userId = $_SESSION['auth_users']['user_id'];
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c INNER JOIN products p
        ON c.prod_id = p.id WHERE c.user_id = '$userId' ORDER BY c.id DESC "; 
        $query_run = mysqli_query($conn, $query);

        $items = [];
        while ($citem = mysqli_fetch_assoc($query_run)) {
            $items[] = $citem;
        }

        $totalPrice = 0;
        foreach ($items as $citem) {
            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
        }

        $tracking_no = "CloudMart" . rand(1111, 9999) . substr($phone, 2);
        $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, streetno, total_price, payment_mode, payment_id) 
        VALUES ('$tracking_no', '$userId', '$name', '$email', '$phone', '$address', '$streetno', '$totalPrice', '$payment_mode', '$payment_id')";
        $insert_query_run = mysqli_query($conn, $insert_query);

        if ($insert_query_run) {
            $order_id = mysqli_insert_id($conn);
            foreach ($items as $citem) {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];

                $insert_Items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) VALUES ('$order_id', '$prod_id', '$prod_qty', '$price')";
                $insert_items_query_run = mysqli_query($conn, $insert_Items_query);

                $product_query = "SELECT * FROM products WHERE id ='$prod_id' LIMIT 1 ";
                $product_query_run = mysqli_query($conn, $product_query);

                $productData = mysqli_fetch_array($product_query_run);
                $current_qty =  $productData['qty'];

                $new_qty = $current_qty - $prod_qty;

                $updateQty_query = "UPDATE products SET qty = ' $new_qty ' WHERE id= '$prod_id' ";
                $updateQty_query_run = mysqli_query($conn,$updateQty_query);
            }
            $deleteCartQuery = "DELETE FROM carts WHERE user_id = '$userId' ";
            $deleteCartQuery_run = mysqli_query($conn,  $deleteCartQuery );

            $_SESSION['message'] = "Order Placed Successfully";
            echo '<script>window.location.href="my-orders.php";</script>';
            die();
        }
    }
} else {
    echo '<script>window.location.href="cloudmart.php";</script>';
}
?>

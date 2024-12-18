<?php

session_start();
if(isset($_POST['purchase'])) {
    $full_name = $_POST['full_name'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $pay_mode = $_POST['pay_mode'];

    require_once "database.php";
    $sql1 = "INSERT INTO order_manager (full_name, phone_no, address, pay_mode) VALUES (?, ?, ?, ?)";
    $sql2 = "INSERT INTO users_orders (Order_id, Item_Name, Price, Quantity) VALUES (?, ?, ?, ?)";

    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);

    $stmt1->bind_param("ssss", $full_name, $phone_no, $address, $pay_mode);

    // Check if $_SESSION['cart'] is set and not null
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if ($stmt1->execute()) {
            $order_id = mysqli_insert_id($conn);
            $stmt2->bind_param("isii", $order_id, $item_name, $price, $quantity);

            foreach ($_SESSION['cart'] as $key => $value) {
                $item_name = $value['Item_Name'];
                $price = $value['Price'];
                $quantity = $value['Quantity'];
                $stmt2->execute();
            }
            unset($_SESSION['cart']);
            echo "
            <script>
            alert(
                'Congratulations on your purchase! 🎉 Your order is confirmed and on its way to you. Thank you for choosing CloudMart! If you have any questions or need assistance, feel free to reach out to our customer support team. Happy shopping!');
            window.location.href='cloudmart.php';
            </script>
            ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Cart is empty!";
    }

    $stmt1->close();
    $stmt2->close();
    $conn->close();
}


// session_start();
// if(isset($_POST['purchase'])) {

//     $full_name = $_POST['full_name'];
//     $phone_no = $_POST['phone_no'];
//     $address = $_POST['address'];
//     $pay_mode = $_POST['pay_mode'];

//     require_once "database.php";
//     $sql1 = "INSERT INTO order_manager (full_name, phone_no, address, pay_mode) VALUES (?, ?, ?, ?)";
//     $sql2 = "INSERT INTO users_orders (Order_id, Item_Name, Price, Quantity) VALUES (?, ?, ?, ?)";

//     $stmt1 = $conn->prepare($sql1);
//     $stmt2 = $conn->prepare($sql2);

//     $stmt1->bind_param("ssss", $full_name, $phone_no, $address, $pay_mode);
//     if ($stmt1->execute())
//     {
//         $order_id = time();
//         $stmt2->bind_param("isii", $order_id, $item_name, $price, $quantity);

//         foreach ($_SESSION['cart'] as $key => $value) {
//             $item_name = $value['Item_Name'];
//             $price = $value['Price'];
//             $quantity = $value['Quantity'];
//             $stmt2->execute();
//         }
//         unset($_SESSION['cart']);
//         echo "Purchase made successfully!";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
//     $stmt1->close();
//     $stmt2->close();
//     $conn->close();
// }

?>

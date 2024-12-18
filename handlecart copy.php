<?php
include 'database.php';
session_start();

if (isset($_SESSION['user'])) {
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
            case "add":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];
                $user_id = $_SESSION['auth_users']['user_id'];
                // Check if product already exists in cart
                $check_cart_query = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id'";
                $check_cart_result = mysqli_query($conn, $check_cart_query);

                if (mysqli_num_rows($check_cart_result) > 0) {
                    echo "existing";
                } else {
                    // Insert product into cart
                    $insert_query = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES ('$user_id', '$prod_id', '$prod_qty')";
                    $insert_cart_run = mysqli_query($conn, $insert_query);

                    if ($insert_cart_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                }
                break;

                case "update":
                    $prod_id = $_POST['prod_id'];
                    $prod_qty = $_POST['prod_qty'];
                    $user_id = $_SESSION['auth_users']['user_id'];
                
                    // Check if product already exists in cart
                    $check_cart_query = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id'";
                    $check_cart_result = mysqli_query($conn, $check_cart_query);
                
                    if (mysqli_num_rows($check_cart_result) > 0) {
                        $update_query = "UPDATE carts SET prod_qty='$prod_qty' WHERE prod_id='$prod_id' AND user_id='$user_id'";
                        $update_query_run = mysqli_query($conn, $update_query);
                        if ($update_query_run) {
                            echo 200;
                        } else {
                            echo 500;
                        }
                    } else {
                        echo 'Something Went Wrong';
                    }
                    break;

                case "delete":
                    $cart_id = $_POST['cart_id']; 
                        $user_id = $_SESSION['auth_users']['user_id'];

                        $check_cart_query = "SELECT * FROM carts WHERE id='$cart_id' AND user_id='$user_id'"; // Changed from prod_id to id
                        $check_cart_result = mysqli_query($conn, $check_cart_query);
                    
                        if (mysqli_num_rows($check_cart_result) > 0) {
                            $delete_query = "DELETE FROM carts WHERE id='$cart_id' ";
                            $delete_query_run = mysqli_query($conn, $delete_query);
                            if ($delete_query_run) {
                                echo 200;
                            } else {
                                echo "Something Went Wrong";
                            }
                        } else {
                            echo 'Something Went Wrong';
                        }
                        break;

            default:
                echo 500;
                break;
        }
    }
} else {
    echo 401;
}
?>

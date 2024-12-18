<?php
include 'database.php';

function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    return mysqli_query($conn, $query);
}

// Function to retrieve products for a specific admin
function getAllProductsForAdmin($adminId)
{
    global $conn; // Assuming $conn is your database connection

    // Escape admin ID to prevent SQL injection
    $adminId = mysqli_real_escape_string($conn, $adminId);

    // Query to select products for the specified admin ID
    $query = "SELECT * FROM products WHERE Admin_ID = $adminId";

    // Perform query
    $result = mysqli_query($conn, $query);

    // Check if query executed successfully
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    return $result;
}

function getByID($table, $id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM $table WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    return $query->get_result();
}

// Check if the redirect function does not exist before declaring it
if (!function_exists('redirect')) {
    function redirect($url, $message)
    {
        session_start(); // Ensure session is started before setting session variables
        $_SESSION['message'] = $message;
        header('Location: ' . $url);
        exit();
    }
}

function checkTrackingNoValid($trackingNo)
{
    global $conn;
    $query = "SELECT * FROM orders WHERE  tracking_no = '$trackingNo' ";
    return mysqli_query($conn, $query);
}

function getOrderHistory()
{
    global $conn;
    $query = "SELECT * FROM orders  WHERE status != '0' ";
    return mysqli_query($conn, $query);
}

function getOrderHistoryForAdmin($adminId)
{
    global $conn;

    // Escape admin ID to prevent SQL injection
    $adminId = mysqli_real_escape_string($conn, $adminId);

    // Query to select orders for the specified admin ID with status not equal to '0'
    $query = "SELECT order_items.qty, products.name, orders.*
            FROM order_items
            INNER JOIN products ON order_items.prod_id = products.id
            INNER JOIN orders ON order_items.order_id = orders.id
            WHERE products.Admin_ID = '$adminId' AND orders.status != '0'
            ORDER BY orders.id DESC";

    // Perform query
    $result = mysqli_query($conn, $query);

    // Check if query executed successfully
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    return $result;
}


function getAllOrders()
{
    global $conn;
    $query = "SELECT * FROM orders  WHERE status = '0' ";
    return mysqli_query($conn, $query);
}

function getAllOrdersForAdmin($adminId)
{
    global $conn; // Assuming $conn is your database connection

    // Escape admin ID to prevent SQL injection
    $adminId = mysqli_real_escape_string($conn, $adminId);

    // Query to select products for the specified admin ID
    $query = "SELECT order_items.qty, products.name, orders.*
            FROM order_items
            INNER JOIN products ON order_items.prod_id = products.id
            INNER JOIN orders ON order_items.order_id = orders.id
            WHERE products.Admin_ID = '$adminId' AND orders.status = '0'
            ORDER BY orders.id DESC";
    // Perform query
    $result = mysqli_query($conn, $query);

    // Check if query executed successfully
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    return $result;
}

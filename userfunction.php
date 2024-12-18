<?php
include 'database.php';

if (!function_exists('getAllActive')) {
    function getAllActive($table)
    {
    global $conn;
    $query = "SELECT * FROM $table WHERE status = '0'";
    return mysqli_query($conn, $query);
}
}

function redirect($url, $message) {
    session_start();
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}


function getIDActive($table, $id) {
    global $conn;
    $query = $conn->prepare("SELECT * FROM $table WHERE id = ? AND status = '0'");
    $query->bind_param("i", $id);
    $query->execute();
    return $query->get_result();
}

function getSlugActive($table, $slug) {
    global $conn;
    $query = $conn->prepare("SELECT * FROM $table WHERE slug = ? AND status = '0' LIMIT 1");
    $query->bind_param("s", $slug);
    $query->execute();
    return $query->get_result();
}

// function getCartItems(){
//     global $conn;
//     if(isset($_SESSION['auth_users']) && isset($_SESSION['auth_users']['user_id'])) {
//     $user_id = $_SESSION['auth_users']['user_id'];
//     $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c INNER JOIN products p
//     ON c.prod_id = p.id WHERE c.user_id = '$user_id' ORDER BY c.id DESC ";
//     $query_run = mysqli_query($conn, $query);
//     return $query_run;
//     }
// }
function getCartItems(){
    global $conn;
    if(isset($_SESSION['auth_users']) && isset($_SESSION['auth_users']['user_id'])) {
        $user_id = $_SESSION['auth_users']['user_id'];
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c INNER JOIN products p
        ON c.prod_id = p.id WHERE c.user_id = '$user_id' ORDER BY c.id DESC ";
        $query_run = mysqli_query($conn, $query);
        
        if (!$query_run) {
            // Error occurred, handle it here
            echo "Error: " . mysqli_error($conn);
            return false;
        } elseif (mysqli_num_rows($query_run) > 0) {
            // If there are rows returned
            return $query_run;
        } else {
            // If no rows returned
            return false;
        }
    } else {
        // Handle the case when auth_users or user_id is not set in session
        return false;
    }
}


function getOrders(){
    global $conn;
    if(isset($_SESSION['auth_users']) && isset($_SESSION['auth_users']['user_id'])) {
    $userId = $_SESSION['auth_users']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id = '$userId' ORDER BY id DESC";
    return $query_run = mysqli_query($conn,$query);
    }
}


function getProdByCategory($category_id) {
    global $conn;
    $query = $conn->prepare("SELECT * FROM products WHERE category_id = ? AND status = '0'");
    $query->bind_param("i", $category_id);
    $query->execute();
    return $query->get_result();
}

function checkTrackingNoValid($trackingNo){
    global $conn;
    if(isset($_SESSION['auth_users']) && isset($_SESSION['auth_users']['user_id'])) {
        $userId = $_SESSION['auth_users']['user_id'];
        $query = "SELECT * FROM orders WHERE  tracking_no = '$trackingNo' AND user_id= '$userId'  ";
        return mysqli_query($conn,$query);
    }
}

function getAllTrending() {
    global $conn;
    $query = "SELECT * FROM products WHERE trending = '1'";
    return mysqli_query($conn, $query);
}
?>

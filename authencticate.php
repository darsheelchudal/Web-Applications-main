<?php

// Check if user is authenticated
if (!isset($_SESSION['user'])) {
    echo "<script>confirm('Please login to continue. You are being redirected.');</script>";
    echo '<script>window.location.href = "login.php";</script>';
    exit; // Stop further execution of the script
}

?>


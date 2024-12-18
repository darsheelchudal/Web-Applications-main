<?php


// Check if there is a message in the session
if (isset($_SESSION['message'])) { 
    // Output JavaScript code to display the message using Alertify
    echo "<script>";
    echo "alertify.set('notifier', 'position', 'top-right');";
    echo "alertify.success('" . $_SESSION['message'] . "');";
    echo "</script>";
    
    // Unset the message from the session to prevent it from being displayed again
    unset($_SESSION['message']);
}
?>

<!-- Include Alertify JS and CSS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<!-- Include Alertify CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />

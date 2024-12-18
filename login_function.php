<!-- php login code -->
<?php
include 'database.php';
include 'alertify.php';

if (isset($_POST["login"])) {
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["full_name"] = $fullName;
            $_SESSION["user"] = "yes";

        $userid = $user['id'];

            $_SESSION['auth_users'] =[
                'user_id' => $userid
            ];


            echo "<script> window.location.href = 'cloudmart.php';</script>";
            die();
        }
    }else {

        echo "<script> alertify.error('Email or Password does not match');</script>";
            // echo "<div class='alert alert-danger'>Email or Password does not match</div>";
            // echo "<div class='alert alert-danger'>Email does not match</div>";
}
}
?>
<!-- php login code -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <link href="Admin login style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c8371491b6.js" crossorigin="anonymous"></script>
    <style>
        footer {
            bottom: 0 !important;
            margin-bottom: 0px !important;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #EBEDF2;
        }

        div.container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: white;
            padding: 30px;
            box-shadow: 0 50px 50px -50px darkslategray;
        }

        div.container div.myform {
            width: 270px;
            margin-right: 30px;
        }

        div.container div.myform h2 {
            color: #43766C !important;
            margin-bottom: 20px;
        }

        div.container div.myform input {
            border: none;
            outline: none;
            border-radius: 0;
            width: 100%;
            border-bottom: 2px solid #F85606;
            margin-bottom: 25px;
            padding: 7px 0;
            text-decoration: #43766C !important;
            font-size: 14px;
        }

        div.container div.myform button {
            color: white;
            background: #F85606;
            border: none;
            outline: none;
            border-radius: 6px;
            font-size: 14px;
            padding: 5px 12px;
            font-weight: 500;
        }

        div.container div.myform button:hover {
            background-color: #43766C;
        }

        div.container div.image img {
            width: 300px;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 15px;
            color: #43766C !important;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            left: 92%;
            right: 10px;
            transform: translateY(-125%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="myform">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <h2>ADMIN PANEL</h2>
                <input type="text" placeholder="Admin Name" name="AdminName">
                <div class="password-container">
                    <input type="password" placeholder="Password" name="AdminPass" class="colored-input" id="passwordInput">
                    <i class="toggle-password fa-solid fa-eye" id="togglePassword"></i>
                </div>
                <button type="submit" name="Login">LOGIN</button>
                <button style="margin-left: 5px;"><a href="cloudmart.php" style="text-decoration:none; font-size: 15px; color:#EBEDF2">Go Back</a></button>
            </form>
        </div>
        <div class="images">
            <img src="image/bg-login.jpg" width="300px">
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById("passwordInput");
        const togglePasswordButton = document.getElementById("togglePassword");

        togglePasswordButton.addEventListener("click", function() {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            this.classList.toggle("fa-eye-slash");
        });
    </script>

    <?php
    require_once("database.php");

    function input_filter($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['Login'])) {
        // Filter and assign input values
        $AdminName = input_filter($_POST['AdminName']);
        $AdminPass = input_filter($_POST['AdminPass']);

        // Escape special characters in input
        $AdminName = mysqli_real_escape_string($conn, $AdminName);
        $AdminPass = mysqli_real_escape_string($conn, $AdminPass);

        // Query template
        $query = "SELECT id, Admin_Name, Admin_Password, role FROM admin_login WHERE Admin_Name=? AND Admin_Password=?";
        // Prepared statement
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "ss", $AdminName, $AdminPass);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $AdminName, $AdminPass, $role);
                mysqli_stmt_fetch($stmt);

                session_start();
                $_SESSION['AdminLoginId'] = $AdminName;
                $_SESSION['AdminId'] = $id;
                $_SESSION['role'] = $role;

                if ($role == '1') {
                    header("Location: index.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                echo "<script>alert('Invalid Admin Name or Password');</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('SQL cannot be prepared.');</script>";
        }
    }
    ?>
</body>

</html>

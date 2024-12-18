<?php
include 'database.php';
if (isset($_SESSION["user"])) {
    echo "<script> window.location.href = 'cloudmart.php';</script>";
    // header("Location: cloudmart.php");
    exit();
}
?>


<html>

<head>
    <title>Register Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/c8371491b6.js" crossorigin="anonymous"></script> -->
    <!-- toggle password visibility -->
    <style>
        .reg .container {
            max-width: 600px !important;
            margin: 0 auto;
            padding-top: 50px !important;
        }

        .reg h3 {
            font-family: sans-sarif !important;
        }

        .reg .container .row {
            min-height: 100vh !important;
            align-items: center;
            margin-bottom: 40px;
        }

        .reg form i {
            margin-left: -30px !important;
            margin-top: -30px !important;
            cursor: pointer;
            text-align: center;
        }

        #togglePassword {
            margin-top: 7px !important;
        }

        #togglePassword1 {
            margin-top: 7px !important;
        }

        #togglePassword2 {
            margin-top: 7px !important;
        }

        input[type="password"] {
            width: 440px !important;
            height: 48px !important;

            .text-center i:hover {
                background: orange !important;
                border-radius: 15px !important;
            }

            .error {
                color: red !important;
            }
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <!-- Registration php -->
    <?php
    if (isset($_POST["submit"])) {
        $fullName = $_POST["fullname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
            array_push($errors, "All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
        }
        if (strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 charactes long");
        }
        if ($password !== $passwordRepeat) {
            array_push($errors, "Password does not match");
        }
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            array_push($errors, "Email already exists!");
        }
        if (count($errors) > 0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {

            $sql = "INSERT INTO users (full_name, email, phone, password) VALUES ( ?, ?, ? ,?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "ssss", $fullName, $email, $phone, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                session_start();
                
            // Registration successful
            $_SESSION["user"] = "yes";
            $userid = mysqli_insert_id($conn);
            $_SESSION['auth_users'] = ['user_id' => $userid];


                echo "<script> window.location.href = 'cloudmart.php';</script>";
                // header("Location: cloudmart.php");
                die();
            } else {
                die("Something went wrong");
            }
        }
    }
    ?>

    <!-- Registration php -->


    <!-- sign-up -->
    <div class="reg">
        <div class="container">


            <div class="row">
                <!-- <div class="col-md-6 mb-5"> -->

                <!-- Registration-->
                <div class="card shadow p-5 animated zoomIn slow">
                    <h3 class="text-center font-weight-bold text-uppercase mb-3">SIGN UP</h3>
                    <form action="registration.php" method="post">
                        <div id="myForm">
                            <div class="form-group">
                                <label>Enter Username*</label>
                                <input type="text" class="form-control" id="username" name="fullname" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Enter Email*</label>
                                <input type="email" class="form-control" id="email" placeholder="abc123@gmail.com" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="phone number">Enter Phone No*</label>
                                <input type="tel" name="phone" class="form-control" id="phone" pattern="[0-9]{10}" autocomplete="off" maxlength="10" class="" value="" placeholder="Enter your phone number (10 digits)" required>
                                <span class="error" id="phoneError"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Password*</label>
                                <div class="flex d-flex">
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password*</label>
                                <div class="flex d-flex">
                                    <input type="password" name="repeat_password" class="form-control" id="password1" required>
                                    <i class="bi bi-eye-slash" id="togglePassword1"></i>
                                </div>
                            </div>
                            <!-- <button type="submit" value="Register" class="btn btn-outline-dark btn-block rounded-pill"  name="submit">Register</button> -->
                            <input type="submit" class="btn btn-outline-dark btn-block rounded-pill" value="Register" name="submit">
                            <h6 class="mt-3">Already Registered! <a href="login.php" style="text-decoration: none;"> Login Here</a></h6>
                        </div>
                    </form>

                </div>
            </div>
            <!-- sign-up -->

            <!-- </div> -->
        </div>
    </div>


    <?php include 'footer.php'; ?>

    <script>
        // Function to validate the phone number input
        function validatePhoneNumber() {
            var phoneNumber = document.getElementById("phone").value;
            var phonePattern = /^\d{10}$/;
            var phoneError = document.getElementById("phoneError");

            if (!phonePattern.test(phoneNumber)) {
                phoneError.textContent = "Please enter a valid 10-digit phone number.";
                return false;
            } else {
                phoneError.textContent = ""; // Clear error message if validation passes
                return true;
            }
        }

        // Event listener for form submission
        document.getElementById("myForm").addEventListener("submit", function(event) {
            if (!validatePhoneNumber()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    </script>

    <!-- toggle-password-script -->


    <script>
        // toogle-password
        const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            this.classList.toggle('bi-eye');
        });
        // toogle-password
    </script>


    <script>
        // toogle-password1
        const togglePassword1 = document
            .querySelector('#togglePassword1');
        const password1 = document.querySelector('#password1');
        togglePassword1.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password1
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password1.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            this.classList.toggle('bi-eye');
        });
        // toogle-password1
    </script>



    <!-- toggle-password-script -->

</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->

</html>
<?php

if (isset($_SESSION["user"])) {
    echo "<script> window.location.href = 'cloudmart.php';</script>";
    // header("Location: cloudmart.php");
}
?>



<html>

<head>

    <title>Login/Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/c8371491b6.js" crossorigin="anonymous"></script> -->
    <!-- toggle password visibility -->
    <style>
        .log .container {
            max-width: 600px !important;
            margin: 0 auto;
            padding-top: 50px !important;
        }

        .log h3 {
            font-family: sans-sarif !important;
        }

        .log .container .row {
            min-height: 100vh !important;
            align-items: center;
            margin-bottom: 40px;
        }

        .log form i {
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

        .log input[type="password"] {
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

        .text-center i:hover {
            background-color: orange;
            border-radius: 20px;
        }

        .log .container .row {
            margin-top: -40px !important;
            margin-bottom: -5px !important;
        }
    </style>
</head>

<body>


    <?php include 'navbar.php'; ?>




    <!-- <div class="col-md-6 mb-5"> -->

    <!-- Login-->

    <?php


    include 'login_function.php';
    ?>
    <div class="log">
        <div class="container">
            <div class="row">
                <div class="card shadow animated zoomIn slow p-5">
                    <h3 class="text-center font-weight-bold text-uppercase mb-3">Login</h3>



                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label>Enter Username*</label>
                            <input type="text" class="form-control" name="fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Enter Email*</label>
                            <input type="email" class="form-control" id="email" placeholder="abc123@gmail.com" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Enter Password*</label>
                            <div class="flex d-flex">
                                <input type="password" name="password" class="form-control" id="password2">
                                <i class="bi bi-eye-slash" id="togglePassword2"></i>
                            </div>
                        </div>
                        <!-- <button type="submit" value="Login" name="login" class="btn btn-outline-dark btn-block rounded-pill">Login</button> -->
                        <input type="submit" value="Login" name="login" class="btn btn-outline-dark btn-block rounded-pill">
                    </form>
                    <h6 class="mt-3">Don't have an account? <a href="registration.php" style="text-decoration: none;"> Create Account Here</a></h6>
                    <p class="text-center mt-3"> or Login with
                    <p>
                    <div class="text-center">
                        <i class="fab fa-facebook mx-2 fa-2x"></i>
                        <i class="fab fa-twitter  mx-2 fa-2x"></i>
                        <i class="fab fa-instagram  mx-2 fa-2x"></i>
                        <i class="fab fa-google  mx-2 fa-2x"></i>
                    </div>
                </div>
            </div>
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
        // toogle-password2
        const togglePassword2 = document
            .querySelector('#togglePassword2');
        const password2 = document.querySelector('#password2');
        togglePassword2.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password2
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password2.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            this.classList.toggle('bi-eye');
        });
        // toogle-password2
    </script>
    <!-- toggle-password-script -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>
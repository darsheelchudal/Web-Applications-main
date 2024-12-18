<?php
session_start();
?>

<html>

<head>
    <title>Navbar</title>

    <link rel="stylesheet" href="navbar1.css">
    <script src="https://kit.fontawesome.com/c8371491b6.js" crossorigin="anonymous"></script>
    <!-- drop-down-menu -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- alertify js -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />

    <!-- alertify js -->


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        /* Custom CSS for the dropdown */
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown button[type="button"] {
            background: none;
            border: 0px solid gray;
            color: black !important;
            font-weight: 500;
            font-size: smaller;
        }

        .dropdown button[type="button"]:hover {
            background: #43766C;
        }

        .dropdown-item {
            padding-top: 0px ! important;
            padding-bottom: 0px ! important;
        }

        li a:hover {
            background: #43766C !important;
        }

        .row .nav-item a:hover {
            color: #43766C;
            background: none !important;
        }

        .nav-item a {
            color: grey;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 500;
        }

        a {
            text-decoration: none !important;
        }
    </style>
    <style>
        .logout-dropdown .dropdown-menu {
            margin-top: 28px !important;
            border-radius: 10px !important;
            padding: 5px !important;
            border: 1px solid #43766C;
        }
        

    </style>



    <!-- drop-down-menu -->

</head>

<body>

    <nav>
        <div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar sticky-top" style="background-color: #43766C;">

                <div class="container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="header-link d-flex mb-1 mt-1">
                                <a href="Admin Login.php" id="#">Become a Seller</a>
                                <a href="#" id="#">Help and Support</a>
                            </div>
                            <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                                <div class="logo-design">
                                    <img src="../CloudMart/logoo.png" alt="">
                                    <div class="brand-name">
                                        <h5 class="brand-cloud">Cloud</h5>
                                        <h5 class="brand-mart">mart</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 my-auto">
                                <form role="search">
                                    <div class="input-group">
                                        <input type="search" placeholder="Search your favourite product" class="form-control" id="find" onkeyup="search()">
                                        <button class="btn bg-white" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-5 my-auto">
                                <ul class="nav justify-content-end">
                                    <li class="nav-item">
                                    <?php
                                        $count = 0;
                                        if (isset($_SESSION['cart'])) {
                                            $count = count($_SESSION['cart']);
                                        }
                                        ?>
                                        <a class="nav-link" href="cart.php">
                                            <i class="fa fa-shopping-cart"></i> Cart 
                                            <!-- (<?php echo $count; ?>) -->
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="categories.php">
                                            <i class="fa fa-heart"></i> Collections
                                        </a>
                                    </li>
                                    <?php
                                    if (!isset($_SESSION['user'])) {
                                        echo "
                                                <li class='nav-item'>
                                                <a href='login.php' class='nav-link'>
                                                <i class='fa fa-user' style='color: white;'></i>
                                                Login
                                                </a>
                                                </li>
                                                ";
                                    } else {
                                        echo "
                                    <div class='logout-dropdown'>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' aria-expanded='false'>
                                        <i class='fa fa-user'></i> 
                                        Order Now!!
                                        </a>

                                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                            <li><a class='dropdown-item' href='logout.php'>Log Out</a></li>
                                            <li><a class='dropdown-item' href='my-orders.php'>My Order</a></li>
                                        </ul>
                                    </li>
                                </div>
                                ";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <div class="container-fluid">
                            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                                <div class="logo-design">
                                    <img src="/RESOURCES/CloudMart/image/logoo.png" alt="">
                                    <div class="brand-name">
                                        <h5 class="brand-cloud">Cloud</h5>
                                        <h5 class="brand-mart">mart</h5>
                                    </div>
                                </div>
                            </a>
                            <button class="navbar-toggler mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="cloudmart.php">Home</a>
                                    </li>
                                  
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">New Arrivals</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Featured Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Electronics</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Fashions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Accessories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Appliances</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
    </nav>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</html>

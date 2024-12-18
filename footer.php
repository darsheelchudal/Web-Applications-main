<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CloudMart</title>
    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2-beta1/dist/css/bootstrap.min.css" rel="stylesheet">  -->
    <link rel="stylesheet" href="footer.css">

    <script src="https://kit.fontawesome.com/c8371491b6.js" crossorigin="anonymous"></script>

    <!-- footer -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- footer -->
    
</head>

<body>

    <footer>
        <div class="bg-body-tertiary">
            <footer class="py-5">
                <div class="container  sticky-down">
                    <div class="row">
                        <div class="col-6 col-md-2 mb-3">
                            <h5>CloudMart</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0" style="color:#43766C;">About Us</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0" style="color: #43766C;" Terms & Condition</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 " style="color: #43766C;">Privacy Policy</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 " style="color:#43766C;">My Account</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-md-2 mb-3">
                            <h5>ADDRESS</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0" style="color: #43766C;"><i class="fa-solid fa-location-crosshairs"></i> Ratnachowk 07 Pokhara</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0" style="color: #43766C;">Features</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0" style="color: #43766C;">Pricing</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0" style="color: #43766C;">About</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-md-2 mb-3">
                            <h5>CUSTOMER SERVICE</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0" style="color: #43766C;">Direct Chat </a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0" style="color: #43766C;">Contact Us</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0" style="color: #43766C;"></a></li>
                            </ul>
                        </div>

                        <div class="col-md-5 offset-md-1 mb-3">
                            <form>
                                <h5>CloudMart: Your Virtual Shop</h5>
                                <p>Monthly digest of what's new and exciting from us.</p>
                                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                    <label for="newsletter1" class="visually-hidden">Email address</label>
                                    <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                    <button class="btn btn-primary" type="button">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <span class="powered_by d-flex">
                        <span class="credit">Powered By</span>
                        <a href="#" class="name d-flex" style="text-decoration: none; color:#43766C; font-weight: 700; background: none; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">CloudMart</a>
                    </span>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-dark" href="#"><i class="fa-brands fa-facebook" id="facebook-icon"></i></a></li>
                        <li class="ms-3"><a class="link-dark" href="#"><i class="fa-brands fa-instagram" id="facebook-icon"></i></a></li>
                        <li class="ms-3"><a class="link-dark" href="#"><i class="fa-brands fa-twitter" id="facebook-icon"></i></a></li>
                    </ul>
                </div>
            </footer>
        </div>
        </div>
    </footer>

    <!-- alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script>
        <?php
        if (isset($_SESSION['message'])) { ?>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('<?= $_SESSION['message']; ?>');
        <?php
            unset($_SESSION['message']);
        }
        ?>
    </script>

    <!-- alertify -->

</body>

</html>
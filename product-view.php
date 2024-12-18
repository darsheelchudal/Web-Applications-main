<?php

include 'database.php';
include 'userfunction.php';


?>
<!DOCTYPE html>
<html>

<head>
    <style>
        a {
            text-decoration: none !important;
        }

        s {
            text-decoration: line-through;
            color: red;
            /* Change the color to red */
            /* font-size: 14px; */
            /* Change the font size */
        }
    </style>

    <!-- alertify js -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />
    <!-- alertify js -->

</head>

<body>

    <?php


    include 'navbar.php';

    if (isset($_GET['product'])) {
        $product_slug = $_GET['product'];
        $product_data = getSlugActive("products", $product_slug);
        $product = mysqli_fetch_array($product_data);

        if ($product) {
    ?>
            <div class="py-3 bg-primary">
                <div class="container">
                    <h6 class="text-white">
                        <a href="cloudmart.php" class="text-white">Home</a> /
                        <a href="categories.php" class="text-white">Collections</a> /
                        <?= htmlspecialchars($product['name']); ?>
                    </h6>
                </div>
            </div>

            <div class="bg-light py-4">
                <div class="container product_data mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="shadow">
                                <img src="../uploads/<?= htmlspecialchars($product['image']); ?>" alt="Product Image" class="w-100">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="fw-bold"><?= htmlspecialchars($product['name']); ?>
                                <span class="float-end text-danger">
                                    <?php if ($product['trending']) {
                                        echo "Trending";
                                    } ?>
                                </span>
                            </h4>
                            <hr>
                            <p><?= htmlspecialchars($product['small_description']); ?></p>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Rs <span class="text-success fw-bold"><?= $product['selling_price']; ?></span></h5>
                                </div>
                                <div class="col-md-6">
                                    <h5>Original Price: <s>Rs <span class="text-dange fw-bold"><?= $product['original_price']; ?></span></s></h5>


                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="input-group mb-3" style="width:130px">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>"> <i class="fa fa-shopping-cart me-2"></i>Add to cart</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger px-4"> <i class="fa fa-heart me-2"></i>Add to Wishlist</button>
                                </div>
                            </div>
                            <hr>
                            <h6>Description:</h6>
                            <p><?= htmlspecialchars($product['description']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        } else {
            echo "<div class='container'><p>Product not found.</p></div>";
        }
    } else {
        echo "<div class='container'><p>No product specified.</p></div>";
    }

    include 'footer.php';
    ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script for Cart -->
    <script>
        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var qty = $(this).closest('.product_data').find('.input-qty').val();
                var value = parseInt(qty, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $(this).closest('.product_data').find('.input-qty').val(value);
                }
            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var qty = $(this).closest('.product_data').find('.input-qty').val();
                var value = parseInt(qty, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $(this).closest('.product_data').find('.input-qty').val(value);
                }
            });

            $('.addToCartBtn').click(function(e) {
                e.preventDefault();
                var qty = $(this).closest('.product_data').find('.input-qty').val();
                var prod_id = $(this).val();

                $.ajax({
                    method: "POST",
                    url: "handlecart.php",
                    data: {
                        "prod_id": prod_id,
                        "prod_qty": qty,
                        "scope": "add"
                    },
                    success: function(response) {
                        if (response == "existing") {
                            alertify.error('Product already in Cart');
                        } else if (response == 201) {
                            alertify.success("Product Added to Cart");
                        } else if (response == 401) {
                            alertify.error('Login To Continue');
                        } else if (response == 500) {
                            alertify.error('Something Went Wrong');
                        }
                    }
                });
            });
        });
    </script>
    <!-- Script for Cart -->


</body>

</html>
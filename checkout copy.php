<?php
include 'navbar.php';
include 'database.php';
include 'userfunction.php';
include 'authencticate.php';

// Retrieve cart items
$items = getCartItems();
?>
<style>
    #payment-button {
        background-color: #5d2e8e;
        /* Change the color to your desired color */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin: 10px;
        /* Adjust margin as needed */
        /* Add any other styles you want here */
    }
</style>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="cloudmart.php" class="text-white">Home</a> /
            <a href="checkout.php" class="text-white">checkout</a> /
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="placeorder.php" method="post">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter your full name" class="form-control" required>
                                    <small class="text-danger name"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-mail</label>
                                    <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" required>
                                    <small class="text-danger email"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="Enter your phone number" class="form-control" required>
                                    <small class="text-danger phone"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Street No</label>
                                    <input type="number" name="streetno" id="streetno" placeholder="Enter your street number" max=30 class="form-control" required>
                                    <small class="text-danger streetno"></small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" id="address" required class="form-control" rows="5"></textarea>
                                    <small class="text-danger address"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                            <?php

                            $totalPrice = 0;
                            // foreach ($items as $citem) {
                            if ($items && mysqli_num_rows($items) > 0) {
                                while ($citem = mysqli_fetch_assoc($items)) {
                            ?>
                                    <div class="mb-1 border">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $citem['image']; ?>" alt="Image" width="90px">
                                            </div>
                                            <div class="col-md-5">
                                                <h6><?= $citem['name']; ?></h6>
                                            </div>
                                            <div class="col-md-3">
                                                <h6><?= $citem['selling_price']; ?></h6>
                                            </div>
                                            <div class="col-md-1">
                                                <h5>
                                                    <?= $citem['prod_qty']; ?>
                                                </h5>
                                            </div>
                                            <div class="col-md-1">
                                                <h6><?= $citem['Admin_ID']; ?></h6>
                                                <input type="hidden" class="admin-id" value="<?= $citem['Admin_ID']; ?>">
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                }
                            } else {
                                echo "<div class='alert alert-warning'>Your cart is empty.</div>";
                            }
                            ?>
                            <hr>
                            <h5>Total Price: <Price:span class="float-end fw-bold">Rs <?= $totalPrice ?></Price:span>
                            </h5>
                            <div class="COD">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button class="btn btn-success w-100" name="placeOrderBtn" type="submit">Confirm and place order | COD</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php include 'product-view-function.php'; ?>
<?php include 'footer.php'; ?>
<?php
include 'navbar.php';
include 'database.php';
include 'userfunction.php';
include 'authencticate.php';

// Retrieve cart items
$items = getCartItems();
?>

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
                                    <input type="text" name="name" placeholder="Enter your full name" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-mail</label>
                                    <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" placeholder="Enter your phone number" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Street No</label>
                                    <input type="number" name="streetno" placeholder="Enter your street number" max=30 class="form-control" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" required class="form-control" rows="5"></textarea>
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
                                            <h5><?= $citem['name']; ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['selling_price']; ?></h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5><?= $citem['prod_qty']; ?></h5>
                                        </div>

                                    </div>
                                </div>
                            <?php
                                $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                            }
                        }else{
                            echo "<div class='alert alert-warning'>Your cart is empty.</div>";
                        }
                            ?>
                            <hr>
                            <h5>Total Price: <Price:span class="float-end fw-bold">Rs <?= $totalPrice ?></Price:span>
                            </h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button class="btn btn-primary w-100" name="placeOrderBtn" type="submit">Confirm and place order | COD</button>
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
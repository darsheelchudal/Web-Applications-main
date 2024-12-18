<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>

<nav>
    <?php
    include 'navbar.php';
    ?>
    </nav>
    <div class="cart-container" style="margin-bottom: 500px; margin-top: 60px;">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>MY CART</h1>
            </div>
            <div class="col-lg-9">
                <div class="container">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Serial No.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $sr = $key + 1;
                                    echo "
                            <tr>
                            <td>$sr</td>
                            <td>$value[Item_Name]</td>
                            <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                            <div id='select'>
                                    <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='9' maxlength='1'>
                                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                    <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var quantityInput = document.querySelector('.iquantity');
                                        quantityInput.addEventListener('input', function() {
                                            if (this.value.length > 1) {
                                                this.value = this.value.slice(0, 1);
                                            }
                                        });
                                    });
                                    </script>
                            </div>
                            </form>
                            </td>
                            <td class='itotal'></td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                            <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                            <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                            </form>
                            </td>
                            </tr>
                            ";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="container">
                    <div class="border bg-light rounded p-4">
                        <h4>Grand Total: Rs. </h4>
                        <h5 class="text-right" style="margin-left: 170px; margin-top:-32.8px" id="gtotal">Rs<?php echo $total ?></h5>

                        <br>
                        <?php
                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        ?>
                            <form action="purchase.php" method="POST">
                                <div class="mb-3">
                                    <label>Full Name:</label>
                                    <input type="text" name="full_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Phone Number:</label>
                                    <input type="text" name="phone_no" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Address:</label>
                                    <input type="text" name='address' class="form-control" required>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cash On Delivery
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pay_mode" value="OP" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Online Payment
                                    </label>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        function subTotal() {
            gt = 0;
            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerHTML = gt;
        }
        subTotal();
    </script>
</body>

</html>
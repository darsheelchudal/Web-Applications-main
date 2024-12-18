<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.increment-btn', function(e) {
            e.preventDefault();
            var qty = $(this).closest('.product_data').find('.input-qty').val();
            var value = parseInt(qty, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $(this).closest('.product_data').find('.input-qty').val(value);
            }
        });

        $(document).on('click', '.decrement-btn', function(e) {
            e.preventDefault();
            var qty = $(this).closest('.product_data').find('.input-qty').val();
            var value = parseInt(qty, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest('.product_data').find('.input-qty').val(value);
            }
        });

        $(document).on('click', '.addToCartBtn', function(e) {
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


        $(document).on('click', '.updateQty', function() {
            var $productData = $(this).closest('.product_data');
            var qty = $productData.find('.input-qty').val();
            var prod_id = $productData.find('.prodId').val();

            $.ajax({
                method: "POST",
                url: "handlecart.php",
                data: {
                    "prod_id": prod_id,
                    "prod_qty": qty,
                    "scope": "update"
                },
                success: function(response) {
                    // Handle the response here
                }
            });
        });
        
        $(document).on('click', '.deleteItem', function() {
            var cart_id = $(this).val();
            
            
            $.ajax({
                method: "POST",
                url: "handlecart.php",
                data: {
                    "cart_id": cart_id,
                    "scope": "delete"
                },
                success: function(response) {
                    if(response == 200){
                        alertify.success("Item deleted successfully");
                        $('#mycart').load(location.href + " #mycart"); // Corrected the ID
                    }else{
                        alertify.error("response"); // Corrected alertify
                    }
                }
            });
        });

    });
</script>

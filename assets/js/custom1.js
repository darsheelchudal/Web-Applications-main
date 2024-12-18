$(document).ready(function () {
    $(document).on('click','.delete_product_btn', function (e){

        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this product!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "add_category_code.php",
                    data: {
                        'product_id': id,
                        'delete_product_btn': true
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response == 200) {
                            swal("Success!", "Product Deleted Successfully", "success");
                            $("#products_table").load(location.href + " #products_table");
                        } else if (response == 500) {
                            swal("Error!", "Something Went Wrong", "error");
                        }
                    }
                });
            }
        });
    });

    $(document).on('click','.delete_category_btn', function (e){

        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "add_category_code.php",
                    data: {
                        'category_id': id,
                        'delete_category_btn': true
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response == 200) {
                            swal("Success!", "Product Deleted Successfully", "success");
                            $("#category_table").load(location.href + " #category_table");
                        } else if (response == 500) {
                            swal("Error!", "Something Went Wrong", "error");
                        }
                    }
                });
            }
        });
    });
    
});

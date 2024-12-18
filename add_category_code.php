<?php
session_start();
include 'database.php';
include 'myfunction.php';

if (isset($_POST['add_category_btn'])) {
    // Code to add a new category
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? 1 : 0;
    $popular = isset($_POST['popular']) ? 1 : 0;

    $image = $_FILES['image']['name'];
    $path = "../uploads/";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    $cate_query = "INSERT INTO categories (name, slug, description, image, meta_title, meta_description, meta_keywords, status, popular) 
                VALUES ('$name', '$slug', '$description', '$filename', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$popular')";

    $cate_query_run = mysqli_query($conn, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . $filename);
        redirect("add-category.php", "Category Added Successfully");
    } else {
        redirect("add-category.php", "Something Went Wrong");
    }
} elseif (isset($_POST['update_category_btn'])) {
    // Code to update an existing category
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? 1 : 0;
    $popular = isset($_POST['popular']) ? 1 : 0;

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }
    $path = "../uploads/";

    $update_query = "UPDATE categories SET 
                        name='$name', 
                        slug='$slug', 
                        description='$description', 
                        meta_title='$meta_title', 
                        meta_description='$meta_description', 
                        meta_keywords='$meta_keywords', 
                        status='$status', 
                        popular='$popular', 
                        image='$update_filename' 
                    WHERE id='$category_id'";

    $update_query_run = mysqli_query($conn, $update_query);

    if ($update_query_run) {
        if ($new_image != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . $update_filename);
            if (file_exists($path . $old_image)) {
                unlink($path . $old_image);
            }
        }
        redirect("edit-category.php?id=$category_id", "Category Updated Successfully");
    } else {
        redirect("edit-category.php?id=$category_id", "Something Went Wrong");
    }
} elseif (isset($_POST['delete_category_btn'])) {
    // Code to delete a category
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($conn, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }
        // redirect("category.php", "Category Deleted Successfully");
        echo 200;
    } else {
        // redirect("category.php", "Something Went Wrong");

        echo 500;
    }
} elseif (isset($_POST['add_product_btn'])) {
    // Code to add a new product
    $category_id = $_POST['category_id'];
    $adminId = $_SESSION['AdminId'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? 1 : 0;
    $trending = isset($_POST['trending']) ? 1 : 0;
    $created_at = $_POST['created_at'];

    $image = $_FILES['image']['name'];
    $path = "../uploads/";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if ($name != "" && $slug != "" && $description != "") {
        $product_query = "INSERT INTO products (Admin_ID,category_id, name, slug, small_description, description, original_price, selling_price, image, qty, status, trending, meta_title, meta_description, meta_keywords, created_at) 
        VALUES ('$adminId','$category_id', '$name', '$slug', '$small_description', '$description', '$original_price', '$selling_price', '$filename', '$qty', '$status', '$trending', '$meta_title', '$meta_description', '$meta_keywords', '$created_at')";

        $product_query_run = mysqli_query($conn, $product_query);

        if ($product_query_run) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $path . $filename)) {
                redirect("add-product.php", "Product Added Successfully");
            } else {
                redirect("add-product.php", "Failed to upload image.");
            }
        } else {
            redirect("add-product.php", "Something Went Wrong");
        }
        if (!$product_query_run) {
            echo "Error: " . mysqli_error($conn);
        }
        
    } else {
        redirect("add-product.php", "All fields are mandatory");
    }
} elseif (isset($_POST['update_product_btn'])) {
    // Code to update an existing product
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? 1 : 0;
    $trending = isset($_POST['trending']) ? 1 : 0;
    $created_at = $_POST['created_at'];

    $path = "../uploads/";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }

    $update_product_query = "UPDATE products SET 
                                category_id='$category_id',
                                name='$name',
                                slug='$slug',
                                small_description='$small_description',
                                description='$description',
                                original_price='$original_price',
                                selling_price='$selling_price',
                                image='$update_filename',
                                qty='$qty',
                                status='$status',
                                trending='$trending',
                                meta_title='$meta_title',
                                meta_description='$meta_description',
                                meta_keywords='$meta_keywords',
                                created_at='$created_at' 
                            WHERE id='$product_id'";

    $update_product_query_run = mysqli_query($conn, $update_product_query);

    if ($update_product_query_run) {
        if ($new_image != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . $update_filename);
            if (file_exists($path . $old_image)) {
                unlink($path . $old_image);
            }
        }
        redirect("edit-product.php?id=$product_id", "Product Updated Successfully");
    } else {
        redirect("edit-product.php?id=$product_id", "Something Went Wrong");
    }
} elseif(isset($_POST['delete_product_btn'])){
    // Code to delete a product
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($conn, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../uploads/". $image)) {
            unlink("../uploads/". $image);
        }
        echo 200;
    } else {
        echo 500;
    }
}else if(isset($_POST['update_order_btn'])) {
    $trackingNo = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];
    $updateOrder_query = "UPDATE orders SET status='$order_status' WHERE tracking_no = '$trackingNo'";
    $updateOrder_query_run = mysqli_query($conn, $updateOrder_query);
    redirect("admin-view-order.php?t=$trackingNo", "Order status updated successfully");
}
else {
    header("Location: ../index.php");
}
?>

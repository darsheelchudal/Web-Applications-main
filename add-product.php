<?php
include 'include/header.php';
include 'database.php';
include 'userfunction.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="add_category_code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="category_id">Select Category</label>
                                <select name="category_id" class="form-select" required>
                                    <option selected disabled>Select category</option>
                                    <?php
                                    $categories = getAllActive("categories");

                                    if (mysqli_num_rows($categories) > 0) {
                                        while ($item = mysqli_fetch_assoc($categories)) {
                                    ?>
                                            <option value="<?= $item['id']; ?>"><?= htmlspecialchars($item['name']); ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo '<option disabled>No category available</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="small_description">Small Description</label>
                                <textarea rows="3" name="small_description" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea rows="3" name="description" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="original_price">Original Price</label>
                                <input type="number" name="original_price" min=1 class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="selling_price">Selling Price</label>
                                <input type="number" name="selling_price" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="qty">Quantity</label>
                                <input type="number" name="qty" class="form-control" required>
                            </div>
                            <div class="col-md-7">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-5">
                                <label for="trending">Trending</label>
                                <input type="checkbox" name="trending">
                            </div>
                            <div class="col-md-12">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="meta_description">Meta Description</label>
                                <textarea rows="3" name="meta_description" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea rows="3" name="meta_keywords" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="created_at">Created At</label>
                                <input type="datetime-local" name="created_at" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
?>

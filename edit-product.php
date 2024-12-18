<?php
include 'myfunction.php'; // Assuming you need myfunction.php for the getAll function
include 'include/header.php';
include 'database.php';

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getByID("products", $id);

                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product
                                <a href="product.php" class="btn btn-primary float-end">Back</a>

                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="add_category_code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="category_id">Select Category</label>
                                        <select name="category_id" class="form-select" required>
                                            <option selected disabled>Select category</option>
                                            <?php
                                            $categories = getAll("categories");

                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                            ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected' : '' ?>><?= $item['name']; ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo '<option disabled>No category available</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                    <div class="col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug']; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="small_description">Small Description</label>
                                        <textarea rows="3" name="small_description" class="form-control" required><?= $data['small_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description">Description</label>
                                        <textarea rows="3" name="description" class="form-control" required><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="original_price">Original Price</label>
                                        <input type="number" name="original_price" value="<?= $data['original_price']; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="number" name="selling_price" value="<?= $data['selling_price']; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image">Upload Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                        <input type="file" name="image" class="form-control">
                                        <label class="mb-0">Current Image</label>
                                        <img src="../uploads/<?= $data['image']; ?>" alt="Product Image" height="50px" width="50px">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="qty">Quantity</label>
                                        <input type="number" name="qty" value="<?= $data['qty']; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-7">
                                        <label for="status">Status</label>
                                        <input type="checkbox" name="status" <?= $data['status'] == 1 ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="trending">Trending</label>
                                        <input type="checkbox" name="trending" <?= $data['trending'] == 1 ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" value="<?= $data['meta_title']; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea rows="3" name="meta_description" class="form-control" required><?= $data['meta_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <textarea rows="3" name="meta_keywords" class="form-control" required><?= $data['meta_keywords']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="created_at">Created At</label>
                                        <input type="datetime-local" name="created_at" value="<?= date('Y-m-d\TH:i', strtotime($data['created_at'])); ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            <?php
                } else {
                    echo "Product Not Found for given id";
                }
            } else {
                echo "Id missing from URL";
            }
            ?>
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
?>

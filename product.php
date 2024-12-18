<?php
include 'include/header.php';
include 'myfunction.php';

// Assuming session_start() is called in include/header.php or earlier
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Products</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($_SESSION['role'] == 1) : ?>
                                <?php
                                $products = getAll("products");

                                if ($products && mysqli_num_rows($products) > 0) {
                                    while ($item = mysqli_fetch_assoc($products)) {
                                ?>
                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td>
                                                <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                            </td>
                                            <td>
                                                <?= $item['status'] == '0' ? "Visible" : "Hidden" ?>
                                            </td>
                                            <td>
                                                <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>">Delete</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No records found</td></tr>";
                                }
                                ?>
                            <?php elseif ($_SESSION['role'] == 0) : ?>
                                <?php
                                // Ensure user is logged in
                                if (!isset($_SESSION['AdminLoginId'])) {
                                    header("location: Admin Login.php");
                                    exit(); // Ensure no further code execution after redirection
                                }

                                $adminId = $_SESSION['AdminId'];

                                $products = getAllProductsForAdmin($adminId); // Assuming you have a function to fetch products for a specific admin

                                if ($products && mysqli_num_rows($products) > 0) {
                                    while ($item = mysqli_fetch_assoc($products)) {
                                ?>
                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td>
                                                <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                            </td>
                                            <td>
                                                <?= $item['status'] == '0' ? "Visible" : "Hidden" ?>
                                            </td>
                                            <td>
                                                <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>">Delete</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No records found</td></tr>";
                                }
                                ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
?>

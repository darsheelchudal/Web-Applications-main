<style>
    a {
        text-decoration: none!important;
    }
</style>
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
                    <h4>
                        Orders
                        <a href="order-history.php" class="btn btn-warning float-end">
                            Order history
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Tracking</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($_SESSION['role'] == 1) : ?>
                                <?php
                                $orders = getAllOrders();

                                if (mysqli_num_rows($orders) > 0) {
                                    foreach ($orders as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['tracking_no']; ?></td>
                                            <td>Rs <?= $item['total_price']; ?></td>
                                            <td><?= $item['created_at']; ?></td>
                                            <td>
                                                <a href="admin-view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View details</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6">No orders yet</td>
                                    </tr>
                                <?php
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
                                $orders = getAllOrdersForAdmin($adminId);

                                if (mysqli_num_rows($orders) > 0) {
                                    foreach ($orders as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['tracking_no']; ?></td>
                                            <td>Rs <?= $item['total_price']; ?></td>
                                            <td><?= $item['created_at']; ?></td>
                                            <td>
                                                <a href="admin-view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View details</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6">No orders yet</td>
                                    </tr>
                                <?php
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

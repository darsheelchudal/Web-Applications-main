<style>
    a{
        text-decoration: none!important;
    }
</style>

<?php
include 'navbar.php';
include 'database.php';
include 'userfunction.php';
include 'authencticate.php'; // Corrected spelling of "authenticate.php"

if (isset($_GET['t'])) {
    $trackingNo = $_GET['t']; // Corrected variable name
    $orderData = checkTrackingNoValid($trackingNo); // Corrected variable name
    if (mysqli_num_rows($orderData) > 0) {
        $data = mysqli_fetch_array($orderData);
    } else {
?>
        <h4>Something Went Wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Something Went Wrong</h4>
<?php
    die();
}
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="cloudmart.php" class="text-white">Home</a> /
            <a href="my-orders.php" class="text-white">My Orders</a> /
            <a href="#" class="text-white">View Orders</a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                        <span class="text-white fs-4">View Order</span>
                            <a href="my-orders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i>Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $data['name']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $data['phone']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tracking No.</label>
                                            <div class="border p-1">
                                                <?= $data['tracking_no']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Street No.</label>
                                            <div class="border p-1">
                                                <?= $data['streetno']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $userId = $_SESSION['auth_users']['user_id'];

                                            $order_query = "SELECT o.id as oid, o.tracking_no , o.user_id, oi.*, oi.qty as orderqty , p.* FROM orders o, order_items oi, products p
                                        WHERE o.user_id = $userId AND oi.order_id = o.id AND p.id = oi.prod_id AND o.tracking_no = '$trackingNo' ";
                                            $order_query_run = mysqli_query($conn, $order_query);
                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                while ($item = mysqli_fetch_assoc($order_query_run)) {
                                            ?>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>">
                                                            <?= $item['name']; ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?= $item['price']; ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?= $item['orderqty']; ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5>Total Price: <span class="float-end fw-bold"><?= $data['total_price']; ?></span></h5>
                                    <hr>
                                    <label class="fw-bold">Payment Mode</label>
                                    <div class="border p-1 mb-3">
                                        <?= $data['payment_mode']; ?>
                                    </div>
                                    <label class="fw-bold">Status</label>
                                    <div class="border p-1 mb-3">
                                        <?php
                                        if($data['status'] == 0){
                                            echo "Under Process";
                                        }else if($data['status'] == 1 ){
                                                echo "Completed";
                                        }else if($data['status'] == 2 ){
                                            echo "Cancelled";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'product-view-function.php'; ?>
<?php include 'footer.php'; ?>
<style>
    a {
        text-decoration: none !important;
    }
</style>

<?php
include 'userfunction.php';
include 'navbar.php';
include 'database.php';

if (isset($_GET['category'])) {
    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);

    if ($category) {
        $cid = $category['id'];
        ?>
        <div class="py-3 bg-primary">
            <div class="container">
                <h6 class="text-white">
                    <a href="cloudmart.php" class="text-white">Home</a> /
                    <a href="categories.php" class="text-white">Collections</a> /
                    <?= htmlspecialchars($category['name']); ?>
                </h6>
            </div>
        </div>

        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Our Collections</h1>
                        <hr>

                        <div class="row">
                            <?php
                            $products = getProdByCategory($cid);

                            if (mysqli_num_rows($products) > 0) {
                                while ($item = mysqli_fetch_assoc($products)) {
                                    ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="product-view.php?product=<?= htmlspecialchars($item['slug']); ?>">
                                            <div class="card shadow">
                                                <div class="card-body w-100 h-100">
                                                <img src="../uploads/<?= htmlspecialchars($item['image']); ?>" alt="Product Image" class="w-100 h-100">
                                                    <h4 class="text-center"><?= htmlspecialchars($item['name']); ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<div class='col-12'><p>No products available in this category.</p></div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='container'><p>Category not found.</p></div>";
    }
} else {
    echo "<div class='container'><p>Something went wrong. Please try again.</p></div>";
}

include 'footer.php';
?>

<style>
    a {
        text-decoration: none!important;
    }
</style>

<?php
include 'userfunction.php';
include 'navbar.php';
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Collections</h1>
                <hr>

                <div class="row">
                    <?php
                    $categories = getAllActive("categories");

                    if (mysqli_num_rows($categories) > 0) {
                        while ($item = mysqli_fetch_assoc($categories)) {
                    ?>
                            <div class="col-md-3 mb-2">
                                <a href="products.php?category=<?= htmlspecialchars($item['slug']); ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="../uploads/<?= htmlspecialchars($item['image']); ?>" alt="Category Image" class="w-100">
                                            <h4 class="text-center"> <?= htmlspecialchars($item['name']); ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<div class='col-12'><p>No categories available.</p></div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

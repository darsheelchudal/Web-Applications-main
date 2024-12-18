<?php
include 'userfunction.php';
include 'database.php';
?>

<html>

<head>
    <link rel="stylesheet" href="cloudmart1.css">

    <style>
        /* Ensure the product container has proper spacing and alignment */
.product-container {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

/* Style the individual product card */
.card {
    width: 300px;
    height:800px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

/* Ensure image responsiveness */
.card-img-top {
    width: 100%;
    height: 200px;
    
    object-fit: cover;
}

/* Ensure card content doesn't overflow */
.card-body {
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
}

/* Title and price styling */
.card-title h6 {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 0.5rem;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

/* Price styling */
.current-price {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.original-price {
    font-size: 14px;
    color: #888;
    text-decoration: line-through;
}

/* Ensure text does not overflow and remains within the container */
.card-title, .current-price, .original-price {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Optional: Add a gap between cards */
.product-container {
    gap: 1rem;
}

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }

        .col-4-card {
    height: 100%; /* Ensures the card takes full height of its parent */
}
        .material-symbols-outlined {
            background: green;
            border-radius: 20px;
        }

        .col .card-body {
            border: 6px solid #F85606 !important;
        }

        s {
            text-decoration: line-through;
            color: red;
        }
        .card-body {
    height: 100%; /* Adjusts to fill the card container */
    display: flex;
    flex-direction: column;
    justify-content: center; /* Centers content vertically */
}
        .slider {
    height: 200px; /* Adjust the height as needed */
    overflow: hidden; /* This ensures that anything exceeding the height is hidden */
}
.tab-content{
    margin-top:100px;
}

    </style>
</head>

<body>
    <div class="py-5">
        <div class="container pb-3 pb-3">
            <div class="row">
                <div class="product-container d-flex gap-2">
                    <?php
                    $trendingProducts = getAllTrending();
                    if ($trendingProducts && mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?>
                            <div class="card">
                                <a  href="product-view.php?product=<?= htmlspecialchars($item['slug']); ?>" class="card-container">

                                    <img class="card-img-top w-50" src="../uploads/<?= htmlspecialchars($item['image']); ?>" alt="Product Image">
                                    
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h6 class=""><?= htmlspecialchars($item['name']); ?></h6>
                                        </div>
                                        <div class="current-price">
                                            <span class="currency">Rs.</span>
                                            <span class="price"><?= htmlspecialchars($item['selling_price']); ?></span>
                                        </div>
                                        <span class="original-price">
                                            <span class="currency">Rs.</span>
                                            <s> <span class="price"><?= htmlspecialchars($item['original_price']); ?></span></s>
                                        </span>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="row slider">

                    <!-- <div class="col-4 card">
                        <div class="card-body" style="border: 3px solid orange!important;">
                            <a href="card-container.php"><img src="image/product-item-1.jpg" alt="" class="card-img-top w-100"></a>
                        </div>
                    </div> -->

                    <?php
                    $categories = getAllActive("categories");

                    if (mysqli_num_rows($categories) > 0) {
                        while ($item = mysqli_fetch_assoc($categories)) {
                    ?>
                    <div class="col-4-card">
                        <div class="card-body" style="border: 3px solid orange!important;">
                        <a href="products.php?category=<?= htmlspecialchars($item['slug']); ?>">
                        <img src="../uploads/<?= htmlspecialchars($item['image']); ?>" alt="Category Image" class="card-img-top w-100">
                        </a>
                        </div>
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

        <!-- Top-categories -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
        <!-- Slick Slider JS -->
        <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <script>
            // Tabs
            $(document).ready(function() {
                $(".slider").slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1300,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    responsive: [{
                            breakpoint: 4000,
                            settings: {
                                slidesToShow: 7,
                            },
                        },
                        {
                            breakpoint: 3150,
                            settings: {
                                slidesToShow: 6,
                            },
                        },
                        {
                            breakpoint: 2700,
                            settings: {
                                slidesToShow: 5,
                            },
                        },
                        {
                            breakpoint: 1500,
                            settings: {
                                slidesToShow: 5,
                            },
                        },
                        {
                            breakpoint: 1000,
                            settings: {
                                slidesToShow: 5,
                            },
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 4,
                            },
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                            },
                        },
                        {
                            breakpoint: 400,
                            settings: {
                                slidesToShow: 3,
                            },
                        },
                    ],
                });

                $('a[data-toggle="tab"]').on("shown.bs.tab", function(e) {
                    $(e.target)
                        .parent()
                        .find('a[data-toggle="tab"]')
                        .each(function() {
                            if ($(this).attr("aria-selected") === "true") {
                                var href = $(this).attr("href");
                                $(href).find(".slider").slick("refresh");
                            }
                        });
                });
            });
        </script>

        <!-- Search-Product -->
        <script>
            function search() {
                let filter = document.getElementById('find').value.toUpperCase();
                let item = document.querySelectorAll('.card');
                let l = document.getElementsByTagName('h6');
                for (var i = 0; i <= l.length; i++) {
                    let a = item[i].getElementsByTagName('h6')[0];
                    let value = a.innerHTML || a.innerText || a.textContent;
                    if (value.toUpperCase().indexOf(filter) > -1) {
                        item[i].style.display = "";
                    } else {
                        item[i].style.display = "none";
                    }
                }
            }
        </script>
        <!-- Search-Product -->
</body>

</html>

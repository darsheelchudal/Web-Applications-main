
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product-Buy</title>
    <link rel="stylesheet" href="product-buy.css">
    <script src="https://kit.fontawesome.com/c8371491b6.js" crossorigin="anonymous"></script>

    <!-- slider-img -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- slider-img -->


</head>

<body>
    <nav>
    <?php
    include 'navbar.php';
    ?>
    </nav>
    <div class="bg-color-orange">
        <div class="container">
            <div class="container-flex" style="text-align: center;">
                <h3>Ultima Rock 12W Bluetooth Speaker</h3>
                <span><i class="fa-solid fa-house-user"></i> / Ultima Speaker</span>
            </div>
        </div>
    </div>
    <div class="bg-color-grey">
        <div class="container ">
            <div class="item-container ">
                <div class="left-side">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="image/product-item-10.webp" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="image/product-item-10-apple.webp" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="image/product-item-10.i-apple.webp" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            
                <div class="item-desc">
                    <h2>"Apple Iphone 13 128GB Baby Pink"</h2>

                    <div class="desc-lists">
                        <h3>Rs. 1,24,999</h3>
                    </div>
                    <div class="desc-lists">
                        <div class="star-ratings" style="width: 140px;">
                            <div class="fill-ratings" style="width: 74%;">
                                <span>★★★★★</span>
                            </div>
                            <div class="empty-ratings">
                                <span>★★★★★</span>
                            </div>
                        </div>
                        <p> (Based On 3 Review : - Write A Review)</p>
                    </div>
                    <div class="desc-lists">
                        <p class="options">Short Description :</p>
                        <p class="desc-para"></p>
                    </div>
                    <div class="add-cart" style="width: 100%;">
                        <button id="decrement" class="inc-dec" onclick="stepper(this)" style='padding:3px 4px; margin-left:7px;'> - </button>
                        <input type="number" min="1" max="100" step="1" value="1" id="increment-number" class="add-input">
                        <button id="increment" class="inc-dec" onclick="stepper(this)" style='padding:3px 4px; margin-left:7px;'> + </button>

                        <!-- <button class='addtocartdesc' 
                            onclick=' updateCart('236', '150' ,'0v4r2wGTwLBhHvvOr83TV2JkBEl8uuznni3472oi','increment-number')' style='padding:3px; border-radius:5px; margin-left:7px;'>Add
                            To Cart </button>

                        <button class='buynowdesc' onclick='addToCart('236', '150', 1,'0v4r2wGTwLBhHvvOr83TV2JkBEl8uuznni3472oi','buy')' style='padding:3px; border-radius:5px; margin-left:7px;'>Buy Now</button> -->

                        <?php
                        if (!isset($_SESSION['user'])) {
                            echo "
                            <button type='button' name='Add_To_Cart' class='addtocartdesc' style='padding:3px; border-radius:5px; margin-left:7px;' onclick='redirectToLogin()'>
                                Add To Cart 
                            </button>
                            
                            <script>
                            function redirectToLogin() {
                                alert('Welcome! Please Login to continue.');
                                window.location.href = 'login.php';
                            }
                            </script>
                        ";
                        } else {
                            echo "
                            <form action='manage_cart.php' method='POST'>
                            <button type='submit' name='Add_To_Cart' class='addtocartdesc' style='padding:3px; border-radius:5px; margin-top:12px;' onclick='alreadyadded()'>Add
                            To Cart </button>
                            <input type='hidden' name='Item_Name' value='Apple Iphone 13'>
                            <input type='hidden' name='Price' value='124999'>
                            </form>


                            <form>
                            <button class='buynowdesc' style='padding:3px; border-radius:5px; margin-top:12px;'>Buy Now</button>
                            </form>
                            ";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- review-section -->
    <div class="container">
        <div class="review-desc">
            <div class="product-description">
                <h2>FEATURES</h2>
            </div>
            <div class="write-review">
                <h2>Write A Review</h2>
                <form action="" method="post" class="review-form" onsubmit="return validateForm();">
                    <input type="hidden" name="_token" value="2xV3ylBwINKCCLT4a6VtwKn4uVwF9gAb5G0WImFd"> <input type="hidden" required="" name="item_id" value="236">
                    <label for="name">Your Name <span>*</span></label><br><br>
                    <input type="text" required="" name="name"><br><br>
                    <label for="desc">Your Review <span>*</span></label><br><br>
                    <textarea name="review" required=""></textarea><br><br>
                    <p class="error-message" id="error-message" style="margin-top: 5px; margin-bottom:5px; display:none;">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        Warning: Please select a review rating!
                    </p>
                    <label>Your Rating <span>*</span></label><br>

                    <div class="star-container">
                        <input type="hidden" name="totalscore" value>
                        <input type="hidden" name="totalresponse" value>
                        <div class="star-widget d-flex">
                            <input type="text" name="star" id="reviewStar" value>
                            <input type="radio" class="start-review" name="rate" id="rate-5" onclick="reviewClickUpdate('5')">
                            <label for="rate-5" class="fas fa-star" aria-hidden="true"></label>
                            <input type="radio" class="start-review" name="rate" id="rate-4" onclick="reviewClickUpdate('4')">
                            <label for="rate-4" class="fas fa-star" aria-hidden="true"></label>
                            <input type="radio" class="start-review" name="rate" id="rate-3" onclick="reviewClickUpdate('3')">
                            <label for="rate-3" class="fas fa-star" aria-hidden="true"></label>
                            <input type="radio" class="start-review" name="rate" id="rate-2" onclick="reviewClickUpdate('2')">
                            <label for="rate-2" class="fas fa-star" aria-hidden="true"></label>
                            <input type="radio" class="start-review" name="rate" id="rate-1" onclick="reviewClickUpdate('1')">
                            <label for="rate-1" class="fas fa-star" aria-hidden="true"></label>

                        </div>
                    </div>

                    <div class="button-align">
                        <button class="review-button" type="submit" name="submit">Submit <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                </form>
                <script>
                    function reviewClickUpdate(star) {
                        document.getElementById('reviewStar').value = star;
                    }

                    function validateForm() {
                        if (document.getElementById("reviewStar").value == "") {
                            document.getElementById("error-message").style.display = "block";
                            return false;
                        }
                    }
                </script>
                <div class="whole-reviews-scrollable">
                    <div class="your-reviews">


                        <div class="name-date">
                            <p class="name-review">Binaya</p>
                            <p class="comented-date">2023-12-02</p>
                        </div>
                        <div class="your-comment">
                            <p>best product</p>
                            <div class="star-ratings" style="width: 140px;">
                                <div class="fill-ratings" style="width: 100%;">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="your-reviews">


                        <div class="name-date">
                            <p class="name-review">Sudeep</p>
                            <p class="comented-date">2024-01-08</p>
                        </div>
                        <div class="your-comment">
                            <p></p>
                            <div class="star-ratings" style="width: 140px;">
                                <div class="fill-ratings" style="width: 20%;">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="your-reviews">


                        <div class="name-date">
                            <p class="name-review">Dhiren</p>
                            <p class="comented-date">2024-01-30</p>
                        </div>
                        <div class="your-comment">
                            <p>nice</p>
                            <div class="star-ratings" style="width: 140px;">
                                <div class="fill-ratings" style="width: 100%;">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- review-section -->

    <footer>
    <?php
    include 'footer.php';
    ?>
    </footer>
    <!-- add-botton-increment -->
    <script>
        const myInput = document.getElementById("increment-number");

        function stepper(btn) {
            let id = btn.getAttribute("id");
            let min = myInput.getAttribute("min");
            let max = myInput.getAttribute("max");
            let step = myInput.getAttribute("step");
            let val = myInput.getAttribute("value");
            let calcStep = (id == "increment") ? (step * 1) : (step * -1);
            let newValue = parseInt(val) + calcStep;

            if (newValue >= min && newValue <= max) {
                myInput.setAttribute("value", newValue);
            }
        }
    </script>
    <!-- add-botton-increment -->


    <!-- slider-img -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <!-- slider-img -->


</body>


</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card container</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 <style>
    @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    *{
        top: 0;
        margin: 0;
        padding: 0;
    }
    body{
        overflow-x: hidden;
        font-family:'Montserrat', sans-serif;
    }
    .product-container{
        margin-top: 30px;
        flex-wrap: wrap;
    }
    .card{
        width: calc(20% - 1rem);
    margin-bottom: 10px;
    }
    @media only screen and (max-width:990px){
    .product-container{
        width: 600px;
        justify-content: center;
        transform: translate(10%,-0%);
    }
    .card{
        width: calc(25% - 1rem);
    }
    @media only screen and (max-width:765px){
    .product-container{
        transform: translate(-5%,-0%);
    }
    .card{
        width: calc(33% - 1rem);
    }
}
}
.card a{
    text-decoration: none;
    color: #43766C;
}
.card a:hover{
    background: none;
    color: #000;
}
.card-body .card-title{
    margin: 0;
    padding-bottom: 0;
    text-align: justify;
    font-size: smaller;
    font-weight: 500;
}
.card-body .card-price span{
    color: #F85606;
}
.card-body .original-price span{
    color: grey;
}
.card-body .discount {
    color: black;
}
.card-sold{
    margin-bottom: 0!important;
}
.topic{
    text-align: center;
}
.topic:before {
    margin-right: 10px;
    width: 50px;
    height: 3px;
    background: #F85606!important;
    content: "";
    display: inline-block;
    vertical-align: middle;
    position: relative;
    top: 50%;
    left: 0;
    /* -webkit-transform: translate(0, -50%); */
}
.topic::after {
    margin-right: 10px;
    width: 50px;
    height: 3px;
    background: #F85606!important;
    content: "";
    display: inline-block;
    vertical-align: middle;
    position: relative;
    top: 50%;
    left: 0;
    /* -webkit-transform: translate(0, -50%); */
}
</style>



</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    
    <!-- product-card -->
    <div class="container pb-3 pb-3">
        <h1 class="topic">Beauty Product</h1>
            <div class="product-container d-flex gap-2">
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-1.jpg" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Ultima Rock 12W Bluetooth Speaker With 12Hrs...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-2.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Apple Smart Watch SE 2nd Gen GPS Aluminum case sporty...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">1499</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">1999</span>
                            </span>
                            <span class="discount">-10%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-3.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Airforce 1 Grey White Lightweight Sneaker Shoes...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">4499</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">4999</span>
                            </span>
                            <span class="discount">-20%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-4.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Winter Heavy Fur Jacket For Men. - Fashion...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2999</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-35%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-5.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Super Absobent Microfiber Hair Drying Wrap Towel..</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-6.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Makeup Brush Prm-Synthetics Foundation Face Powder..</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-7.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Derma Roller For Hair Beard Growth, Hair Regen..</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-8.jpg" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>CARAVAN-Black Tote Bag for Women Hand Bag...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-10.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Apple iphone 13 128GB-Flashship Mobile-EvoStore spec_edition.</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image\product-item-airdopes.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>boat AIRDOPES 381 | Ear Wireless Earbuds 20Hrs Long..</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-1.jpg" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Acnes Vitamin Cleanser Fash Wash 100% Natural 100g...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image\product-item-trouser.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Gray & Black Strchable Trouser For Men-fashion-trousers...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">1499</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">1999</span>
                            </span>
                            <span class="discount">-10%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image\product-item-chocolate-jam.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Muscleblaze Pintola Chocolate Peanut Butter Crunchy 1Kg..</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">4499</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">4999</span>
                            </span>
                            <span class="discount">-20%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-Sunglasses.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>LouisWill Fashion Sunglasses Unisex Nylon UV400 Sun Protection...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2999</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-35%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-1.jpg" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Ultima Rock 12W Bluetooth Speaker With 12Hrs...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-2.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Apple Smart Watch SE 2nd Gen GPS Aluminum case sporty...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">1499</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">1999</span>
                            </span>
                            <span class="discount">-10%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-3.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Airforce 1 Grey White Lightweight Sneaker Shoes...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">4499</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">4999</span>
                            </span>
                            <span class="discount">-20%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-4.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Winter Heavy Fur Jacket For Men. - Fashion...</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2999</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-35%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-5.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Super Absobent Microfiber Hair Drying Wrap Towel..</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-5.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Super Absobent Microfiber Hair Drying Wrap Towel..</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="product-buy.php" class="card-container">
                        <img src="image/product-item-5.webp" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Super Absobent Microfiber Hair Drying Wrap Towel..</h6>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rs.</span>
                                <span class="price">2799</span>
                            </div>
                            <span class="original-price">
                                <span class="currency">Rs.</span>
                                <span class="price">3999</span>
                            </span>
                            <span class="discount">-30%</span>
                            <div class="card-sold"></div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    <?php
    include 'footer.php';
    ?>

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

    <!-- script -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <!-- script -->
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include('databaseConnect.php');
    $tableDB = "products";
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/css/header_footer_style.css" />
    <link rel="stylesheet" href="../styles/css/loading_screen_style.css" />
    <link rel="stylesheet" href="../styles/css/aos.css" />
    <link rel="stylesheet" href="../styles/css/catalogue_style.css" />
    <link rel="stylesheet" href="../styles/css/products_style.css" />
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

    <title>Catalogue Page</title>
    <link rel="icon" type="image/x-icon" href="../styles/images/favicon.ico">
</head>

<body class="inactive">
    <section class="background">
        <h1 class="bg-title">#TGRWIN</h1>
    </section>
    <section class="bg-1"></section>
    <section class="bg-2"></section>

    <section class="main-container">
        <!-- HEADER -->
        <section class="main-header-container">
            <div class="header-container" data-aos="fade-in">
                <div class="header_logo">
                    <a href="#"><img src="../styles/images/LOGO_TELETIGERS 3.png" class="tgr_logo"><img
                            src="../styles/images/Teletigers Text.png" class="text_logo" /></a>
                </div>
                <ul class="header-opt">
                    <li><a href="index.php">home</a></li>
                    <li><a href="catalogue.php">products</a></li>
                    <li><a href="wip.php">services</a></li>
                    <li><a href="order_status.php">tracking</a></li>
                    <li><a href="help.php">FAQs</a></li>
                </ul>

                <div class="header-icons-container">
                    <form class="search-form" action="">
                        <input class="search-input" type="search" placeholder="Search here .">
                        <i class="fa fa-search"></i>
                    </form>
                    <a href="cart.php">
                    <img src="../styles/images/shopping-bag.png" class="bag-icon" />
                    </a>
                </div>
            </div>

        </section>
        <!--container 2 -->
        <section class="cata-container">
            <section class="container-2" id="cont2">
                <div class="cont-restrict">

                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li style="color: white;">Products</li>
                      </ul>

                    <div class="all-products">
                        <h1 class="prod-header">All Products</h1>
                        <hr>
                        <div class="sort-container">
                            <h5 style="color: white;">Sort By</h5>
                            <div class="dropdown">
                                <input type="checkbox" id="my-dropdown1" value="" name="my-checkbox1">
                                <label for="my-dropdown1" data-toggle="dropdown">
                                    Name
                                </label>
                                <ul>
                                    <li><a href="#">A to Z</a></li>
                                    <li><a href="#">Z to A</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <input type="checkbox" id="my-dropdown2" value="" name="my-checkbox2">
                                <label for="my-dropdown2" data-toggle="dropdown">
                                    Date
                                </label>
                                <ul>
                                    <li><a href="#">Newest</a></li>
                                    <li><a href="#">Oldest</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <input type="checkbox" id="my-dropdown3" value="" name="my-checkbox3">
                                <label for="my-dropdown3" data-toggle="dropdown">
                                    Price
                                </label>
                                <ul>
                                    <li><a href="#">Ascending</a></li>
                                    <li><a href="#">Descending</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <input type="checkbox" id="my-dropdown4" value="" name="my-checkbox4">
                                <label for="my-dropdown4" data-toggle="dropdown">
                                    Category
                                </label>
                                <ul>
                                    <li><a href="#">Category 1</a></li>
                                    <li><a href="#">Category 2</a></li>
                                    <li><a href="#">Category 3</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="products">
                            <?php 
                                $shirt = $pdo->query("SELECT * from $tableDB WHERE id = '1'");
                                $jersey = $pdo->query("SELECT * from $tableDB WHERE id = '2'");
                                $jacket = $pdo->query("SELECT * from $tableDB WHERE id = '3'");
                                $mask = $pdo->query("SELECT * from $tableDB WHERE id = '4'");
                                $_SESSION['shirt'] = $shirt;
                                $_SESSION['jersey'] = $jersey;
                                $_SESSION['jacket'] = $jacket;
                                $_SESSION['mask'] = $mask;
                            ?>


                            <div class="product-tile">
                                <?php while($row = $shirt->fetch()) {?>
                                <a href="product_info.php?next_id= <?php echo $row['id']?>" class="product-img-container"><img src="../styles/images/<?php echo $row['ProductImage']; ?>_1.jpg"
                                        alt=""></a>
                                <div class="product-title">
                                    <h1><?php echo $row['ProductName']; ?></h1>
                                </div>
                                <div class="product-price">
                                    <h3><?php echo $row['ProductPrice']; }?></h3>
                                </div>
                            </div>
                            <div class="product-tile">
                            <?php while($row = $jersey->fetch()) {?>
                                <a href="product_info.php?next_id=<?php echo $row['id']?>" class="product-img-container"><img src="../styles/images/<?php echo $row['ProductImage']; ?>_1.jpg"
                                        alt=""></a>
                                <div class="product-title">
                                    <h1><?php echo $row['ProductName']; ?></h1>
                                </div>
                                <div class="product-price">
                                    <h3><?php echo $row['ProductPrice']; }?></h3>
                                </div>
                            </div>
                            <div class="product-tile">
                            <?php while($row = $jacket->fetch()) {?>
                                <a href="product_info.php?next_id=<?php echo $row['id']?>" class="product-img-container"><img src="../styles/images/<?php echo $row['ProductImage']; ?>_1.jpg"
                                        alt=""></a>
                                <div class="product-title">
                                    <h1><?php echo $row['ProductName']; ?></h1>
                                </div>
                                <div class="product-price">
                                    <h3><?php echo $row['ProductPrice']; }?></h3>
                                </div>
                            </div>
                            <div class="product-tile">
                            <?php while($row = $mask->fetch()) {?>
                                <a href="product_info.php?next_id=<?php echo $row['id']?>"class="product-img-container"><img src="../styles/images/<?php echo $row['ProductImage']; ?>_1.jpg"
                                        alt=""></a>
                                <div class="product-title">
                                    <h1><?php echo $row['ProductName']; ?></h1>
                                </div>
                                <div class="product-price">
                                    <h3><?php echo $row['ProductPrice']; }?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">&raquo;</a>
                      </div>

                </div>
            </section>

          

        </section>

      

        <!-- FOOTER -->
        <section class="main-footer-container">
            <div class="footer-row">
                <div class="footer-left-col">
                    <div class="text-row">
                        <div class="info-tab">
                            <h1>Information</h1>
                            <a href="">
                                <h2>About Teletigers</h2>
                            </a>
                            <a href="">
                                <h2>Teletigers website</h2>
                            </a>
                            <a href="">
                                <h2>FAQs</h2>
                            </a>
                        </div>
                        <div class="info-tab">
                            <h1>Customer Services</h1>
                            <a href="help.php">
                                <h2>Return Policy</h2>
                            </a>
                            <a href="help.php">
                                <h2>Accessibility</h2>
                            </a>
                            <a href="help.php">
                                <h2>Terms and Conditions</h2>
                            </a>
                        </div>
                        <div class="info-tab">
                            <h1>Affiliates</h1>
                            <!-- Fatherless Behavior-->
                        </div>
                    </div>
                </div>
                <div class="footer-right-col">
                    <div class="footer-logo"><a href="#"><img src="../styles/images/LOGO_TELETIGERS 3.png"
                                class="tgr_logo">
                            <h1 class="text_logo">TELETIGERS</h1>
                        </a></div>
                    <div class="contact" id="contact">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/TeletigersEsports"><i
                                        class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/Teletigers_"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitch"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="text">all rights reserved 2022</div>
                </div>
            </div>

        </section>
    </section>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../styles/js/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        delay: 1650,
    });
    window.onload = function () {
        $(".bg-1, .bg-2, .bg-title").addClass("active");
    };

    window.onunload = function () {
        window.scrollTo(0, 0);
    };
    window.setTimeout(function () {
        $(".bg-1, .bg-2, .main-container").addClass("finished");
    }, 2250);
    window.setTimeout(function () {
        $("body").removeClass("inactive");
    }, 2800);

    var nav = document.querySelector('.sort-container');
    nav.addEventListener('toggle', function (event) {

        // Only run if the dropdown is open
        if (!event.target.open) return;

        // Get all other open dropdowns and close them
        var dropdowns = nav.querySelectorAll('.dropdown[open]');
        Array.prototype.forEach.call(dropdowns, function (dropdown) {
            if (dropdown === event.target) return;
            dropdown.removeAttribute('open');
        });

    }, true);

    var count = $('.products').children().length;

    $('#result').text(count);
</script>

</html>
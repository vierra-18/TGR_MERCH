<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include('databaseConnect.php');
    $tableDB = "orders";
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/css/header_footer_style.css" />
    <link rel="stylesheet" href="../styles/css/loading_screen_style.css" />
    <link rel="stylesheet" href="../styles/css/aos.css" />
    <link rel="stylesheet" href="../styles/css/order_status_style.css" />
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="order_status.js"></script>

    <title>Order Status Page</title>
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
                        <input class="search-input" type="search" placeholder="Search here ...">
                        <i class="fa fa-search"></i>
                    </form>
                    <a href="cart.php">
                    <img src="../styles/images/shopping-bag.png" class="bag-icon" />
                    </a>
                </div>
            </div>

            <section class="order-stat-container">
                <section class="sub-container" id="subcont">
                    <div class="cont-restrict">

                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li style="color: white;">Order Tracking</li>
                        </ul>

                        <!-- Order Tracking Search Bar -->
                        <div class="order-tracking-cont">
                            <div class="page-heading-labels">
                                <h1 class="order-headers">Order Status Tracking</h1>
                                <hr>
                            </div>
                            <form action="" method="POST" class="form-inline"> 
                                <input type="search" id="tracking-search" placeholder="Please enter your Order Number." autocomplete="off" name="tracking_search">
                                <div class="buttons">
                                    <input id="tracking-button" type="submit" class="button btn-2" value="Search" name="track"></input>
                                </div>
                            </form>
                        </div>

                        <?php 
                            if(isset($_POST['track']))
                            {
                                $tracking_search = $_POST['tracking_search'];                                
                                $result = $pdo->prepare('SELECT * FROM orders where OrderID= :n');
                                $result->bindParam('n', $tracking_search);
                                $result->execute();                                
                                $row = $result->fetch();
                                $_SESSION['IDOrder'] = $row['OrderID'];
                                $_SESSION['DateOrder'] = $row['OrderDate'];
                                $_SESSION['NameCustomer'] = $row['FirstName']. ' ' . $row['LastName'];                                                               
                            ?>
                        
                        <!-- Order Details -->
                        <div class="order-details-cont">
                            <div class="page-heading-labels">
                                <h1 class="order-headers">Order Details</h1>
                                <hr>
                            </div>

                            <div class="customer-cont">
                                <div class="customer-item">
                                    <label>Customer Name: </label>
                                    <div class="customer-value" id="customer-name"><?php echo $row["FirstName"]. ' ' . $row["LastName"] ?></div>
                                </div>
                                <div class="customer-item">
                                    <label>Contact Number: </label>
                                    <div class="customer-value" id="contact-number"><?php echo $row["CustomerNumber"] ?></div>
                                </div>
                                <div class="customer-item">
                                    <label>Email Address: </label>
                                    <div class="customer-value" id="email-address"><?php echo $row["CustomerEmail"] ?></div>
                                </div>
                                <div class="customer-item">
                                    <label>Delivery Option: </label>
                                    <div class="customer-value" id="delivery-option"><?php echo $row["CourierChoice"] ?></div>
                                </div>
                            </div>

                            <div class="order-table">
                                <div class="column-labels">
                                    <label class="order-no">ORDER NO.</label>
                                    <label class="order-date">ORDER PLACING DATE</label>
                                    <label class="order-payment-stat">PAYMENT STATUS</label>
                                    <label class="order-waybill-no">WAYBILL NO.</label>
                                    <label class="order-delivery-stat">DELIVERY STATUS</label>
                                </div>

                                <div class="orders">
                                    <div id="order-number" class="order-no"><?php echo $row["OrderID"] ?></div>
                                    <div id="order-date" class="order-date"><?php echo $row["OrderDate"] ?></div>
                                    <div id="payment" class="order-payment-stat"><?php echo $row["PaymentStatus"] ?></div>
                                    <div id="waybill-no" class="order-waybill-no"><?php echo $row["CourierNumber"] ?></div>
                                    <div id="delivery-status" class="order-delivery-stat"><?php echo $row["OrderStatus"] ?></div>
                                </div>
                            </div>

                        </div>

                        <!-- Order Summary -->
                        <div class="order-summary-cont">
                            <div class="page-heading-labels">
                                <h1 class="order-headers">Order Summary</h1>
                                <hr>
                            </div>
                            <br>

                            <div class="order-table">
                                <div class="column-labels">
                                    <label class="product-image">PRODUCT</label>
                                    <label class="product-details">Product</label>
                                    <label class="product-price">PRICE</label>
                                    <label class="product-quantity">QUANTITY</label>
                                    <label class="product-line-price">TOTAL</label>
                                </div>

                                <?php 
                                    $productName = $row["MerchType"];
                                ?>

                                <div class="product">
                                    <div class="product-image">
                                        <img src="../styles/images/<?php echo $row["MerchType"]?>_1.jpg">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-title"><?php echo $row["MerchType"]?></div>
                                        <p class="product-description"><?php echo $row["MerchSize"]?></p>
                                    </div>
                                    <div class="product-price"><?php echo $row["MerchPrice"]?></div>
                                    <div class="product-quantity"><?php echo $row["MerchQuantity"]?></div>
                                </div>
                                    <div class="totals-item" style="text-align: right;width: 100%;">
                                        <label>TOTAL: </label>
                                        <div class="totals-value" id="order-total"><?php echo $row["MerchQuantity"]*$row["MerchPrice"] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="buttons" style="float: right; margin-top: 2em; width: 25%;">
                            <a href="payment_proof.php" class="button btn-2">Send Proof of Payment</a>
                        </div>
                        <?php  } ?>
                    </div>
                </section>
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

    // var container = document.getElementById("cont2");
    // window.onmousemove = function (e) {
    //     var x = - e.clientX / 5;
    //     var y = - e.clientY / 5;
    //     container.style.backgroundPositionX = x + 'px';
    //     container.style.backgroundPositionY = y + 'px';
    // }
</script>

</html>
<!DOCTYPE html>
<?php 
session_start();
include('databaseConnect.php');
$tableDB = "orders";
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/css/header_footer_style.css" />
    <link rel="stylesheet" href="../styles/css/aos.css" />
    <link rel="stylesheet" href="../styles/css/loading_screen_style.css">
    <link rel="stylesheet" href="../styles/css/checkout_style.css" />
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

    <title>Checkout Page</title>
    <link rel="icon" type="image/x-icon" href="../styles/images/favicon.ico">
</head>

<body>

    <section class="main-container">

        <!--forms-container-->
        <section class="forms-container">
            <div class="logo">
                <img class="tgr-logo" src="../styles/images/LOGO_TELETIGERS 2.png" alt="">
                <img class="tgr-text" src="../styles/images/Teletigers Text.png" alt="">
            </div>
            <div class="form-container">
                <h1>Shipping</h1>
                <p>Please enter your shipping details.</p>
                <form class="form" method="post">
                    <div class="fields fields--2">
                        <label class="field">
                            <span class="field__label" for="firstname">First name</span>
                            <input class="field__input" type="text" id="firstname" name="FirstName" />
                        </label>
                        <label class="field">
                            <span class="field__label" for="lastname">Last name</span>
                            <input class="field__input" type="text" id="lastname" name="LastName"/>
                        </label>
                    </div>
                    <div class="fields fields--2">
                        <label class="field">
                            <span class="field__label" for="email">E-mail Address</span>
                            <input class="field__input" type="email" id="email" name="CustomerEmail"/>
                        </label>
                        <label class="field">
                            <span class="field__label" for="contact-num">Contact number</span>
                            <input class="field__input" type="tel" id="contact-num" name="CustomerNumber" />
                        </label>
                    </div>
                    <div class="fields">
                        <label class="field">
                            <span class="field__label" for="address">Address</span>
                            <input class="field__input" type="text" id="address" name="Address"/>
                        </label>
                    </div>

                    <div class="fields fields--3">
                        <label class="field">
                            <span class="field__label" for="province">Province</span>
                            <input class="field__input" type="text" id="province" name="Province"/>
                            </select>
                        </label>
                        <label class="field">
                            <span class="field__label" for="city">City</span>
                            <input class="field__input" type="text" id="city" name="City"/>
                        </label>
                        <label class="field">
                            <span class="field__label" for="zipcode">Zip code</span>
                            <input class="field__input" type="text" id="zipcode" name="ZIP"/>
                        </label>
                    </div>
                    <div class="courier">
                        <h1>Delivery method</h1>
                        <p>Please choose/enter your desired delivery method</p>
                        <div class="fields">
                            <label class="field">
                                <span class="field__label" for="courier">Courier</span>
                                <input class="field__input" type="text" id="courier" list="courier-list" name="CourierChoice">
                                <datalist id="courier-list">
                                    <option value="J&T Express"></option>
                                    <option value="Grab"></option>
                                    <option value="Lalamove"></option>
                                </datalist>
                            </label>
                        </div>
                    </div>
                    <?php
        if(isset($_POST['insert']))
        {
            $LastName = $_REQUEST['LastName'];
            $FirstName = $_REQUEST['FirstName'];
            $CustomerNumber = $_REQUEST['CustomerNumber'];
            $CustomerEmail = $_REQUEST['CustomerEmail'];
            $Address = $_REQUEST['Address'];
            // $MerchType = $_REQUEST['MerchType'];
            // $MerchPrice = $_REQUEST['MerchPrice'];
            $CourierChoice = $_REQUEST['CourierChoice'];
            // $CourierNumber = $_REQUEST['CourierNumber'];
            $Province = $_REQUEST['Province'];
            $City = $_REQUEST['City'];
            $Zip = $_REQUEST['ZIP'];
            $CustomerAddress = $Address . ', ' . $City . ', ' . $Province . ', ' . $Zip;
            date_default_timezone_set('Asia/Manila');
            $OrderDate = date('m-d-y h:i:s');

            $random = bin2hex(random_bytes(6));
            $OrderID = "TGR" . $random;

            $sql = "INSERT INTO $tableDB (`OrderID`, `LastName`, `FirstName`, `CustomerNumber`, `CustomerEmail`, `CustomerAddress`,'OrderDate' , `CourierChoice`) 
                    VALUES ('$OrderID', '$LastName', '$FirstName', '$CustomerNumber', '$CustomerEmail', '$CustomerAddress', '$OrderDate' ,'$CourierChoice')"; 

            $CustomerName = $FirstName . ' ' . $LastName;
            $_SESSION['IDOrder'] = $OrderID;
            $_SESSION['NameCustomer'] = $CustomerName;
            $_SESSION['DateOrder'] = $OrderDate;
            if($pdo->query($sql))
            {
                echo '<h3>Successful</h3>';
                echo "<script>location.href='payment_proof.php';</script>";
            }
            else
            {
                echo '<h3>Unsuccessful, Retry</h3>';
            }
        }
        else
        {
            echo '<h3>Failure</h3>';
        }
    ?>
                    <div class="payment">
                        <h1>Payment Information</h1>
                        <fieldset>
                            <br>
                            <p style="padding: 0.2em 0.8em 1em 1em;">
                                We accept bank transfer payments via BPI and BDO. Please use your Order ID as the
                                payment reference.
                                Your order will not be shipped until the funds have cleared in our account. </p>
                            <p> &emsp; BDO:
                                <br> &emsp; Account Name: Lorem Ipsum
                                <br> &emsp; Account Number: 1234-4321-5678
                            </p>
                            <p> &emsp; BPI:
                                <br> &emsp; Account Name: Lorem Ipsum
                                <br> &emsp; Account Number: 4321- 1234-12
                            </p>
                        </fieldset>
                    </div>
                    <div class="buttons">
                        <a href="cart" class="button btn-1">Return to cart</a>
                        <input type="submit" class="button btn-2" value="Place order" name="insert"></input>
                    </div>
                </form>

            </div>
        </section>
        <section class="orders-container">
            <div class="product-cont">
                <div class="prod-img"><img src="../styles/images/mini_banner_3.png" alt=""></div>
                <div class="prod-name">
                    <h1>a very long product name</h1>
                    <h1>[[quantity]]</h1>
                </div>
                <div class="prod-price">
                    <h1>php 00.00</h1>
                </div>
            </div>
            <hr>
            <div class="costs-cont">
                <div class="sub-tot">
                    <h1>Subtotal</h1>
                    <h1>php 00.00</h1>
                </div>
                <div class="ship-fee">
                    <h1>Shipping fee</h1>
                    <h1>php 00.00</h1>
                </div>
            </div>
            <hr>
            <div class="total-cont">
                <div class="total">
                    <h2>total</h2>
                    <h1>php 00.00</h1>
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

    window.onunload = function () {
        window.scrollTo(0, 0);
    };
</script>

</html>
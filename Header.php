<?php
ob_start(); //solves header errors
session_start();
/* require all the class instances in one file */
require_once('./classInstances.php');

/* require all the functions in one file */
require_once('./functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="./js/jquery.min.js"></script>
    <!-- Jquery- -->

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <!-- Bootstrap link -->

    <!-- Font awesome -->
    <link rel="stylesheet" href="./css/all.css" />
    <!-- Font awesome -->

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css" />
    <link rel="stylesheet" href="./css/owl.theme.default.min.css" />
    <!-- Owl Carousel -->

    <!-- custon css file -->
    <link rel="stylesheet" href="style.css" />
    <!-- custon css file -->


    <title>Mobile Shopee</title>
</head>

<body class="color-back">
    <!---- HEADER-- --->
    <header id="header" class="color-white-bg">
        <div class="strip d-flex justify-content-between px-4 py-1 border-bottom">
            <div class="font-rale font-size-14 m-0 d-flex">
                <a href="CreateAccount.php" class="text-black-50 border-right m-1 px-3">Join Us</a>
            </div>
            <div class="font-rale m-0 d-flex">
                <a href="Login.php" class="font-size-14 text-black-50 m-1 px-3 border-right">Join/Login To Peagusus member Profile</a>
                <?php // fetch products from database wen
                $user_id = $_SESSION['user_id'] ?? 8;
                $cartData = $cart->getCartData('cart', $user_id); ?>
                <span class="font-rale border-right px-3 font-size-14"><a href="Cart.php" class="text-black-50"><i class="fas fa-shopping-cart px-2"></i>(<?php echo $cart->cartCount($cartData); ?>)</a></span>
                <span class="font-rale px-3 text-black-50 font-size-14"><i class="fas fa-map-marker-alt px-2"></i>(Uganda)</span>
                <?php // fetch products from wishlist table wen
                $WishData = $cart->getCartData('wishlist', $user_id); ?>
                <a href="WishList.php"><span class="font-rale px-3 text-black-50 font-size-14 border-left"><i class="fas fa-heart"></i>(<?php echo $cart->cartCount($WishData); ?>)</span></a>
            </div>
        </div>

        <!-- --Navigation-- -->
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between font-weight-bold font-rubik color-black">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="index.php">
                    <img src="./assets/logo.png" alt="" width="40" height="30" class="img-fluid m-2" />Peagasus</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Categories.php" tabindex="-1">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="AllProducts.php" tabindex="-1">Products</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="Cart.php" tabindex="-1">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="WishList.php" tabindex="-1">WishList</a>
                    </li>


                </ul>
                <ul class="navbar-nav mr-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Login.php"> <i class="fas fa-sign-in-alt"></i> &nbsp; Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="CreateAccount.php"><i class="fas fa-user-plus"></i> &nbsp; Create Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="AdminLogin.php"><i class="fas fa-users-cog"></i> &nbsp; Admin</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!--x --Navigation--x -->
    </header>
    <!--X-- HEADER-- X--->

    <!-- ---MAIN SITE--- -->
    <main>
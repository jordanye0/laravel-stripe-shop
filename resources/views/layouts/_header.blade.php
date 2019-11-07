<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel - Shop</title>

    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/crumina-fonts.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/primary-menu.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>


<body class=" ">

<header class="header" id="site-header">

    <div class="container">

        <div class="header-content-wrapper">

            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{ Cart::content()->count() }}</span>
                    </a>

                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            <h4 class="title-cart align-center">${{ Cart::total() }}</h4>
                            <br>
                            <a href="{{ route('cart') }}">
                                <div class="btn btn-small btn--dark">
                                    <span class="text">View Cart</span>
                                </div>
                            </a>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </div>

</header>
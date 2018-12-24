<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/sabujcha/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Oct 2018 13:15:51 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>AssamTea || Home</title>
        <meta name="description" content="">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->
		
		<!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/chosen.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
		<link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/style1.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
    <body>
        <!-- header start -->
        <header class="header-area gray-bg clearfix">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 header-top-left">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-phone top-icon"></i> +123 456 789</li>
                                <li><i class="fa fa-envelope top-icon"></i> hello@eduread.com</li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-xs-12 header-top-right">
                            <ul class="list-unstyled">
                                <?php
                                if (isset($_SESSION['email']) && isset( $_SESSION['user_id']) && isset( $_SESSION['user_type']) &&  $_SESSION['user_type'] == 4) {
                                   print '<li><a href="user_login_system/user_logout.php"><i class="fa fa-user-plus top-icon"></i>Logout</a></li>';
                                }else{
                                    print '<li><a href="register.php"><i class="fa fa-user-plus top-icon"></i> Sing up</a></li>
                                <li><a href="simple_user_login.php"><i class="fa fa-lock top-icon"></i>Login</a></li>
                                 <li><a href="login.php"><i class="fa fa-lock top-icon"></i>Partner Login</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="logo">
                                <a href="index.php">
                                    <img alt="" src="assets/img/logo/logo.png">
                                </a>
                            </div>
                        </div>
                       
                        <div class="col-lg-9 col-md-8 col-6">
                            <div class="header-bottom-right">
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                            <li class="top-hover "><a href="index.php">home</a>
                                               
                                            </li>
                                            <li><a href="about-us.php">about</a></li>
                                            <li class="mega-menu-position top-hover"><a href="#">Looseleaf</a>
                                                <ul class="mega-menu">
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Tea Type</li>
                                                            <li><a href="shop.php">Black Tea</a></li>
                                                            <li><a href="shop.php">Green Tea</a></li>
                                                            <li><a href="shop.php">White Tea</a></li>
                                                            <li><a href="shop.php">Masala Chai</a></li>
                                                            <li><a href="shop.php">Blends</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Regions</li>
                                                            <li><a href="shop.php">Darjeeling Tea</a></li>
                                                            <li><a href="shop.php">Assam Teas</a></li>
                                                            <li><a href="shop.php">South Indian</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Categories</li>
                                                            <li><a href="shop.php">Caladium</a></li>
                                                            <li><a href="shop.php">Calendula</a></li>
                                                            <li><a href="shop.php">Carnation</a></li>
                                                            <li><a href="shop.php">Catmint</a></li>
                                                            <li><a href="shop.php">Celosia</a></li>
                                                            <li><a href="shop.php">Chives</a></li>
                                                        </ul>
                                                    </li>
                                                    <div class="mega-menu-image">
                                                        <a href="#">
                                                            <img title="Darjeeling  Risheehat China Black Tea " alt="Darjeeling  Risheehat China Black Tea " src="https://www.jayshreetea.com/media/catalog/product/cache/1/image/170x120/9df78eab33525d08d6e5fb8d27136e95/d/j/dj03718-1.jpg">
                                                        </a>
                                                        <p>Darjeeling  Risheehat China Black Tea </p>
                                                        <h6><span class="price">$4.50</span></h6>
                                                    </div>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-position top-hover">
                                                <a href="#">Packet Tea</a>
                                                <ul class="mega-menu">
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Tea Type</li>
                                                            <li><a href="shop.php">Black Tea</a></li>
                                                            <li><a href="shop.php">Green Tea</a></li>
                                                            <li><a href="shop.php">White Tea</a></li>
                                                            <li><a href="shop.php">Masala Chai</a></li>
                                                            <li><a href="shop.php">Blends</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Regions</li>
                                                            <li><a href="shop.php">Darjeeling Tea</a></li>
                                                            <li><a href="shop.php">Assam Teas</a></li>
                                                            <li><a href="shop.php">South Indian</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Categories</li>
                                                            <li><a href="shop.php">Caladium</a></li>
                                                            <li><a href="shop.php">Calendula</a></li>
                                                            <li><a href="shop.php">Carnation</a></li>
                                                            <li><a href="shop.php">Catmint</a></li>
                                                            <li><a href="shop.php">Celosia</a></li>
                                                            <li><a href="shop.php">Chives</a></li>
                                                        </ul>
                                                    </li>
                                                    <div class="mega-menu-image">
                                                        <a href="#">
                                                            <img title="Darjeeling  Risheehat China Black Tea " alt="Darjeeling  Risheehat China Black Tea " src="https://www.jayshreetea.com/media/catalog/product/cache/1/image/170x120/9df78eab33525d08d6e5fb8d27136e95/d/j/dj03718-1.jpg">
                                                        </a>
                                                        <p>Darjeeling  Risheehat China Black Tea </p>
                                                        <h6><span class="price">$4.50</span></h6>
                                                    </div>
                                                </ul>
                                            </li>
                                             <li><a href="wholesale.html">Wholesale</a></li>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                
								<div class="header-currency">
									<span class="digit">USD <i class="ti-angle-down"></i></span>
									<div class="dollar-submenu">
										<ul>
											<li><a href="#">$ USD</a></li>
											<li><a href="#">€ EUR</a></li>
											<li><a href="#">£ GBP</a></li>
											<li><a href="#">₹ INR</a></li>
											<li><a href="#">¥ JPY</a></li>
										</ul>
									</div>
								</div>
                                <div class="header-cart">
                                    <a href="#">
                                        <div class="cart-icon">
                                            <i class="ti-shopping-cart"></i>
                                        </div>
                                    </a>
                                    <div class="shopping-cart-content" >
                                        <ul>
                                            <li class="single-shopping-cart" style="border-bottom: 1px solid #ebebeb;">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="assets/img/cart/cart-1.jpg"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Phantom Remote </a></h4>
                                                    <h6>Qty: 02</h6>
                                                    <span>$260.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ion ion-close"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart" style="border-bottom: 1px solid #ebebeb;">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="assets/img/cart/cart-2.jpg"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Phantom Remote</a></h4>
                                                    <h6>Qty: 02</h6>
                                                    <span>$260.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ion ion-close"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-total">
                                            <h4>Shipping : <span>$20.00</span></h4>
                                            <h4>Total : <span class="shop-total">$260.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            <a href="cart-page.php">view cart</a>
                                            <a href="checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-cart">
                                    <a href="#">
                                        <div class="cart-icon">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                    </a>
                                    <div class="shopping-cart-content" style="width: 200px;">
                                        <ul>
                                            <?php
                                                if (isset($_SESSION['email']) && isset( $_SESSION['user_id']) && isset( $_SESSION['user_type']) &&  $_SESSION['user_type'] == 4) {
                                                   print '<li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="my-account.php">My Account</a></h4>
                                                </div>
                                            </li>';
                                                }
                                            ?>
                                            
                                             <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="cart-page.php">View Cart</a></h4>
                                                </div>
                                            </li>
                                             <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Our Team</a></h4>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Blog</a></h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li class="top-hover"><a href="index.html">home</a>
                                </li>
                                <li><a href="about-us.html">about</a></li>
                                <li class="mega-menu-position top-hover"><a href="shop.php">Looseleaf</a>
                                    <ul class="mega-menu">
                                        <li>
                                            <ul>
                                                <li class="mega-menu-title">Tea Type</li>
                                                <li><a href="shop.php">Black Tea</a></li>
                                                <li><a href="shop.php">Green Tea</a></li>
                                                <li><a href="shop.php">White Tea</a></li>
                                                <li><a href="shop.php">Masala Chai</a></li>
                                                <li><a href="shop.php">Blends</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="mega-menu-title">Regions</li>
                                                <li><a href="shop.php">Darjeeling Tea</a></li>
                                                <li><a href="shop.php">Assam Teas</a></li>
                                                <li><a href="shop.php">South Indian</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="mega-menu-title">Categories</li>
                                                <li><a href="shop.php">Caladium</a></li>
                                                <li><a href="shop.php">Calendula</a></li>
                                                <li><a href="shop.php">Carnation</a></li>
                                                <li><a href="shop.php">Catmint</a></li>
                                                <li><a href="shop.php">Celosia</a></li>
                                                <li><a href="shop.php">Chives</a></li>
                                            </ul>
                                        </li>
                                        <div class="mega-menu-image">
                                            <a href="#">
                                                <img title="Darjeeling  Risheehat China Black Tea " alt="Darjeeling  Risheehat China Black Tea " src="https://www.jayshreetea.com/media/catalog/product/cache/1/image/170x120/9df78eab33525d08d6e5fb8d27136e95/d/j/dj03718-1.jpg">
                                            </a>
                                            <p>Darjeeling  Risheehat China Black Tea </p>
                                            <h6><span class="price">$4.50</span></h6>
                                        </div>
                                    </ul>
                                </li>

                                <li class="mega-menu-position top-hover"><a href="shop.php">Packet Tea</a>
                                    <ul class="mega-menu">
                                        <li>
                                            <ul>
                                                <li class="mega-menu-title">Tea Type</li>
                                                <li>
                                                    <a href="shop.php">Black Tea</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php">Green Tea</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php">White Tea</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php">Masala Chai</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php">Blends</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="mega-menu-title">Regions</li>
                                                <li><a href="shop.php">Darjeeling Tea</a></li>
                                                <li><a href="shop.php">Assam Teas</a></li>
                                                <li><a href="shop.php">South Indian</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="mega-menu-title">Categories</li>
                                                <li><a href="shop.php">Caladium</a></li>
                                                <li><a href="shop.php">Calendula</a></li>
                                                <li><a href="shop.php">Carnation</a></li>
                                                <li><a href="shop.php">Catmint</a></li>
                                                <li><a href="shop.php">Celosia</a></li>
                                                <li><a href="shop.php">Chives</a></li>
                                            </ul>
                                        </li>
                                        <div class="mega-menu-image">
                                            <a href="#">
                                                <img title="Darjeeling  Risheehat China Black Tea " alt="Darjeeling  Risheehat China Black Tea " src="https://www.jayshreetea.com/media/catalog/product/cache/1/image/170x120/9df78eab33525d08d6e5fb8d27136e95/d/j/dj03718-1.jpg">
                                            </a>
                                            <p>Darjeeling  Risheehat China Black Tea </p>
                                            <h6><span class="price">$4.50</span></h6>
                                        </div>
                                    </ul>
                                </li>
                                <li><a href="Wholesale">Wholesale</a></li>
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
		<!-- header end -->
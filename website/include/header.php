<?php 
$session = session_start(); 
include_once "../backend/admin/databaseConnection/connection.php";


function categoriesView($connection){
    $sql = "SELECT * FROM `category` WHERE `status`='1'";
    if ($res = $connection->query($sql)) {
       while ($cat = $res->fetch_assoc()) {
          print '<li><a href="shop.php?cat_id='.$cat['category_id'].'&prod_avail=1">'.$cat['name'].'</a></li>';
       }
    }else{
        return false;
    }
}

function categoriesView1($connection){
    $sql = "SELECT * FROM `category` WHERE `status`='1'";
    if ($res = $connection->query($sql)) {
       while ($cat = $res->fetch_assoc()) {
          print '<li><a href="shop.php?id='.$cat['category_id'].'&prod_avail=2">'.$cat['name'].'</a></li>';
       }
    }else{
        return false;
    }
}

function regionsView($connection){
    $sql = "SELECT * FROM `region` WHERE `status`='1'";
    if ($res = $connection->query($sql)) {
       while ($reg = $res->fetch_assoc()) {
          print '<li><a href="shop.php?id='.$reg['region_id'].'&prod_avail=1">'.$reg['name'].'</a></li>';
       }
    }else{
        return false;
    }
}

function regionsView2($connection){
    $sql = "SELECT * FROM `region` WHERE `status`='1'";
    if ($res = $connection->query($sql)) {
       while ($reg = $res->fetch_assoc()) {
          print '<li><a href="shop.php?id='.$reg['region_id'].'&prod_avail=2">'.$reg['name'].'</a></li>';
       }
    }else{
        return false;
    }
}

function typesView($connection){
    $sql = "SELECT * FROM `type` WHERE `status`='1'";
    if ($res = $connection->query($sql)) {
       while ($type = $res->fetch_assoc()) {
        $flag = false;
        if (!empty($_SESSION['type'])) {
            foreach ($_SESSION['type'] as $key => $value) {
                if ($key == $type['type_id']) {
                     print '<li><input type="checkbox" onclick = "getTypeData('.$type['type_id'].')" value="'.$type['type_id'].'" id="'.$type['type_id'].'" checked>'.$type['name'].'</li>';     
                     $flag = true;                       # code...
                }
            }
        }
        if (!$flag) {
             print '<li><input type="checkbox" onclick = "getTypeData('.$type['type_id'].')" value="'.$type['type_id'].'" id="'.$type['type_id'].'">'.$type['name'].'</li>';
        }
       }
    }else{
        return false;
    }
}
?>
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
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> 
		
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
                                   print '<li><a href="user_login_system/user_logout.php"><i class="fa fa-power-off top-icon"></i>Logout</a></li>';
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
                                                            <li class="mega-menu-title">CATEGORIES</li>
                                                            <?php 
                                                            categoriesView1($connection)
                                                            ?>
                                                            <!-- <li><a href="shop.php">Black Tea</a></li>
                                                            <li><a href="shop.php">Green Tea</a></li>
                                                            <li><a href="shop.php">White Tea</a></li>
                                                            <li><a href="shop.php">Masala Chai</a></li>
                                                            <li><a href="shop.php">Blends</a></li> -->
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Regions</li>
                                                            <?php
                                                            regionsView($connection)
                                                            ?>
                                                            <!-- <li><a href="shop.php">Darjeeling Tea</a></li>
                                                            <li><a href="shop.php">Assam Teas</a></li>
                                                            <li><a href="shop.php">South Indian</a></li> -->
                                                        </ul>
                                                    </li>
                                                    <!-- <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Categories</li>
                                                            <li><a href="shop.php">Caladium</a></li>
                                                            <li><a href="shop.php">Calendula</a></li>
                                                            <li><a href="shop.php">Carnation</a></li>
                                                            <li><a href="shop.php">Catmint</a></li>
                                                            <li><a href="shop.php">Celosia</a></li>
                                                            <li><a href="shop.php">Chives</a></li>
                                                        </ul>
                                                    </li> -->
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
                                                            <li class="mega-menu-title">CATEGORIES</li>
                                                            <?php 
                                                                categoriesView($connection)
                                                            ?>
                                                            <!-- <li><a href="shop.php">Black Tea</a></li>
                                                            <li><a href="shop.php">Green Tea</a></li>
                                                            <li><a href="shop.php">White Tea</a></li>
                                                            <li><a href="shop.php">Masala Chai</a></li>
                                                            <li><a href="shop.php">Blends</a></li> -->
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Regions</li>
                                                            <?php
                                                            regionsView($connection)
                                                            ?>
                                                            <!-- <li><a href="shop.php">Darjeeling Tea</a></li>
                                                            <li><a href="shop.php">Assam Teas</a></li>
                                                            <li><a href="shop.php">South Indian</a></li> -->
                                                        </ul>
                                                    </li>
                                                <!--     <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Categories</li>
                                                            <li><a href="shop.php">Caladium</a></li>
                                                            <li><a href="shop.php">Calendula</a></li>
                                                            <li><a href="shop.php">Carnation</a></li>
                                                            <li><a href="shop.php">Catmint</a></li>
                                                            <li><a href="shop.php">Celosia</a></li>
                                                            <li><a href="shop.php">Chives</a></li>
                                                        </ul>
                                                    </li> -->
                                                    <div class="mega-menu-image">
                                                        <a href="#">
                                                            <img title="Darjeeling  Risheehat China Black Tea " alt="Darjeeling  Risheehat China Black Tea " src="https://www.jayshreetea.com/media/catalog/product/cache/1/image/170x120/9df78eab33525d08d6e5fb8d27136e95/d/j/dj03718-1.jpg">
                                                        </a>
                                                        <p>Darjeeling  Risheehat China Black Tea </p>
                                                        <h6><span class="price">$4.50</span></h6>
                                                    </div>
                                                </ul>
                                            </li>
                                             <li><a href="wholesale.php">Wholesale</a></li>
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
                                        <?php
                                        $sub_total_cart = 0;
                                            if (!empty($_SESSION['cart'])) {
                                                foreach($_SESSION['cart'] as $product_id=>$value){
                                                    $sql_product = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
                                                    if ($product_res = $connection->query( $sql_product)) {
                                                        $product = $product_res->fetch_assoc();
                                                    print '<ul>
                                                        <li class="single-shopping-cart" style="border-bottom: 1px solid #ebebeb;">
                                                            <div class="shopping-cart-img">
                                                                <a href="#"><img alt="" src="../backend/uploads/product_image/'.$product['product_main_image'].'" height="50"></a>
                                                            </div>
                                                            <div class="shopping-cart-title">
                                                                <h4><a href="#">'.$product['title'].' </a></h4>
                                                                <h6>'.$value['quantity'].'</h6>
                                                                <span><i class="fa fa-rupee"></i>'.$product['rate'].'</span>
                                                            </div>
                                                            <div class="shopping-cart-delete">
                                                                <a href="backend/cart/remove_from_cart.php?pid='.$product_id.'&qtty=1&page=index"><i class="ion ion-close"></i></a>
                                                            </div>
                                                        </li>
                                                    </ul>';
                                                    $sub_total_cart = $sub_total_cart +$product['rate'];
                                                    }
                                                }
                                                
                                            }elseif (!empty($_SESSION['user_id'])){
                                                $sql_cart_view = "SELECT * FROM `shopping_cart` WHERE `user_id`='$_SESSION[user_id]'";
                                                if ($cart_res = $connection->query($sql_cart_view)) {
                                                    while($cart = $cart_res->fetch_assoc()){

                                                    $sql_product_cart = "SELECT * FROM `products` WHERE `product_id`='$cart[product_id]'";
                                                    if ($res_product = $connection->query($sql_product_cart)) {
                                                        $product_cart = $res_product->fetch_assoc();
                                                        print '<ul>
                                                        <li class="single-shopping-cart" style="border-bottom: 1px solid #ebebeb;">
                                                            <div class="shopping-cart-img">
                                                                <a href="#"><img alt="" src="../backend/uploads/product_image/'.$product_cart['product_main_image'].'" height="50"></a>
                                                            </div>
                                                            <div class="shopping-cart-title">
                                                                <h4><a href="#">'.$product_cart['title'].' </a></h4>
                                                                <h6>'.$cart['quantity'].'</h6>
                                                                <span><i class="fa fa-rupee"></i>'.$product_cart['rate'].'</span>
                                                            </div>
                                                            <div class="shopping-cart-delete">
                                                                <a href="backend/cart/remove_from_cart.php?pid='.$cart['product_id'].'&qtty=1&page=index"><i class="ion ion-close"></i></a>
                                                            </div>
                                                        </li>
                                                    </ul>';
                                                    $sub_total_cart = $sub_total_cart +$product_cart['rate'];
                                                    }

                                                }
                                            }
                                        }

                                        ?>
                                        
                                        <div class="shopping-cart-total">
                                            <h4>Shipping : <span><i class="fa fa-rupee"></i>20.00</span></h4>
                                            <h4>Total : <span class="shop-total"><i class="fa fa-rupee"></i><?php echo $sub_total_cart; ?></span></h4>
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

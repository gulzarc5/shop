<?php include "include/header.php"; ?>
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-4 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>WISHLIST</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Wishlist </li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
         <!-- shopping-cart-area start -->
        <div class="cart-main-area ptb-100">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive wishlist">
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>Add To Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="assets/img/cart/cart-3.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="#">Dutchman's Breeches</a></td>
                                            <td class="product-price-cart"><span class="amount">$260.00</span></td>
                                            <td class="product-quantity">
                                                <div class="pro-dec-cart">
                                                    <input class="cart-plus-minus-box" type="text" value="02" name="qtybutton">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">$110.00</td>
                                            <td class="product-wishlist-cart">
                                                <a href="#">add to cart</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="assets/img/cart/cart-4.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="#">Flowers Bouquet Pink	</a></td>
                                            <td class="product-price-cart"><span class="amount">$150.00</span></td>
                                            <td class="product-quantity">
                                                <div class="pro-dec-cart">
                                                    <input class="cart-plus-minus-box" type="text" value="02" name="qtybutton">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">$150.00</td>
                                            <td class="product-wishlist-cart">
                                                <a href="#">add to cart</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="assets/img/cart/cart-5.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="#">Evergreen Candytuft </a></td>
                                            <td class="product-price-cart"><span class="amount">$170.00</span></td>
                                            <td class="product-quantity">
                                                <div class="pro-dec-cart">
                                                    <input class="cart-plus-minus-box" type="text" value="02" name="qtybutton">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">$170.00</td>
                                            <td class="product-wishlist-cart">
                                                <a href="#">add to cart</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php include "include/footer.php"; ?>
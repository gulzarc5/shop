<?php include "include/header.php" ?>
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-10 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>CART PAGE</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Cart page</li>
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
<!--                         <form action="#"> -->
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Product Size</th>
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sub_total_cart = 0;
                                            $total_cart_session = 0;
                                            if (!empty($_SESSION['cart'])) {
                                                $count = 501;
                                                foreach($_SESSION['cart'] as $product_id=>$value){
                                                    $sql_product = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
                                                    if ($product_res = $connection->query( $sql_product)) {
                                                        $product = $product_res->fetch_assoc();
                                                        
                                                    print '<form action="backend/cart/update_shopping_cart.php" method="post" id="'.$count.'"><tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img alt="" src="../backend/uploads/product_image/'.$product['product_main_image'].'" height="50"></a>
                                            </td><td class="product-name"><a href="#" style="color:black;">'.$product['title'].'</a></td>';
                                            $sql_product_size="SELECT * FROM `product_sizes` WHERE `product_size_id`='$value[size_id]'";
                                            if ($res_product_size = $connection->query($sql_product_size)) {
                                                $product_size = $res_product_size->fetch_assoc();
                                                // print_r($)

                                                print '<td class="product-size"><a href="#" style="color:black;">'.$product_size['size'].'</a></td>
                                            <td class="product-price-cart"><span class="amount"><i class="fa fa-rupee"></i>'.$product_size['rate'].'.00</span></td>';
                                                $total_cart_session = $total_cart_session +($product_size['rate'] * $value['quantity']);
                                                        $sub_total_cart_session = $product_size['rate'] * $value['quantity'];
                                            }
                                            print ' <td class="product-quantity">
                                                <div class="pro-dec-cart">
                                            <input type="hidden" name="product_id" value="'.$product_id.'">
                                        
                                                    <input class="cart-plus-minus-box" type="text" value="'.$value['quantity'].'" name="quantity">
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><i class="fa fa-rupee"></i>'.$sub_total_cart_session.'</td>
                                            <td class="product-remove">
                                            <a href="javascript:get('.$count.')"><i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="backend/cart/remove_from_cart.php?pid='.$product_id.'&qtty='.$value['quantity'].'&page=cart"><i class="fa fa-times"></i></a>
                                           </td>
                                        </tr>
                                        </form>
                                        ';
                                                    }
                                                    $count++;
                                                }
                                        }elseif(!empty($_SESSION['user_id'])){
                                             $sql_cart_view = "SELECT * FROM `shopping_cart` WHERE `user_id`='$_SESSION[user_id]'";
                                                if ($cart_res = $connection->query($sql_cart_view)) {
                                                    $count = 101;
                                                    $total_cart = 0;
                                                    while($cart = $cart_res->fetch_assoc()){

                                                    $sql_product_cart = "SELECT * FROM `products` WHERE `product_id`='$cart[product_id]'";
                                                    if ($res_product = $connection->query($sql_product_cart)) {
                                                        $product_cart = $res_product->fetch_assoc();
                                                        
                                                    print '<form action="backend/cart/update_shopping_cart.php" method="post" id="'.$count.'"><tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img alt="" src="../backend/uploads/product_image/'.$product_cart['product_main_image'].'" height="50"></a>
                                            </td>
                                            <td class="product-name"><a href="#" style="color:black;">'.$product_cart['title'].'</a></td>';
                                             $sql_product_size="SELECT * FROM `product_sizes` WHERE `product_size_id`='$cart[product_size_id]'";
                                            if ($res_product_size = $connection->query($sql_product_size)) {
                                                $product_size = $res_product_size->fetch_assoc();
                                               print '<td class="product-size"><a href="#" style="color:black;">'.$product_size['size'].'</a></td>
                                            <td class="product-price-cart"><span class="amount"><i class="fa fa-rupee"></i>'.$product_size['rate'].'.00</span></td>';

                                                $total_cart = $total_cart +($product_size['rate'] * $cart['quantity']);
                                                $sub_total_cart = $product_size['rate'] * $cart['quantity'];
                                            }

                                           print '<td class="product-quantity">
                                                <div class="pro-dec-cart">
                                            <input type="hidden" name="product_id" value="'.$cart['product_id'].'">                                 
                                            <input class="cart-plus-minus-box" type="text" value="'.$cart['quantity'].'" name="quantity">
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><i class="fa fa-rupee"></i>'.$sub_total_cart.'</td>
                                            <td class="product-remove">

                                            <a href="javascript:get('.$count.')"><i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                            </a>

                                            <a href="backend/cart/remove_from_cart.php?pid='.$cart['product_id'].'&qtty='.$cart['quantity'].'&page=cart"><i class="fa fa-times"></i>
                                            </a>

                                           </td>
                                        </tr>
                                        </form>
                                        '; 
                                                    }
                                                    $count++;
                                                }
                                            }
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <!-- <button>Update Shopping Cart</button> -->

                                            <a href="#">Clear Shopping Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </form> -->
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                               <!--  <div class="cart-tax">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                    </div>
                                    <div class="tax-wrapper">
                                        <p>Enter your destination to get a shipping estimate.</p>
                                        <div class="tax-select-wrapper">
                                            <div class="tax-select">
                                                <label>
                                                    * Country
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    * Region / State
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    * Zip/Postal Code
                                                </label>
                                                <input type="text">
                                            </div>
                                            <button class="cart-btn-2" type="submit">Get A Quote</button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- <div class="discount-code-wrapper">
                                    <div class="title-wrap">
                                       <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4> 
                                    </div>
                                    <div class="discount-code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <form>
                                            <input type="text" required="" name="name">
                                            <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>Total Price <span><i class="fa fa-rupee"></i> <?php 
                                    if (!empty($_SESSION['user_id'])) {
                                        echo $total_cart; 
                                    }elseif (!empty($_SESSION['cart'])) {
                                       echo $total_cart_session; 
                                    }
                                    
                                    ?></span></h5>
                                  <!--   <div class="total-shipping">
                                        <h5>Total shipping</h5>
                                        <ul>
                                            <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                            <li><input type="checkbox"> Express <span>$30.00</span></li>
                                        </ul>
                                    </div> -->
                                    <h5>Added GST 5% <span>
                                        <i class="fa fa-rupee"></i> 
                                        <?php
                                        if (!empty($_SESSION['user_id'])) {
                                             $gst = ($total_cart/100)*5;
                                            echo $gst;  
                                        }elseif (!empty($_SESSION['cart'])) {
                                            $gst = ($total_cart_session/100)*5;
                                           echo $gst; 
                                        }
                                       
                                        ?>.00</span></h5>
                                    <h4 class="grand-totall-title">Grand Total  <span><?php
                                        if (!empty($_SESSION['user_id'])) {
                                            $grandtotal =$total_cart+$gst;
                                            echo $grandtotal;  
                                        }elseif (!empty($_SESSION['cart'])) {
                                           $grandtotal =$total_cart_session+$gst;
                                            echo $grandtotal; 
                                        } 
                                        ?>.00</span></h4>
                                    <a href="#">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer style Start -->
<?php include "include/footer.php" ?>

<script type="text/javascript">
    function get(name){
        $("#"+name).submit();
        alert(name);
    }
</script>
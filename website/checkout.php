<?php include "include/header.php"; 

    $database_cart_count = 0;
    if (!empty($_SESSION['user_id'])) {
       $sql_cart_count = "SELECT * FROM `shopping_cart` WHERE `user_id`='$_SESSION[user_id]'";
        if ($cart_res_database = $connection->query($sql_cart_count)){
            $database_cart_count = $cart_res_database->num_rows;
        }
    }
    if (!empty($_SESSION['cart']) || $database_cart_count > 0){
         


 function shippingAddress($connection,$session){
    $sql_fetch_address = "SELECT * FROM `shipping_info` WHERE `user_id`='$_SESSION[user_id]' ORDER BY `shipping_info_id` DESC";
    if ($res_shipping_address = $connection->query($sql_fetch_address)) {
        $row_count = $res_shipping_address->num_rows;
        if ($row_count > 0) {
            $count = 1;
            while($shipping_address = $res_shipping_address->fetch_assoc()){

                 print ' <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center" ">
                        <div class="entries-info">
                        <div id="'.$shipping_address['shipping_info_id'].'">
                            <p style="line-height:5px;"><b>'.$shipping_address['f_name'].' '.$shipping_address['l_name'].'</b></p>
                            <p style="line-height:5px;">'.$shipping_address['address'].'</p>
                            <p style="line-height:5px;"> '.$shipping_address['city'].' </p>
                            <p style="line-height:5px;"> '.$shipping_address['state'].'</p>
                            <p style="line-height:5px;">'.$shipping_address['pin'].'</p>
                            <p style="line-height:5px;">'.$shipping_address['email'].'</p>
                            <p style="line-height:5px;">'.$shipping_address['mobile'].'</p>
                            </div>
                            <br>';
                if ($count == 1) {
                    print '<div class="entries-edit-delete text-center">
                            <input type="radio" value="'.$shipping_address['shipping_info_id'].'" name="shipping_address" checked>
                        </div>';
                }else{
                    print '<div class="entries-edit-delete text-center">
                            <input type="radio" value="'.$shipping_address['shipping_info_id'].'" name="shipping_address">
                        </div>';
                }
                        
                 print   '</div>
                </div>';
                $count++;
            }
        }
    }
 }

?>
<style>
    .inputRed{
        border:1px solid red;
    }
</style>
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>CHECKOUT</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">CHECKOUT</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-80 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="checkout-wrapper">
                            <!--////////////////////// Hidden Fields///////////////////// -->
<!-- ///////////////////If user not registered then This Checkout Form Will Open //////////// -->
                            <div id="faq" class="panel-group">

                                <?php if (empty($_SESSION['user_id'])) { ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1.</span> <a class="" id="checkout_method" data-toggle="collapse" data-parent="#faq" href="#payment-1">Checkout method</a></h5>
                                    </div>
                                    <div id="payment-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="checkout-register">
                                                        <div class="title-wrap">
                                                            <h4 class="cart-bottom-title section-bg-white">CHECKOUT AS A GUEST OR REGISTER</h4>
                                                        </div>
                                                        <div class="register-us">
                                                            <ul>
                                                                <li><input name="checkout_method_guest" type="checkbox"> Checkout as Guest</li>
                                                                <li><input type="checkbox" name="checkout_method_register" > Register</li>
                                                            </ul>
                                                        </div>
                                                        <div id="error_checkout_method">
                                                            
                                                        </div>
                                                       
                                                        <h6>REGISTER AND SAVE TIME!</h6>
                                                        <div class="register-us-2">
                                                            <p>Register with us for future convenience.</p>
                                                            <ul>
                                                                <li>Fast and easy checkout</li>
                                                                <li>Easy access to your order history and status</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="checkout-login">
                                                        <div class="title-wrap">
                                                            <h4 class="cart-bottom-title section-bg-white">LOGIN</h4>
                                                        </div>
                                                        <p>Already have an account? </p>
                                                        <span>Please log in below:</span>
                                                        <form>
                                                            <div class="login-form">
                                                                <label>Email Address * </label>
                                                                <input type="email" name="email">
                                                            </div>
                                                            <div class="login-form">
                                                                <label>Password *</label>
                                                                <input type="password" name="email">
                                                            </div>
                                                        </form>
                                                        <div class="login-forget">
                                                            <a href="#">Forgot your password?</a>
                                                            <p>* Required Fields</p>
                                                        </div>
                                                        <div class="checkout-login-btn">
                                                            <a href="#">Login</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-btn">
                                            <button type="link" id="checkout_method_button">Continue</button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="shippng_billing">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><span>2.</span> <a id="billinginfo"  data-parent="#faq" href="#payment-2" >billing information</a></h5>
                                        </div>
                                        <div id="payment-2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="billing-information-wrapper">
                                                    <div id="ship_to_diff">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>First Name</label>
                                                                <input type="text" name="billing_fname">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Last Name</label>
                                                                <input type="text" name="billing_lname">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Company</label>
                                                                <input type="text" name="billing_company">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Email Address</label>
                                                                <input type="email" name="billing_email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Address</label>
                                                                <input type="text" name="billing_address">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>State/Province</label>
                                                                <input type="text" name="billing_state">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>city</label>
                                                                <input type="text" name="billing_city">
                                                            </div>
                                                        </div>                                         
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Zip/Postal Code</label>
                                                                <input type="text" name="billing_pin">
                                                            </div>
                                                        </div>
                                                     <!--    <div class="col-lg-6 col-md-6">
                                                            <div class="billing-select">
                                                                <label>Country</label>
                                                                <select>
                                                                    <option value="1">United State</option>
                                                                    <option value="2">Azerbaijan</option>
                                                                    <option value="3">Bahamas</option>
                                                                    <option value="4">Bahrain</option>
                                                                    <option value="5">Bangladesh</option>
                                                                    <option value="6">Barbados</option>
                                                                </select>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Mobile</label>
                                                                <input type="text" name="billing_mobile">
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Fax</label>
                                                                <input type="text">
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    <div class="ship-wrapper">
                                                        <div class="single-ship">
                                                            <input type="radio" value="1" checked="" name="shiping_billing">
                                                            <label>Ship to this address</label>
                                                        </div>
                                                        <div class="single-ship">
                                                            <input type="radio" name="shiping_billing" value="2" id="ship_to_different_address">
                                                            <label>Ship to different address</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                       <!--  <div class="billing-back">
                                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                        </div> -->
                                                        <div class="billing-btn">
                                                            <button type="submit" id="billing_info_button">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                               <!--  <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>4.</span> <a class="no-collapsable" data-toggle="collapse" data-parent="#faq" href="#payment-4">Shipping method</a></h5>
                                    </div>
                                    <div id="payment-4" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <div class="shipping-method-wrapper">
                                                <div class="shipping-method">
                                                    <p>Flat Rate</p>
                                                    <p>Fixed $40.00</p>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>6.</span> <a class="no-collapsable" id="order_review" data-parent="#faq" href="#payment-6">Order Review</a></h5>
                                    </div>
                                    <div id="payment-6" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="order-review-wrapper">
                                                <div class="order-review">
                                                     <div class="table-responsive">
                                                        <table class="table">
                                                            <caption style="caption-side: top; color:#007bff;">Shipping Information</caption>
                                                           <tbody>
                                                                <tr>
                                                                    <th class="width-1" id="shipping_review"></th>
                                                                    
                                                                </tr>
                                                                

                                                          </tbody>
                                                      </table>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <caption style="caption-side: top; color:#007bff;">Products Information</caption>
                                                            <thead>
                                                                <tr>
                                                                    <th class="width-1">Product Name</th>
                                                                    <th class="width-1">Product Brand</th>
                                                                    <th class="width-1">Product Code</th>
                                                                    <th class="width-1">Inhouse Code</th>
                                                                    <th class="width-1">Product Size</th>
                                                                    <th class="width-2">Price</th>
                                                                    <th class="width-3">Qty</th>
                                                                    <th class="width-4">Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
        <?php
            if (!empty($_SESSION['user_id']) && $_SESSION['user_type'] == 4) {
                                                                # code...
            }elseif (!empty($_SESSION['cart'])) {
                $sub_total_cart = 0;
                $total_cart_session = 0;
                $count = 501;
                foreach($_SESSION['cart'] as $product_id=>$value){
                    $sql_product = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
                    if ($product_res = $connection->query( $sql_product)) {
                    $product = $product_res->fetch_assoc();
                        print '<tr>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['title'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['brand_name'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['product_code'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['inhouse_code'].'</p>
                                    </div>
                                </td>';
                                $sql_product_size="SELECT * FROM `product_sizes` WHERE `product_size_id`='$value[size_id]'";
                                if ($res_product_size = $connection->query($sql_product_size)) {
                                    $product_size = $res_product_size->fetch_assoc();
                                    print '<td>
                                    <div class="o-pro-dec">
                                        <p>'.$product_size['size'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product_size['rate'].'.00</p>
                                    </div>
                                </td>';
                                $sub_total_cart = $value['quantity']*$product_size['rate'];
                                }else{
                                     print '<td>
                                    <div class="o-pro-dec">
                                        <p>-</p>
                                    </div>
                                </td><td>
                                    <div class="o-pro-dec">
                                        <p>-</p>
                                    </div>
                                </td';
                                }
                                
                             print '<td>
                                    <div class="o-pro-dec">
                                        <p>'.$value['quantity'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$sub_total_cart.'.00</p>
                                    </div>
                                </td>
                                </tr>';
                                $total_cart_session = $total_cart_session+$sub_total_cart;
                    }
                }
            }else{
                print '<td class="width-1" colspan="8"><center>Your Cart is Empty</center></td>';
            }
        ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="5">Subtotal </td>
                                                                    <td colspan="1"><?php 
                                                                    if (!empty($total_cart_session)) {
                                                                         echo $total_cart_session.".00"; 
                                                                    }
                                                                   ?></td>
                                                                </tr>
                                                                <tr class="tr-f">
                                                                    <td colspan="5">GST @ 5%</td>
                                                                    <td colspan="1"><?php
                                                                    if (!empty($total_cart_session)) {
                                                                       $gst =($total_cart_session*5)/100;
                                                                    echo $gst.".00";
                                                                    }
                                                                    
                                                                     ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5">Grand Total</td>
                                                                    <td colspan="1"><?php 
                                                                    if (!empty($total_cart_session)) {
                                                                       echo $gst+$total_cart_session.".00";
                                                                    }
                                                                    
                                                                    ?></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <span>
                                                            Forgot an Item?
                                                            <a href="#"> Edit Your Cart.</a>

                                                        </span>
                                                        <div class="billing-btn">
                                                            <button type="submit" id="order_review_button">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>5.</span> <a id="payment_informaation" class="no-collapsable" data-parent="#faq" href="#payment-5">payment information</a></h5>
                                    </div>
                                    <div id="payment-5" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="payment-info-wrapper">
                                                <div class="ship-wrapper" id="payment_div">
                                                    <div class="single-ship">
                                                        <input type="radio"  value="1" name="payment_type">
                                                        <label>Cash on Delivery</label>
                                                    </div>
                                                    <div class="single-ship">
                                                        <input type="radio"  value="2" name="payment_type">
                                                        <label>Online</label>
                                                    </div>
                                                </div>
                                                <!-- <div class="payment-info">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Name on Card </label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-select">
                                                                <label>Credit Card Type</label>
                                                                <select>
                                                                    <option>American Express</option>
                                                                    <option>Visa</option>
                                                                    <option>MasterCard</option>
                                                                    <option>Discover</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Credit Card Number </label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="expiration-date">
                                                        <label>Expiration Date </label>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="billing-select">
                                                                    <select>
                                                                        <option>Month</option>
                                                                        <option>January</option>
                                                                        <option>February</option>
                                                                        <option> March</option>
                                                                        <option>April</option>
                                                                        <option> May</option>
                                                                        <option>June</option>
                                                                        <option>July</option>
                                                                        <option>August</option>
                                                                        <option>September</option>
                                                                        <option> October</option>
                                                                        <option> November</option>
                                                                        <option> December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="billing-select">
                                                                    <select>
                                                                        <option>Year</option>
                                                                        <option>2015</option>
                                                                        <option>2016</option>
                                                                        <option>2017</option>
                                                                        <option>2018</option>
                                                                        <option>2019</option>
                                                                        <option>2020</option>
                                                                        <option>2021</option>
                                                                        <option>2022</option>
                                                                        <option>2023</option>
                                                                        <option>2024</option>
                                                                        <option>2025</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Card Verification Number</label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit" id="final_order">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <?php
                                }elseif(!empty($_SESSION['user_id']) && $_SESSION['user_type']== 4){
                            ?>
<!-- ///////////////////If user logged in then This Checkout Form Will Open //////////// -->
                        <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1.</span> <a class="" id="checkout_method"  data-parent="#faq" href="#payment-1">Checkout method</a></h5>
                                    </div>
                                   <!--  <div id="payment-1" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="checkout-register">
                                                        <div class="title-wrap">
                                                            <h4 class="cart-bottom-title section-bg-white">CHECKOUT AS A GUEST OR REGISTER</h4>
                                                        </div>
                                                        <div class="register-us">
                                                            <ul>
                                                                <li><input name="checkout_method_guest" type="checkbox"> Checkout as Guest</li>
                                                                <li><input type="checkbox" name="checkout_method_register" > Register</li>
                                                            </ul>
                                                        </div>
                                                        <div id="error_checkout_method">
                                                            
                                                        </div>
                                                       
                                                        <h6>REGISTER AND SAVE TIME!</h6>
                                                        <div class="register-us-2">
                                                            <p>Register with us for future convenience.</p>
                                                            <ul>
                                                                <li>Fast and easy checkout</li>
                                                                <li>Easy access to your order history and status</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="checkout-login">
                                                        <div class="title-wrap">
                                                            <h4 class="cart-bottom-title section-bg-white">LOGIN</h4>
                                                        </div>
                                                        <p>Already have an account? </p>
                                                        <span>Please log in below:</span>
                                                        <form>
                                                            <div class="login-form">
                                                                <label>Email Address * </label>
                                                                <input type="email" name="email">
                                                            </div>
                                                            <div class="login-form">
                                                                <label>Password *</label>
                                                                <input type="password" name="email">
                                                            </div>
                                                        </form>
                                                        <div class="login-forget">
                                                            <a href="#">Forgot your password?</a>
                                                            <p>* Required Fields</p>
                                                        </div>
                                                        <div class="checkout-login-btn">
                                                            <a href="#">Login</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-btn">
                                            <button type="link" id="checkout_method_button">Continue</button>
                                        </div>
                                    </div> -->
                                    
                                </div>
                                <div id="shippng_billing">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><span>2.</span> <a id="billinginfo" data-toggle="collapse" data-parent="#faq" href="#payment-2" >Shipping information</a></h5>
                                        </div>
                                        <div id="payment-2" class="panel-collapse collapse show">
                                            <div class="panel-body">
                                                <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Address Book Entries</h4>
                                                </div>
                                                <div class="entries-wrapper" id="add_address">
                                                    <div class="row">
                                                        <?php
                                                        shippingAddress($connection,$session);
                                                        ?>
                                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="entries-info text-center">
                                                                <div class="entries-edit-delete text-center">
                                                                    <button class="btn btn-success" id="add_new_address">Add New Address</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                        
                                                </div>
                                                <!-- Billingi address -->
                                                <div class="billing-information-wrapper" id="new_billing_info">
                                                    
                                                </div>
                                        <!------------- billing info--------------- -->
                                                <div class="billing-btn">
                                                    <button type="submit" id="shippinfo_info_button">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                               <!--  <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>4.</span> <a class="no-collapsable" data-toggle="collapse" data-parent="#faq" href="#payment-4">Shipping method</a></h5>
                                    </div>
                                    <div id="payment-4" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <div class="shipping-method-wrapper">
                                                <div class="shipping-method">
                                                    <p>Flat Rate</p>
                                                    <p>Fixed $40.00</p>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>6.</span> <a class="no-collapsable" id="order_review" data-parent="#faq" href="#payment-6">Order Review</a></h5>
                                    </div>
                                    <div id="payment-6" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="order-review-wrapper">
                                                <div class="order-review">
                                                     <div class="table-responsive">
                                                        <table class="table">
                                                            <caption style="caption-side: top; color:#007bff;">Shipping Information</caption>
                                                           <tbody>
                                                                <tr>
                                                                    <th class="width-1" id="shipping_review">czxcc</th>
                                                                 
                                                                </tr>
                                                                

                                                          </tbody>
                                                      </table>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <caption style="caption-side: top; color:#007bff;">Products Information</caption>
                                                            <thead>
                                                                <tr>
                                                                    <th class="width-1">Product Name</th>
                                                                    <th class="width-1">Product Brand</th>
                                                                    <th class="width-1">Product Code</th>
                                                                    <th class="width-1">Inhouse Code</th>
                                                                    <th class="width-1">Product Size</th>
                                                                    <th class="width-2">Price</th>
                                                                    <th class="width-3">Qty</th>
                                                                    <th class="width-4">Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
        <?php
            if (!empty($_SESSION['user_id']) && $_SESSION['user_type'] == 4) {
               $sql_cart_product = "SELECT * FROM `shopping_cart` WHERE `user_id`='$_SESSION[user_id]'";
               if ($res_cart = $connection->query($sql_cart_product)) {
                $total_cart_session = 0;
                   while($cart = $res_cart->fetch_assoc()){
                        $sql_product = "SELECT * FROM `products` WHERE `product_id`='$cart[product_id]'";
                        if ($product_res = $connection->query( $sql_product)) {
                            $product = $product_res->fetch_assoc();
                            print '<tr>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['title'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['brand_name'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['product_code'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['inhouse_code'].'</p>
                                    </div>
                                </td>';
                                $sql_product_size="SELECT * FROM `product_sizes` WHERE `product_size_id`='$cart[product_size_id]'";
                                if ($res_product_size = $connection->query($sql_product_size)) {
                                    $product_size = $res_product_size->fetch_assoc();
                                    print '<td>
                                    <div class="o-pro-dec">
                                        <p>'.$product_size['size'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product_size['rate'].'.00</p>
                                    </div>
                                </td>';
                                $sub_total_cart = $cart['quantity']*$product_size['rate'];
                                }else{
                                     print '<td>
                                    <div class="o-pro-dec">
                                        <p>-</p>
                                    </div>
                                </td><td>
                                    <div class="o-pro-dec">
                                        <p>-</p>
                                    </div>
                                </td';
                                }
                                
                             print '<td>
                                    <div class="o-pro-dec">
                                        <p>'.$cart['quantity'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$sub_total_cart.'.00</p>
                                    </div>
                                </td>
                                </tr>';
                                $total_cart_session = $total_cart_session+$sub_total_cart;
                        }
                   }
               }
            }elseif (!empty($_SESSION['cart'])) {
                $sub_total_cart = 0;
                $total_cart_session = 0;
                $count = 501;
                foreach($_SESSION['cart'] as $product_id=>$value){
                    $sql_product = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
                    if ($product_res = $connection->query( $sql_product)) {
                    $product = $product_res->fetch_assoc();
                        print '<tr>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['title'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['brand_name'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['product_code'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product['inhouse_code'].'</p>
                                    </div>
                                </td>';
                                $sql_product_size="SELECT * FROM `product_sizes` WHERE `product_size_id`='$value[size_id]'";
                                if ($res_product_size = $connection->query($sql_product_size)) {
                                    $product_size = $res_product_size->fetch_assoc();
                                    print '<td>
                                    <div class="o-pro-dec">
                                        <p>'.$product_size['size'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$product_size['rate'].'.00</p>
                                    </div>
                                </td>';
                                $sub_total_cart = $value['quantity']*$product_size['rate'];
                                }else{
                                     print '<td>
                                    <div class="o-pro-dec">
                                        <p>-</p>
                                    </div>
                                </td><td>
                                    <div class="o-pro-dec">
                                        <p>-</p>
                                    </div>
                                </td';
                                }
                                
                             print '<td>
                                    <div class="o-pro-dec">
                                        <p>'.$value['quantity'].'</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="o-pro-dec">
                                        <p>'.$sub_total_cart.'.00</p>
                                    </div>
                                </td>
                                </tr>';
                                $total_cart_session = $total_cart_session+$sub_total_cart;
                    }
                }
            }else{
                print '<td class="width-1" colspan="8"><center>Your Cart is Empty</center></td>';
            }
        ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="5">Subtotal </td>
                                                                    <td colspan="1"><?php 
                                                                    if (!empty($total_cart_session)) {
                                                                         echo $total_cart_session.".00"; 
                                                                    }
                                                                   ?></td>
                                                                </tr>
                                                                <tr class="tr-f">
                                                                    <td colspan="5">GST @ 5%</td>
                                                                    <td colspan="1"><?php
                                                                    if (!empty($total_cart_session)) {
                                                                       $gst =($total_cart_session*5)/100;
                                                                    echo $gst.".00";
                                                                    }
                                                                    
                                                                     ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5">Grand Total</td>
                                                                    <td colspan="1"><?php 
                                                                    if (!empty($total_cart_session)) {
                                                                       echo $gst+$total_cart_session.".00";
                                                                    }
                                                                    
                                                                    ?></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <span>
                                                            Forgot an Item?
                                                            <a href="#"> Edit Your Cart.</a>

                                                        </span>
                                                        <div class="billing-btn">
                                                            <button type="submit" id="order_review_button">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>5.</span> <a id="payment_informaation" class="no-collapsable" data-parent="#faq" href="#payment-5">payment information</a></h5>
                                    </div>
                                    <div id="payment-5" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="payment-info-wrapper">
                                                <div class="ship-wrapper" id="payment_div">
                                                    <div class="single-ship">
                                                        <input type="radio"  value="1" name="payment_type">
                                                        <label>Cash on Delivery</label>
                                                    </div>
                                                    <div class="single-ship">
                                                        <input type="radio"  value="2" name="payment_type">
                                                        <label>Online</label>
                                                    </div>
                                                </div>
                                                <!-- <div class="payment-info">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Name on Card </label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-select">
                                                                <label>Credit Card Type</label>
                                                                <select>
                                                                    <option>American Express</option>
                                                                    <option>Visa</option>
                                                                    <option>MasterCard</option>
                                                                    <option>Discover</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Credit Card Number </label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="expiration-date">
                                                        <label>Expiration Date </label>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="billing-select">
                                                                    <select>
                                                                        <option>Month</option>
                                                                        <option>January</option>
                                                                        <option>February</option>
                                                                        <option> March</option>
                                                                        <option>April</option>
                                                                        <option> May</option>
                                                                        <option>June</option>
                                                                        <option>July</option>
                                                                        <option>August</option>
                                                                        <option>September</option>
                                                                        <option> October</option>
                                                                        <option> November</option>
                                                                        <option> December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="billing-select">
                                                                    <select>
                                                                        <option>Year</option>
                                                                        <option>2015</option>
                                                                        <option>2016</option>
                                                                        <option>2017</option>
                                                                        <option>2018</option>
                                                                        <option>2019</option>
                                                                        <option>2020</option>
                                                                        <option>2021</option>
                                                                        <option>2022</option>
                                                                        <option>2023</option>
                                                                        <option>2024</option>
                                                                        <option>2025</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Card Verification Number</label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit" id="final_order">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="checkout-progress">
                            <h4>Checkout Progress</h4>
                            <ul>
                                <li>Billing Address</li>
                                <li>Shipping Address</li>
                                <li>Shipping Method</li>
                                <li>Payment Method</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- Footer style Start -->
<?php include "include/footer.php" ?>


<?php
    if (!empty($_SESSION['user_id'])) {
?>
        <script src="assets/js/checkout_login.js"></script>

<?php
    }else{
?>
     <script src="assets/js/checkout.js"></script>

<?php
    }

        }else{
            echo "<script>window.location.href ='cart-page.php';</script>";
        }
?>

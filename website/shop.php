<?php
    include "include/header.php";

    function productsView($connection,$cat_id,$product_avail){
        $html = null;
        $sql_product = "SELECT * FROM `products` WHERE `product_avail`='$product_avail' AND `category_id`='$cat_id'";
        $count = 1;
        $html=null;
        $product_thumb_count = 1000;
        $product_thumb_count1 = 1000;
        if ($res_product = $connection->query($sql_product)) {
            while($product = $res_product->fetch_assoc()){

             print '<div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img alt="" src="../backend/uploads/product_image/'.$product['product_main_image'].'">
                            </a>
                            <!-- <span>-30%</span> -->
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
                                    <i class="ion-android-favorite-outline"></i>
                                </a>
                                <a class="action-cart" href="#" title="Add To Cart">
                                    <i class="ion-ios-shuffle-strong"></i>
                                </a>
                                <a class="action-compare" href="#" data-target="#exampleModal'.$count.'" data-toggle="modal" title="Quick View" id="'.$product['product_id'].'">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content text-left">
                            <div class="product-hover-style">
                                <div class="product-title">
                                    <h4>
                                        <a href="product-details.html">'.$product['title'].'</a>
                                    </h4>
                                </div>';
                                $sql_product_size_id ="SELECT * FROM `product_sizes` WHERE `product_id`='$product[product_id]' AND `rate`='$product[rate]'";
                                        $product_size_id = null ;
                                        $min_order_quantity_log = 1;
                                        if ($res_product_size_id = $connection->query($sql_product_size_id)) {
                                            $product_sizes = $res_product_size_id->fetch_assoc();
                                            $product_size_id = $product_sizes['product_size_id'];
                                             $min_order_quantity_log = $product_sizes['min_order'];
                                        }
                                print'<div class="cart-hover">
                                    <h4><a href="backend/cart/add_to_cart.php?product_id='.$product['product_id'].'&quantity='.$min_order_quantity_log.'&product_size='.$product_size_id.'">+ Add to cart</a></h4>
                                </div>
                            </div>
                            <div class="product-price-wrapper">
                                <span><i class="fa fa-rupee"></i> '.$product['rate'].'.00</span>
                                //<span class="product-price-old">$120.00 </span>
                            </div>
                        </div>
                        <div class="product-list-details">
                            <h4>
                                <a href="product-details.html">'.$product['title'].'</a>
                            </h4>
                            <div class="product-price-wrapper">
                                <span>'.$product['rate'].'</span>
                                // <span class="product-price-old">$120.00 </span>
                            </div>
                            <p>'.$product['description'].'</p>
                            <div class="shop-list-cart-wishlist">
                                <a href="#" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                <a href="backend/cart/add_to_cart.php?product_id='.$product['product_id'].'&quantity='.$min_order_quantity_log.'&product_size='.$product_size_id.'" title="Add To Cart"><i class="ion-ios-shuffle-strong"></i></a>
                                <a href="#" data-target="#exampleModal'.$count.'" data-toggle="modal" title="Quick View" id="'.$product['product_id'].'">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>';

                $html = $html.'<div class="modal fade exampleModal" id="exampleModal'.$count.'" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="tab-content">
                                    <div id="pro-'.$count.'" class="tab-pane fade show active">
                                        <img src="../backend/uploads/product_image/'.$product['product_main_image'].'" alt="">
                                    </div>';
                                $sql_product_image = "SELECT * FROM `product_image` WHERE `product_id`='$product[product_id]'";
                                if ($res_product_image = $connection->query($sql_product_image)) {
                                    while ($product_images = $res_product_image->fetch_assoc()) {
                                       $html = $html.'<div id="pro-'.$product_thumb_count.'" class="tab-pane fade">
                                        <img src="../backend/uploads/product_image/'.$product_images['image_name'].'" alt="">
                                    </div>';
                                    $product_thumb_count++;
                                    }
                                }
                                
                                $html = $html.'</div>
                                <div class="product-thumbnail">
                                    <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                    <a class="active" data-toggle="tab" href="#pro-'.$count.'"><img src="../backend/uploads/product_image/'.$product['product_main_image'].'" alt=""></a>';
                                    $sql_product_image_thumb = "SELECT * FROM `product_image` WHERE `product_id`='$product[product_id]'";
                                    if ($res_product_image_thumb = $connection->query($sql_product_image_thumb)) {
                                        while ($product_images_thumb = $res_product_image_thumb->fetch_assoc()) {
                                           $html = $html.'<a class="active" data-toggle="tab" href="#pro-'.$product_thumb_count1.'"><img src="../backend/uploads/product_image/'.$product_images_thumb['image_name'].'" alt=""></a>';
                                        $product_thumb_count1++;
                                        }
                                    }
                                $html = $html.'</div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="modal-pro-content">
                                    <h3>'.$product['title'].'</h3>
                                    <div class="product-price-wrapper" id="model_id-'.$count.'">
                                        <span><i class="fa fa-rupee"></i> '.$product['rate'].'.00</span>
                                    </div>
                                    <p>'.$product['description'].'</p>    
                                    <form action="backend/cart/add_to_cart.php" method="GET">
                                    <div class="quick-view-select">
                                        <div class="select-option-part">
                                            <label>Size*</label>
                                            <select id="select_size-'.$count.'" name="product_size" class="select" onchange="getValueSelect(this.id)" required>';
                                            $sql_product_size ="SELECT product_sizes.product_size_id as size_id, product_sizes.rate as rate,product_sizes.min_order as min_order, product_sizes.size as size, `weight_type`.name as weight FROM `product_sizes` inner join weight_type WHERE product_sizes.weight_type_id=weight_type.weight_type_id AND `product_id`='$product[product_id]'";
                                            $min_order_quantity=0;
                                            if ($res_product_size = $connection->query($sql_product_size)) {
                                                while($products_size = $res_product_size->fetch_assoc()){
                                                    if ($product['rate'] == $products_size['rate']) {
                                                         $html = $html.'<option value="'.$products_size['size_id'].'" selected>'.$products_size['size'].'-'.$products_size['weight'].'</option>' ;
                                                         $min_order_quantity = $products_size['min_order'];
                                                    }else{
                                                         $html = $html.'<option value="'.$products_size['size_id'].'">'.$products_size['size'].'-'.$products_size['weight'].'</option>' ;
                                                    }
                                                 
                                                }
                                            }
                                         $html = $html.'
                                            </select>
                                            <span id ="min_order_qtty-'.$count.'"> Min Order Quantity -  '.$min_order_quantity.'</span>
                                        </div>
                                    </div>
                                    <div class="product-quantity">
                                        <div class="cart-plus-minus" id ="min-order_value-'.$count.'">
                                            <input class="cart-plus-minus-box" type="text" name="quantity" value="'.$min_order_quantity.'">
                                        </div>
                                        <input type="hidden" name="product_id" value="'.$product['product_id'].'">
                                        <input type="hidden" name="page" value="1">
                                        <button type="submit">Add to cart</button>
                                    </div>
                                    </form>
                                    <span><i class="fa fa-check"></i> In stock</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>';


                $count++;
            }
        }
        return $html;
    }

    ?>
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h3>SHOP PAGE</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">SHOP PAGE</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
        <!-- Shop Page Area Start -->
        <div class="shop-page-area ptb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">
                            <div class="shop-topbar-left">
                                <ul class="view-mode">
                                    <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                                    <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                                </ul>
                                <p>Showing 1 - 20 of 30 results  </p>
                            </div>
                            <div class="product-sorting-wrapper">
                                <div class="product-shorting shorting-style">
                                    <label>View:</label>
                                    <select>
                                        <option value=""> 20</option>
                                        <option value=""> 23</option>
                                        <option value=""> 30</option>
                                    </select>
                                </div>
                                <div class="product-show shorting-style">
                                    <label>Sort by:</label>
                                    <select>
                                        <option value="">Default</option>
                                        <option value=""> Name</option>
                                        <option value=""> price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row">
                                    <?php
                                    $html = null;
                                    if ($_GET['id'] && $_GET['prod_avail']) {
                                        $cat_id = $_GET['id'];
                                        $product_avail = $_GET['prod_avail'];
                                        $html = productsView($connection,$cat_id,$product_avail);
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="pagination-total-pages">
                                <div class="pagination-style">
                                    <ul>
                                        <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">10</a></li>
                                        <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
                                    </ul>
                                </div>
                                <div class="total-pages">
                                    <p>Showing 1 - 20 of 30 results  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Shop By Categories</h4>
                                <div class="shop-catigory">
                                    <ul id="faq">
                                        <?php
                                        categoriesView($connection)

                                        ?>
                                       <!--  <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-1">Morning Tea <i class="ion-ios-arrow-down"></i></a>
                                            <ul id="shop-catigory-1" class="panel-collapse collapse show">
                                                <li><a href="#">Green</a></li>
                                                <li><a href="#">Herbal</a></li>
                                                <li><a href="#">Loose </a></li>
                                                <li><a href="#">Mate</a></li>
                                                <li><a href="#">Organic</a></li>
                                            </ul>
                                        </li>
                                        <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-2">Tea Trends<i class="ion-ios-arrow-down"></i></a>
                                            <ul id="shop-catigory-2" class="panel-collapse collapse">
                                                <li><a href="#">Pu'Erh</a></li>
                                                <li><a href="#">Black</a></li>
                                                <li><a href="#">White</a></li>
                                                <li><a href="#">Yellow Tea</a></li>
                                                <li><a href="#">Puer Tea</a></li>
                                            </ul>
                                        </li>
                                        <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-3">Most Tea Map <i class="ion-ios-arrow-down"></i></a>
                                            <ul id="shop-catigory-3" class="panel-collapse collapse">
                                                <li><a href="#">Green Tea</a></li>
                                                <li><a href="#">Oolong Tea</a></li>
                                                <li><a href="#">Black Tea</a></li>
                                                <li><a href="#">Pu'erh Tea </a></li>
                                                <li><a href="#">Dark Tea</a></li>
                                            </ul>
                                        </li> -->
                                        <!-- <li> <a href="#">Herbal Tea</a> </li>
                                        <li> <a href="#">Rooibos Tea</a></li>
                                        <li> <a href="#">Organic Tea</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">Price Filter</h4>
                                <div class="price_filter mt-25">
                                    <span>Range:  $100.00 - 1.300.00 </span>
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                        </div>
                                        <button type="button">Filter</button> 
                                    </div>
                                </div>
                            </div>
                            <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">By Type</h4>
                                <div class="sidebar-list-style mt-20">
                                    <ul>
                                        <?php
                                        typesView($connection);
                                        ?>
                                       <!--  <li><input type="checkbox"><a href="#">Green </a>
                                        <li><input type="checkbox"><a href="#">Herbal </a></li>
                                        <li><input type="checkbox"><a href="#">Loose </a></li>
                                        <li><input type="checkbox"><a href="#">Mate </a></li>
                                        <li><input type="checkbox"><a href="#">Organic </a></li>
                                        <li><input type="checkbox"><a href="#">White  </a></li>
                                        <li><input type="checkbox"><a href="#">Yellow Tea </a></li>
                                        <li><input type="checkbox"><a href="#">Puer Tea </a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">By Color</h4>
                                <div class="sidebar-list-style mt-20">
                                    <ul>
                                        <li><input type="checkbox"><a href="#">Black </a></li>
                                        <li><input type="checkbox"><a href="#">Blue </a></li>
                                        <li><input type="checkbox"><a href="#">Green </a></li>
                                        <li><input type="checkbox"><a href="#">Grey </a></li>
                                        <li><input type="checkbox"><a href="#">Red</a></li>
                                        <li><input type="checkbox"><a href="#">White  </a></li>
                                        <li><input type="checkbox"><a href="#">Yellow   </a></li>
                                    </ul>
                                </div>
                            </div> -->
                          <!--   <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">Compare Products</h4>
                                <div class="compare-product">
                                    <p>You have no item to compare. </p>
                                    <div class="compare-product-btn">
                                        <span>Clear all </span>
                                        <a href="#">Compare <i class="fa fa-check"></i></a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">Popular Tags</h4>
                                <div class="shop-tags mt-25">
                                    <ul>
                                        <li><a href="#">Green</a></li>
                                        <li><a href="#">Oolong</a></li>
                                        <li><a href="#">Black</a></li>
                                        <li><a href="#">Pu'erh</a></li>
                                        <li><a href="#">Dark </a></li>
                                        <li><a href="#">Special</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Page Area End -->
 <?php include "include/footer.php"; ?>
<script type="text/javascript">
    function getValueSelect(id){
        var added_id = id.split('-');
        var product_size_id = $("#"+id).val();
        // alert(product_size_id);
       

        $.ajax({
        type: "POST",
        url: "ajax/product_size_fetch.php",
        data:{product_size_id : product_size_id},
        success: function(data){
            var pro_size = JSON.parse(data);
            console.log(pro_size.product_id);
            var html_min_order = '<input class="cart-plus-minus-box" type="text" name="quantity" value="'+pro_size.min_order+'">';
            var min_order_qtty = 'Min Order Quantity -  '+pro_size.min_order;
            var html = "<span><i class='fa fa-rupee'></i> "+pro_size.rate+" </span>";
            // $("#suggesstion-box").show();
            $("#min-order_value-"+added_id[1]).html(html_min_order);
            $("#min_order_qtty-"+added_id[1]).html(min_order_qtty);
            $("#model_id-"+added_id[1]).html(html);
            // $("#trnto").css("background","#FFF");
        }
        });
    }
</script>
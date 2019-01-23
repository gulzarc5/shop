<?php
require_once('partials/header.php');
include_once "..\admin\databaseConnection\connection.php";
?>

<!--///////////////////////// Main Info Section /////////////////////////////-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Whole Seller Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--///////////////////////// Main Info Section End /////////////////////////////-->

<div class="content mt-3">

    <!--///////////////////////// Deshboard Card Section /////////////////////////////-->
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">
                        <?php
                        $sql_total_product_count = "SELECT COUNT(*) as total FROM `products` WHERE `created_by_id`='$_SESSION[user_id]' AND `sale_type`='2'";
                        if ($res_total_product_count = $connection->query($sql_total_product_count)) {
                            $total_product_count_row = $res_total_product_count->fetch_assoc();
                            if ($total_product_count_row['total'] > 0) {
                                echo $total_product_count_row['total'];
                            }else{
                                echo '0';
                            }
                        }
                        ?>
                    </span>
                </h4>
                <p class="text-light">Total Products</p>                   
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">
                        <?php
                        $sql_total_delivered_count = "SELECT COUNT(*) as total FROM `order_details` WHERE `order_to_id`='$_SESSION[user_id]' AND `status`='3'";
                        if ($res_total_delivered_count = $connection->query($sql_total_delivered_count)) {
                            $total_delivered_count_row = $res_total_delivered_count->fetch_assoc();
                            if ($total_delivered_count_row['total'] > 0) {
                                echo $total_delivered_count_row['total'];
                            }else{
                                echo '0';
                            }
                        }
                        ?>
                    </span>
                </h4>
                <p class="text-light">Total Delivered Products</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">
                        <?php
                        $sql_total_delivered_count = "SELECT COUNT(*) as total FROM `order_details` WHERE `order_to_id`='$_SESSION[user_id]' AND `status`='1'";
                        if ($res_total_delivered_count = $connection->query($sql_total_delivered_count)) {
                            $total_delivered_count_row = $res_total_delivered_count->fetch_assoc();
                            if ($total_delivered_count_row['total'] > 0) {
                                echo $total_delivered_count_row['total'];
                            }else{
                                echo '0';
                            }
                        }
                        ?>
                    </span>
                </h4>
                <p class="text-light">Total Pending Orders</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">
                        <?php
                        $sql_total_delivered_count = "SELECT COUNT(*) as total FROM `order_details` WHERE `order_to_id`='$_SESSION[user_id]' AND `status`='3'";
                        if ($res_total_delivered_count = $connection->query($sql_total_delivered_count)) {
                            $total_delivered_count_row = $res_total_delivered_count->fetch_assoc();
                            if ($total_delivered_count_row['total'] > 0) {
                                echo $total_delivered_count_row['total'];
                            }else{
                                echo '0';
                            }
                        }
                        ?>
                    </span>
                </h4>
                <p class="text-light">Dispatched Orders</p>
            </div>
        </div>
    </div>
    <!--///////////////////////// Deshboard Card Section End /////////////////////////////-->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Last 10 Orders</strong>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Order Id</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Product Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Order From User</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    $count = 1;
                                    $sql_orders = "SELECT * FROM `order_details` WHERE `order_to_id` = '$_SESSION[user_id]' AND `status` != '3' ORDER BY `order_details_id` DESC limit 10";
                                    if ($res_orders = $connection->query($sql_orders)) {
                                        while($orders = $res_orders->fetch_assoc()){
                                         print '<tr><td>'.$count.'<input type="hidden" value = "'.$orders['order_details_id'].'" id="order_id'.$count.'"></td>';
                                        
                                        print '<td>'.$orders['order_id'].'</td>';

                                        $sql_product ="SELECT * FROM `products` WHERE `product_id` = '$orders[product_id]'";
                                        if ($res_product = $connection->query($sql_product)) {
                                            $product = $res_product->fetch_assoc();

                                            print '<td>'.$product['product_code'].'</td><td>'.$product['title'].'</td>';
                                        }
                                        $sql_product_size = "SELECT `product_sizes`.`size` as product_size, `weight_type`.`name` as weight FROM `product_sizes` INNER JOIN `weight_type` ON `product_sizes`.`weight_type_id`=`weight_type`.`weight_type_id` WHERE `product_size_id`='$orders[product_size]'";
                                        if ($res_product_size = $connection->query($sql_product_size)) {
                                            $product_size = $res_product_size->fetch_assoc();

                                            print '<td>'.$product_size['product_size'].' / '.$product_size['weight'].'</td>';
                                        }
                                        print '<td>'.$orders['quantity'].'</td>
                                                <td>'.$orders['rate'].'</td>';
                                      
                                             $sql_user_name = "SELECT `first_name`,`middle_name`,`last_name` FROM `users` WHERE `user_id` = '$orders[user_id]'";
                                             if ($res_user = $connection->query($sql_user_name)) {
                                                 $user_row = $res_user->fetch_assoc();
                                                 print'<td>'.$user_row['first_name'].' '.$user_row['middle_name'].' '.$user_row['last_name'].'</td>';
                                             }
                                             if ($orders['status'] == 1) {
                                                 print'<td><button class="btn btn-sm btn-danger" disabled>Pending</button></td>';
                                             }elseif($orders['status'] == 2){
                                                 print'<td>
                                                 <button class="btn btn-sm btn-info" disabled>Dispached</button></td>';
                                             }else{
                                                 print'<td><button class="btn btn-sm btn-success" disabled>Delivered</button></td>';
                                             }
                                        
                                        print '</tr>';
                                        $count++;
                                    }
                                    }
                                ?>
                        </tr>
                            <td colspan="8"></td>
                            <td> <a href="wseller_new_orders.php" class="btn btn-primary btn-sm">show more<i class="fa fa-angle-double-right"></i> </a></td>
                        <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Last 10 Added Products</strong>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Region</th>
                            <th scope="col">Product Type</th>
                            <th scope="col">Product Brand</th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                            $sql ="SELECT * FROM `products` WHERE `created_by_id` = '$_SESSION[user_id]' ORDER BY `product_id` DESC limit 10";
                            if($result=$connection->query($sql)){
                                $count = 1;
                                 while ($row=$result->fetch_assoc()){
                                    print "<tr>
                                    <th scope='row'>$count</th>
                                    <td><img src='../uploads/product_image/$row[product_main_image]' width='100'></td>
                                    <td>$row[title]</td>
                                    <td>";
                                    if (!empty($row['region_id'])) {
                                         $sql_region_name = "SELECT * FROM `region` WHERE `region_id`='$row[region_id]'"; 
                                         if ($result_region_name = $connection->query($sql_region_name)) {
                                             $region_name = $result_region_name->fetch_assoc();
                                             print "$region_name[name]";
                                         }
                                    }
                                    print "</td>
                                    <td>";
                                    $sql_product_type = "SELECT * FROM `type` WHERE `type_id` ='$row[product_type_id]'";
                                    if ($result_product_type = $connection->query($sql_product_type)) {
                                            if ($product_type = $result_product_type->fetch_assoc()) {
                                                print "$product_type[name]";
                                            }
                                        }
                                    print "</td>
                                    <td>$row[brand_name]</td>
                                    </tr>
                                    ";
                                $count++;
                                 }
                            }
                        ?>
                            <td colspan="5"></td>
                            <td> <a href="wseller_product_show.php" class="btn btn-primary btn-sm">show more<i class="fa fa-angle-double-right"></i> </a></td>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    <div class="col-xl-3 col-lg-6">

    </div>
    <div class="col-xl-3 col-lg-6">
    </div>

    <div class="col-xl-3 col-lg-6">
                
    </div>

    <div class="col-xl-6">
    </div>


    </div> <!-- .content -->
    </div><!-- /#right-panel -->

<?php
    require_once('partials/footer.php');
?>

 <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/widgets.js"></script>
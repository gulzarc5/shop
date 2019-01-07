<?php
require_once('partials/header.php');
include_once "../admin/databaseConnection/connection.php";

$sql_orders_view = "SELECT * FROM `order_details` WHERE `order_to_id` = '$_SESSION[user_id]'  AND `retailer_is_viewed` ='1'";
if ($res_orders_view = $connection->query($sql_orders_view)) {
    $res_order_count = $res_orders_view->num_rows;
    if ($res_order_count > 0) {
        $sql_orders_view_update = "UPDATE `order_details` SET `retailer_is_viewed`='2' WHERE `order_to_id`='$_SESSION[user_id]' AND `retailer_is_viewed` = '1'";
        $res_retailer_is_viewed = $connection->query($sql_orders_view_update);
    }
}
?>
<script src="../../assets/datatable/jquery.dataTables.min.css"></script>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Orders</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard/Orders</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--///////////////////// Region Add form Section /////////////////////////-->
<div class="content mt-3">
    <?php
        if (isset($_GET['msg'])) {
            $val = $_GET['msg'];
            if ($val == 1) {
               print "<div class='alert alert-success' role='alert'>Order Updated Successfully</div>";
            }
             if ($val == 2) {
               print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
            }
        }
    ?>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Orders</strong>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style=" overflow: scroll;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Order Id</th>
                                    <th>Product Code</th>
                                    <th>Product Image</th>
                                    <th>Product Size</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Shipping Address</th>
                                    <th>Order From User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    $sql_orders = "SELECT * FROM `order_details` WHERE `order_to_id` = '$_SESSION[user_id]' AND `status` != '3' ORDER BY `order_details_id` DESC";
                                    if ($res_orders = $connection->query($sql_orders)) {
                                        while($orders = $res_orders->fetch_assoc()){
                                         print '<tr><td>'.$count.'<input type="hidden" value = "'.$orders['order_details_id'].'" id="order_id'.$count.'"></td>';
                                        
                                        print '<td>'.$orders['order_id'].'</td>';

                                        $sql_product ="SELECT * FROM `products` WHERE `product_id` = '$orders[product_id]'";
                                        if ($res_product = $connection->query($sql_product)) {
                                            $product = $res_product->fetch_assoc();

                                            print '<td>'.$product['product_code'].'</td><td><img src=../uploads/product_image/'.$product['product_main_image'].' width="100"></td>';
                                        }
                                        $sql_product_size = "SELECT `product_sizes`.`size` as product_size, `weight_type`.`name` as weight FROM `product_sizes` INNER JOIN `weight_type` ON `product_sizes`.`weight_type_id`=`weight_type`.`weight_type_id` WHERE `product_size_id`='$orders[product_size]'";
                                        if ($res_product_size = $connection->query($sql_product_size)) {
                                            $product_size = $res_product_size->fetch_assoc();

                                            print '<td>'.$product_size['product_size'].' / '.$product_size['weight'].'</td>';
                                        }
                                        print '<td>'.$orders['quantity'].'</td>
                                                <td>'.$orders['rate'].'</td>';
                                        $sql_shipping_address = "SELECT * FROM `shipping_info` WHERE `shipping_info_id` ='$orders[shipping_info_id]'";
                                        if ($res_shipping_address = $connection->query($sql_shipping_address)) {
                                            $shipping_address = $res_shipping_address->fetch_assoc();
                                             print '<td>
                                             <p><b>'.$shipping_address['f_name'].' '.$shipping_address['l_name'].'</b></p>
                                             <p >'.$shipping_address['address'].'</p>
                                             <p >'.$shipping_address['city'].','.$shipping_address['state'].'-'.$shipping_address['pin'].'</p>
                                             <p>'.$shipping_address['email'].'</p>
                                             <p>'.$shipping_address['mobile'].'</p>

                                             </td>';
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
                                             if ($orders['status'] == 3) {
                                                 print '<td>
                                                 <select disabled>
                                                    <option value="">Please Update</option>
                                                    <option value="2">Dispatched</option>
                                                    <option value="3" selected>Delivered</option>
                                                 </select>
                                                 </td>';
                                             }else{
                                                print '<td>
                                             <select id="'.$count.'" onchange="updateProduct('.$count.')">
                                                <option value="">Please Update</option>
                                                <option value="2">Dispatched</option>
                                                <option value="3">Delivered</option>
                                             </select>
                                             </td>';
                                             }
                                             
                                             
                                        }
                                        print '</tr>';
                                        $count++;
                                    }
                                    }
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!--///////////////////// Region Add form Section /////////////////////////-->

<?php
    require_once('../partials/footer.php');
?>

 <script src="../../assets/datatable/jquery-3.3.1.js"></script>
 <script src="../../assets/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#region_table').DataTable();
} );
</script>

<script type="text/javascript">
     function updateProduct(id){
        var status = $("#"+id).val();
        var order_id = $("#order_id"+id).val();
        if (status && order_id) {
            window.location.href = "serverScripts/update_order.php?order_id="+order_id+"&status="+status;
        }
     }
</script>
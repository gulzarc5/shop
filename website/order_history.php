<?php
    include "include/header.php"; 

function getOrders($connection){
    $sql = "SELECT * FROM `orders` WHERE `user_id`='$_SESSION[user_id]' ORDER BY `id` DESC";
    $html = null;
    $count = 1;
    if ($res = $connection->query($sql)) {
        while($order = $res->fetch_assoc()){
            print $count ;
            $count++;
            $order_details_sql = "SELECT * FROM `order_details` WHERE `order_id`='$order[id]'";
            $total = 0;
            if ($res_order_details = $connection->query($order_details_sql)) {

                $order_details_row = $res_order_details->num_rows + 3;
                $html =  $html.'<tr>
                            <th scope="row" rowspan="'.$order_details_row.'">'.$order['id'].'</th>';
                while ($order_details = $res_order_details->fetch_assoc()) {

                    $sql_product = "SELECT * FROM `products` WHERE `product_id`='$order_details[product_id]'";
                    $res_product = $connection->query($sql_product);
                    $product = $res_product->fetch_assoc();
                   $html =  $html.'<td>'.$product['title'].'</td>
                            <td>'.$product['brand_name'].'</td>
                            <td>'.$product['product_code'].'</td>
                            <td>'.$product['inhouse_code'].'</td>';
                    $sql_product_size = "SELECT `product_sizes`.`size` as product_size, `weight_type`.`name` as weight FROM `product_sizes` INNER JOIN `weight_type` ON `product_sizes`.`weight_type_id`=`weight_type`.`weight_type_id` WHERE `product_size_id`='$order_details[product_size]'";
                    $res_product_size = $connection->query($sql_product_size);
                    $product_size_name = $res_product_size->fetch_assoc();
                    $html =  $html.'<td>'.$product_size_name['product_size'].' / '.$product_size_name['weight'].'</td>
                            <td>'.$order_details['rate'].'</td>
                            <td>'.$order_details['quantity'].'</td>';
                            $Subtotal = $order_details['rate'] * $order_details['quantity'];
                   $html =  $html.'<td>'.$Subtotal.'</td>';
                    if ($order_details['status'] == 1) {
                      $html =  $html. '<td class="btn btn-sm btn-danger">Pending</td>';
                    }elseif ($order_details['status'] == 2) {
                        $html =  $html. '<td><p class="alert alert-info">Dispatched<p></td>';
                    }else{
                        $html =  $html. '<td><p class="alert alert-success">Delivered<p></td>';
                    }
                   $html =  $html.'</tr>';
                    $total = $total+$Subtotal;
                }
                 $gst = ($total*5)/100;
                $grand_total = $gst + $total;
               $html =  $html. '<tr>
                <td colspan="7"></td>
                <td>Total</td>
                <td>'.$total.'.00</td>
                </tr
                <tr>
                <td colspan="7"></td>
                <td>GST @ 5%</td>
                <td>'.$gst.'.00</td>
                </tr
                <tr>
                <td colspan="7"></td>
                <td>Grand Total</td>
                <td>'.$grand_total.'.00</td>
                </tr>';
            }
           
        }

    }
    return $html;
}
?>
		<!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>Order History</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Order History</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
		<!-- About Us Area Start -->
        <div class="blog-page-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <center><h4>Order History</h4></center>     
                        <table class="table table-sm table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">OrderID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Product Code</th>
                                    <th scope="col">Inhouse Code</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                     echo getOrders($connection); 
                                 } 
                                 ?>
                            </tbody>
                        </table>                              
                                   
                    </div>                    
                </div>
            </div>
        </div>

	
		<!-- Testimonial Area End -->

	
		<!-- Project Area End -->
        <!-- Start Brand Area -->
		<div class="brand-logo-area ptb-100">
			<div class="container">
				<div class="brand-logo-active owl-carousel">
					<div class="single-brand-logo">
						<img alt="" src="assets/img/brand-logo/1.jpg">
					</div>
					<div class="single-brand-logo">
						<img alt="" src="assets/img/brand-logo/2.jpg">
					</div>
					<div class="single-brand-logo">
						<img alt="" src="assets/img/brand-logo/3.jpg">
					</div>
					<div class="single-brand-logo">
						<img alt="" src="assets/img/brand-logo/4.jpg">
					</div>
					<div class="single-brand-logo">
						<img alt="" src="assets/img/brand-logo/5.jpg">
					</div>
					<div class="single-brand-logo">
						<img alt="" src="assets/img/brand-logo/2.jpg">
					</div>
				</div>
			</div>
		</div>
		<!-- End Brand Area -->
<?php include "include/footer.php" ?>
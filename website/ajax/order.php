<?php
session_start();
	include_once "../../backend/admin/databaseConnection/connection.php"; 

if (!empty($_SESSION['user_id']) && $_SESSION['user_type'] ==4) {
	# code...
}elseif(!empty($_SESSION['cart'])){
	$billing_fname = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_fname']));
	$billing_lname = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_lname']));
	$billing_email = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_email']));
	$billing_address = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_address']));
	$billing_state = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_state']));
	$billing_company = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_company']));
	$billing_city = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_city']));
	$billing_pin = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_pin']));
	$billing_mobile = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_mobile']));
	$shiping_billing = $connection->real_escape_string(mysql_entities_fix_string($_POST['shiping_billing']));
	// $checkout_method = $connection->real_escape_string(mysql_entities_fix_string($_POST['checkout_method']));	

	$billing_info_id = null;
	$shipping_info_id = null;

		//////////////////////If Checkout As a Guest User /////////////////////////


			/////////////////////Insert Billing Info
			$sql_billing = "INSERT INTO `billing_info`(`billing_info_id`, `f_name`, `l_name`, `company`, `email`, `state`, `city`, `address`, `pin`, `mobile`, `date`) VALUES (null,'$billing_fname','$billing_lname','$billing_company','$billing_email','$billing_state','$billing_city','$billing_address','$billing_pin','$billing_mobile',date('now'))";
			$res__billing = $connection->query($sql_billing);
			$billing_info_id = $connection->insert_id;
			if ($shiping_billing == 1){
				$sql_shipping = "INSERT INTO `shipping_info`(`shipping_info_id`, `f_name`, `l_name`, `company`, `email`, `state`, `city`, `address`, `pin`, `mobile`, `date`) VALUES (null,'$billing_fname','$billing_lname','$billing_company','$billing_email','$billing_state','$billing_city','$billing_address','$billing_pin','$billing_mobile',date('now'))";
				$res_shipping = $connection->query($sql_shipping);
				$shipping_info_id = $connection->insert_id;
			}elseif ($shiping_billing == 2) {
				$billing_fname = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_fname']));
				$billing_lname = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_lname']));
				$billing_email = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_email']));
				$billing_address = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_address']));
				$billing_state = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_state']));
				$billing_company = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_company']));
				$billing_city = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_city']));
				$billing_pin = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_pin']));
				$billing_mobile = $connection->real_escape_string(mysql_entities_fix_string($_POST['billing_mobile']));
				$shiping_billing = $connection->real_escape_string(mysql_entities_fix_string($_POST['shiping_billing']));
				$sql_shipping = "INSERT INTO `shipping_info`(`shipping_info_id`, `f_name`, `l_name`, `company`, `email`, `state`, `city`, `address`, `pin`, `mobile`, `date`) VALUES (null,'$billing_fname','$billing_lname','$billing_company','$billing_email','$billing_state','$billing_city','$billing_address','$billing_pin','$billing_mobile',date('now'))";
				$res_shipping = $connection->query($sql_shipping);
				$shipping_info_id = $connection->insert_id;
			}
			

			$password = password_hash($billing_mobile, PASSWORD_BCRYPT);
			$user_registration_sql = "INSERT INTO `users`(`user_id`, `organization`, `first_name`, `middle_name`, `last_name`, `designation_id`, `address_id`, `business_code`, `mobile_no`, `email_id`, `trade_licence_number`, `trade_licence_using_authority`, `pan`, `GSTIN`, `GSTIN_category_id`, `membership_id`, `membership_number`, `membership_location`, `IEC_code`, `user_type_id`, `created_at`, `password`) VALUES (null,null,'$billing_fname',null,'$billing_lname',null,null,null,'$billing_mobile','$billing_email',null,null,null,null,null,null,null,null,null,'4',null,'$password')";
			if ($res_registration = $connection->query($user_registration_sql)) {
				$_SESSION['email'] = $billing_email;
                $_SESSION['user_id'] = $connection->insert_id;
                $_SESSION['user_type'] = '4';
                $_SESSION['name'] = $billing_fname." ".$billing_lname;
			}else{
				echo 1;
				return;
			}

			$total_oreder_value =0;
			$total_gst = 0;
			foreach($_SESSION['cart'] as $product_id=>$value){
				$sql_product_size="SELECT * FROM `product_sizes` WHERE `product_size_id`='$value[size_id]'";
				if ($res_product_size = $connection->query($sql_product_size)) {
                    $product_size = $res_product_size->fetch_assoc();
                    $total_oreder_value = $total_oreder_value + $value['quantity']*$product_size['rate'];
                }
			}
			$total_gst = ($total_oreder_value* 5)/100;
			$order_sql = "INSERT INTO `orders`(`id`, `user_id`, `total_value`, `gst_taken`, `date`) VALUES (null,'$_SESSION[user_id]','$total_oreder_value','$total_gst',date('now'))";
			if($order_res = $connection->query($order_sql)){
				$order_id = $connection->insert_id;


				foreach($_SESSION['cart'] as $product_id=>$value){

					$created_by_id_sql = "SELECT `created_by_id` FROM `products` WHERE `product_id`='$product_id'";
					if ($res_created_by_id = $connection->query($created_by_id_sql)) {
						$create_by_id_row = $res_created_by_id->fetch_assoc();
						$created_by_id = $create_by_id_row['created_by_id'];

						$order_details = "INSERT INTO `order_details`(`order_details_id`, `order_id`, `product_id`, `user_id`, `quantity`, `product_size_id`, `billing_info_id`, `shipping_info_id`, `order_to_id`, `date`) VALUES (null,'$order_id','$product_id','$_SESSION[user_id]','$value[quantity]','$value[size_id]','$billing_info_id','$shipping_info_id','$created_by_id',date('now'))";
						if ($res_order_details = $connection->query($order_details)) {
							echo "1";
						}
					}

					
				}
				
			}
		
}


////////////////////// To Check Sql Injection ////////////////////////////////////
function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}

?>
<?php
//Database Connection included
session_start();
	include_once "..\..\admin\databaseConnection\connection.php";

	if ($_POST['update_retailer_product'] && !empty($_POST['update_retailer_product'])){

		$product_id = $_POST['product_id'];
		$product_title = $_POST['product_title']; 
		$description = $_POST['description']; //Not required Field
		$in_house_code = $_POST['in_house_code'];		
		$tea_name = $_POST['tea_name'];		
		$pack_description = $_POST['pack_description']; //Not required field		
		$product_size = $_POST['product_size'];  // array of product sizes		
		$product_size_type = $_POST['product_size_type'];   // array of product size type
		$product_price = $_POST['product_price']; // array of product Price
		$price_currency = $_POST['rate_currency']; // array of product Price Currency
		$min_order = $_POST['min_order']; // array
	

		// $product_image = $_FILES['product_image'];  //array of image
		// $in_house_code = $_POST['in_house_code'];

		// $company_product_code = null;
		// $created_by = $_SESSION['user_id'];

		$sql = "UPDATE `products` SET `title`='$product_title',`description`='$description',`inhouse_code`='$in_house_code',`brand_name`='$tea_name',`pack_description`='$pack_description' WHERE `product_id` = '$product_id' AND `created_by_id`='$_SESSION[user_id]'";
	 if ($result=$connection->query($sql)){
	 	$sql_delete_product_size = "DELETE FROM `product_sizes` WHERE `product_id`='$product_id'";
	 	if ($result_delete_product_size = $connection->query($sql_delete_product_size)) {
	 		
	 		$min_price = $product_price[0];
	 		$min_price_currency = $price_currency[0];
		 	for($i = 0; $i < count($product_size_type); $i++)
		 	{
		 		$product_size_array_data = $product_size[$i];
		 		$product_size_type_array_data = $product_size_type[$i];
		 		$product_price_array_data = $product_price[$i];
		 		$price_currency_array_data = $price_currency[$i];
		 		$min_order_array_data = $min_order[$i];

		 		
		 		//To check minimum price 
		 		if ($min_price > $product_price[$i]) {
		 			$min_price = $product_price[$i];
		 			$min_price_currency = $price_currency[$i];
		 		}

			 	print "<br>".$product_size_array_data;
			 	print "<br>".$product_size_type_array_data;
			 	$sql_product_sizes = "INSERT INTO `product_sizes`(`product_size_id`, `product_id`, `size`, `weight_type_id`,`rate`, `currency_type`,`min_order`) VALUES (null,'$product_id','$product_size_array_data','$product_size_type_array_data','$product_price_array_data','$price_currency_array_data','$min_order_array_data')";
			 	if ($result=$connection->query($sql_product_sizes)) {
			 		$sql_update_display_rate = "UPDATE `products` SET `rate`='$min_price',`rate_currency`='$min_price_currency' WHERE `product_id`='$product_id'";
				 	if ($res_update_display_rate = $connection->query($sql_update_display_rate)) {
				 	}
			 		echo "<br> product size inserted";
			 	}else{
			 		echo "<br> product size  Not inserted";
			 	}
		 	}
	 	}

       
   //     if (isset($product_image)){
   //     		$product_main_image = null;
   //     		for($i = 0; $i < count($product_image['name']); $i++){
   //     			$product_image_name	  = $product_image['name'][$i];
   //     			$product_image_tmp_name = $product_image['tmp_name'][$i];
   //     			$ext_explode = explode(".",$product_image_name);
   //     			$ext = strtolower(end($ext_explode));
   //     			if( $ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif' ){
   //     				$image_name = md5(uniqid()).date('now').".".$ext;
   //     				$path = "../../uploads/product_image/".$image_name ;
   //     				move_uploaded_file($product_image_tmp_name,$path);

   //     				if ($i == 0) {
   //     					$product_main_image = $image_name;
   //     				}

   //     				$sql_product_image ="INSERT INTO `product_image`(`product_image_id`, `product_id`, `image_name`) VALUES (null,'$product_id','$image_name')";
   //     				if ($result=$connection->query($sql_product_image)) {
			// 	 		echo "<br> product_image inserted";
			// 	 	}else{
			// 	 		echo "<br> product_image  Not inserted";
			// 	 	}
   //     			}else{
   //     				echo "please Check Extension";
   //     			}
	 	// 	}

	 	// 	$sql_product_main_image_update = "UPDATE `products` SET `product_main_image`='$product_main_image' WHERE `product_id`='$product_id'";
	 	// 	if (!$result=$connection->query($sql_product_main_image_update)) {
	 	// 		header("location:../add_product_by_retailor_form.php?msg=3");
			// }
   //     }	
       header("location:../wseller_product_list.php?msg=3");
	}else{
	 	header("location:../wseller_product_list.php?msg=2");
	}
}else{
	header("location:../wseller_product_list.php?msg=3");
}

?>
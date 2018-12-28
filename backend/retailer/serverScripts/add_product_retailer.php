<?php
//Database Connection included
session_start();
	include_once "..\..\admin\databaseConnection\connection.php";

	if ($_POST['add_retailer_product'] && !empty($_POST['add_retailer_product'])){

		$product_title = $_POST['product_title']; 
		$description = $_POST['description']; //Not required Field
		$region = $_POST['region'];
		$category = $_POST['category'];
		$type = $_POST['type'];
		$grade_code = $_POST['grade_code'];
		$tea_name = $_POST['tea_name'];
		$pack_description = $_POST['pack_description']; //Not required field
		$product_size = $_POST['product_size'];  // array of product sizes
		$product_size_type = $_POST['product_size_type'];   // array of product size type
		$product_price = $_POST['product_price']; // array of product Price
		$price_currency = $_POST['rate_currency']; // array of product Price Currency
		$min_order = $_POST['min_order'];
		// $weight = $_POST['weight'];
		// $weight_type = $_POST['weight_type'];
		// $rate = $_POST['rate'];
		// // $rate_currency= $_POST['rate_currency'];
		// // $min_order = $_POST['min_order'];
		// $min_order_unit = $_POST['min_order_unit'];
		$product_image = $_FILES['product_image'];  //array of image
		$in_house_code = $_POST['in_house_code'];

		$company_product_code = null;
		$created_by = $_SESSION['user_id'];

		$sql = "INSERT INTO `products`(`product_id`, `title`, `description`, `region_id`,`product_type_id`, `category_id`, `grade_code_id`, `company_product_code`, `inhouse_code`, `product_code`, `brand_name`, `pack_description`, `weight_per_pack_type_id`, `weight_per_pack_unit`, `rate`, `rate_currency`, `min_order_type_id`, `min_order_unit`,`product_main_image`, `created_by_id`, `created_at`) VALUES (null,'$product_title','$description','$region','$type','$category','$grade_code','$company_product_code','$in_house_code',null,'$tea_name','$pack_description',null,null,null,null,null,null,null,'$created_by',null)";
	 if ($result=$connection->query($sql)){
	 	$product_id = $connection->insert_id;
	 	$product_code = "ATNETIN/".$_SESSION['business_code'].$product_id;
	 	$sql_update = "UPDATE `products` SET `product_code`='$product_code' WHERE `product_id`='$product_id'";
	 	if ($result=$connection->query($sql_update)){
	 		echo "inserted";
	 	}else{
	 		echo " Not inserted";
	 	}
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
	 		if ($min_price > $min_order[$i]) {
	 			$min_price = $min_order[$i];
	 			$min_price_currency = $price_currency[$i];
	 		}
		 	print "<br>".$product_size_array_data;
		 	print "<br>".$product_size_type_array_data;
		 	$sql_product_sizes = "INSERT INTO `product_sizes`(`product_size_id`, `product_id`, `size`, `weight_type_id`,`rate`, `currency_type`,`min_order`) VALUES (null,'$product_id','$product_size_array_data','$product_size_type_array_data','$product_price_array_data','$price_currency_array_data','$min_order_array_data')";

		 	if ($result=$connection->query($sql_product_sizes)) {
		 		echo "<br> product size inserted";
		 	}else{
		 		echo "<br> product size  Not inserted";
		 	}
	 	}
	 	$sql_update_display_rate = "UPDATE `products` SET `rate`='$min_price',`rate_currency`='$min_price_currency' WHERE `product_id`='$product_id'";
	 	if ($res_update_display_rate = $connection->query($sql_update_display_rate)) {
	 	}
       
       if (isset($product_image)){
       		$product_main_image = null;
       		for($i = 0; $i < count($product_image['name']); $i++){
       			$product_image_name	  = $product_image['name'][$i];
       			$product_image_tmp_name = $product_image['tmp_name'][$i];
       			$ext_explode = explode(".",$product_image_name);
       			$ext = strtolower(end($ext_explode));
       			if( $ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif' ){
       				$image_name = md5(uniqid()).date('now').".".$ext;
       				$path = "../../uploads/product_image/".$image_name ;
       				move_uploaded_file($product_image_tmp_name,$path);

       				if ($i == 0) {
       					$product_main_image = $image_name;
       				}

       				$sql_product_image ="INSERT INTO `product_image`(`product_image_id`, `product_id`, `image_name`) VALUES (null,'$product_id','$image_name')";
       				if ($result=$connection->query($sql_product_image)) {
				 		echo "<br> product_image inserted";
				 	}else{
				 		echo "<br> product_image  Not inserted";
				 	}
       			}else{
       				echo "please Check Extension";
       			}
	 		}

	 		$sql_product_main_image_update = "UPDATE `products` SET `product_main_image`='$product_main_image' WHERE `product_id`='$product_id'";
	 		if (!$result=$connection->query($sql_product_main_image_update)) {
	 			header("location:../add_product_by_retailor_form.php?msg=3");
			}
       }	
       header("location:../add_product_by_retailor_form.php?msg=4");
	}else{
	 	header("location:../add_product_by_retailor_form.php?msg=2");
	}
}else{
	header("location:../add_product_by_retailor_form.php?msg=1");
}

?>
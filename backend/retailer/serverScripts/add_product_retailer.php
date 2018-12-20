<?php
//Database Connection included
session_start();
	include_once "..\databaseConnection\connection.php";

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
		$weight = $_POST['weight'];
		$weight_type = $_POST['weight_type'];
		$rate = $_POST['rate'];
		$rate_weight_type = $_POST['rate_weight_type'];
		$min_order = $_POST['min_order'];
		$min_order_unit = $_POST['min_order_unit'];
		$product_image = $_POST['product_image']; 
		$in_house_code = $_POST['in_house_code'];

		$company_product_code = null;
		$product_code = "ATNETIN/".$_SESSION['business_code'];

		$sql = "INSERT INTO `products`(`product_id`, `title`, `description`, `region_id`, `category_id`, `grade_code_id`, `company_product_code`, `inhouse_code`, `product_code`, `brand_name`, `pack_description`, `weight_per_pack_type_id`, `weight_per_pack_unit`, `rate_indian`, `rate_usd`, `min_order_type_id`, `min_order_unit`, `created_by_id`, `created_at`) VALUES (null,'$product_title','$description','$region','$category','$grade_code','$company_product_code','$in_house_code',[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19])"
	}

?>
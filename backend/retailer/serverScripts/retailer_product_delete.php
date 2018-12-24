<?php
	include_once "..\..\admin\databaseConnection\connection.php";
	if (!empty($_GET['pd_id'])) {
		$sql = "DELETE FROM `products` WHERE `product_id` = '$_GET[pd_id]'";
		if ($result = $connection->query($sql)) {
			header("location:../retailer_product_show.php?msg=1");
		}else{
			header("location:../retailer_product_show.php?msg=2");
		}
	}else{
		header("location:../retailer_product_show.php?msg=2");
	}	

?>
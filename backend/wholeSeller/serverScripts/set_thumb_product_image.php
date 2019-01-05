<?php
//Database Connection included
session_start();
include_once "..\..\admin\databaseConnection\connection.php";

if (!empty($_GET['product_id']) && !empty($_GET['image_id'])) {
	$sql_fetch_image = "SELECT * FROM `product_image` WHERE `product_image_id`='$_GET[image_id]'";
	if ($res_image = $connection->query($sql_fetch_image)) {
		$image_row = $res_image->fetch_assoc();
		$image_name = $image_row['image_name'];

		$sql_update_main_image = "UPDATE `products` SET `product_main_image`='$image_name' WHERE `product_id`='$_GET[product_id]'";
		if ($res_main = $connection->query($sql_update_main_image)) {
			header("location:../wseller_product_image_edit_form.php?pd_id=".$_GET['product_id']."&msg=1");
		}
	}else{
		header("location:../wseller_product_image_edit_form.php?pd_id=".$_GET['product_id']."&msg=2");
	}
}else{
	header("location:../wseller_product_image_edit_form.php?pd_id=".$_GET['product_id']."&msg=2");
}


?>
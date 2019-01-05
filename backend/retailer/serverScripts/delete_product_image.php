<?php
//Database Connection included
session_start();
include_once "..\..\admin\databaseConnection\connection.php";

if (!empty($_GET['product_id']) && !empty($_GET['image_id'])) {
	$sql_fetch_image = "SELECT * FROM `product_image` WHERE `product_image_id`='$_GET[image_id]'";
	if ($res_image = $connection->query($sql_fetch_image)) {
		$image_row = $res_image->fetch_assoc();
		$image_name = $image_row['image_name'];
		unlink('../../uploads/product_image/'.$image_name.'');

		$sql_delete_image = "DELETE FROM `product_image` WHERE `product_image_id`='$_GET[image_id]'";
		if ($res_delete = $connection->query($sql_delete_image)) {
			header("location:../retailer_product_image_edit_form.php?pd_id=".$_GET['product_id']."&msg=3");
		}
	}else{
		header("location:../retailer_product_image_edit_form.php?pd_id=".$_GET['product_id']."&msg=2");
	}
}else{
	header("location:../retailer_product_image_edit_form.php?pd_id=".$_GET['product_id']."&msg=2");
}


?>
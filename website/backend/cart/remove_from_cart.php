<?php
session_start();
include_once "../../../backend/admin/databaseConnection/connection.php";
$pid=$_GET['pid'];
if (!empty($_SESSION['cart'])) {
	unset($_SESSION['cart'][$pid]);
	if ($_GET['page'] == 'index') {
		header("location:../../index.php");
	}elseif ($_GET['page'] == 'cart') {
		header("location:../../cart-page.php");
	}
	
}else{
	$sql = "DELETE FROM `shopping_cart` WHERE `product_id`='$pid'";
	if ($res = $connection->query($sql)) {
		if ($_GET['page'] == 'index') {
			header("location:../../index.php");
		}elseif ($_GET['page'] == 'cart') {
		header("location:../../cart-page.php");
		}
	}else{
		if ($_GET['page'] == 'index') {
			header("location:../../index.php");
		}elseif ($_GET['page'] == 'cart') {
		header("location:../../cart-page.php");
		}
	}
}


?>
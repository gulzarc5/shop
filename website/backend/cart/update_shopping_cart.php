<?php
session_start();
include_once "../../../backend/admin/databaseConnection/connection.php";
echo $_POST['product_id'];
if (!empty($_SESSION['user_id']) && !empty($_POST['product_id']) && !empty($_POST['quantity'])) {
	echo $_POST['quantity'];
	$sql = "UPDATE `shopping_cart` SET `quantity`='$_POST[quantity]' WHERE `product_id`='$_POST[product_id]' AND `user_id` ='$_SESSION[user_id]'";
	if ($res = $connection->query($sql)) {
		header("location:../../cart-page.php");
	}else{
		header("location:../../cart-page.php");
	}
}elseif (!empty($_SESSION['cart']) && !empty($_POST['product_id']) && !empty($_POST['quantity'])){
	$pid = $_POST['product_id'];
	$qtty = $_POST['quantity'];
	$_SESSION['cart'][$pid]['quantity']=$qtty;
	header("location:../../cart-page.php");
}
else{
	// header("location:../../cart-page.php");
}

// elseif(empty($_SESSION['user_id'] && !empty($_SESSION['cart']))){
// 	$pid=$_GET['pid'];
// 	$_SESSION['cart'][$pid]=$_GET['qtty'];
// }
// header("location:../../cart_page.php");

?>
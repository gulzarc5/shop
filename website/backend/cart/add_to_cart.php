<?php
	include_once "../../../backend/admin/databaseConnection/connection.php";
	session_start();

if (isset($_SESSION['email']) && isset( $_SESSION['user_id']) && isset( $_SESSION['user_type']) &&  $_SESSION['user_type'] == 4){
	$sql_cart_check = "SELECT * FROM `shopping_cart` WHERE `product_id` = '$_GET[product_id]'";
	$product_count = 0 ;
	if ($res_cart_check = $connection->query($sql_cart_check)) {
		$product_count= $res_cart_check->num_rows;
	}
	if ($product_count < 1) {
		$sql = "INSERT INTO `shopping_cart`(`cart_id`, `user_id`, `product_id`, `quantity`,`product_size_id`) VALUES (null,'$_SESSION[user_id]','$_GET[product_id]','$_GET[quantity]','$_GET[product_size]')";
		if ($res = $connection->query($sql)) {
			if (isset($_GET['page']) && $_GET['page']==1) {
				header("Location:../../cart-page.php");
			}else{
				header("Location:../../index.php");
			}
		}else{
			header("Location:../../index.php");
		}
	}else{
		if (isset($_GET['page']) && $_GET['page']==1) {
			header("Location:../../cart-page.php");
		}else{
			header("Location:../../index.php");
		}
	}

}else{
	if(!$_SESSION['cart'])
	{
		$cart=[];
	}
	else
	{
		$cart=$_SESSION['cart'];
	}
	if($_GET['product_id'] && $_GET['quantity']>0 && $_GET['product_size'])
	{
		$product_id = $_GET['product_id'];
		$quantity = $_GET['quantity'];
		$product_size = $_GET['product_size'];
		$cart[$product_id]=array('quantity' => $quantity,'size_id' =>$product_size );
		// echo $product_id;
		
	}
	$_SESSION['cart']=$cart;
	// print_r($_SESSION['cart']);
	if (isset($_GET['page']) && $_GET['page']==1) {
		header("Location:../../cart-page.php");
	}else{
		header("Location:../../index.php");
	}
	
}
	
?>
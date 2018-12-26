<?php
session_start();
$pid=$_GET['pid'];
$_SESSION['cart'][$pid]=$_GET['qtty'];
// header("location:../../cart_page.php");

?>
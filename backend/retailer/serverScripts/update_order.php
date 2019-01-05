<?php
//Database Connection included
session_start();
	include_once "..\..\admin\databaseConnection\connection.php";

	if ($_GET['order_id'] && $_GET['status']) {
		$order_id = $connection->real_escape_string(mysql_entities_fix_string($_GET['order_id']));
		$status = $connection->real_escape_string(mysql_entities_fix_string($_GET['status']));
		
		$sql = "UPDATE `order_details` SET `status`='$status' WHERE `order_details_id`='$order_id'";
		if ($res = $connection->query($sql)) {
			header("location:../retailer_orders.php?msg=1");
		}else{
			header("location:../retailer_orders.php?msg=2");
		}
	}else{
		header("location:../retailer_orders.php?msg=2");
	}


function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}

?>
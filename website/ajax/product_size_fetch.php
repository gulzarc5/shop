<?php
include_once "../../backend/admin/databaseConnection/connection.php"; 
	if ($_POST['product_size_id'] && !empty($_POST['product_size_id'])) {
		$sql = "SELECT * FROM `product_sizes` WHERE `product_size_id`='$_POST[product_size_id]'";
		if ($res = $connection->query($sql)) {
			$row = $res->fetch_assoc();
			echo json_encode($row) ;
		}else{
			echo "query not executed";
		}
	}else{
		echo "data not getting";
	}
?>
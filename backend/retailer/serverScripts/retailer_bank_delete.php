<?php
include_once "..\..\admin\databaseConnection\connection.php";
if (!empty($_GET['id'])) {
    $sql = "DELETE FROM `user_bank_details` WHERE `user_bank_id` = '$_GET[id]'";
    if ($result=$connection->query($sql)){
    	header("location:../retailer_bank_detail_show.php?msg=6");
    }
}else{
	header("location:../retailer_bank_detail_show.php?msg=5");
}
?>
<?php
include_once "..\..\admin\databaseConnection\connection.php";
if ($_POST['update_retailer_bank'] && !empty($_POST['update_retailer_bank'])){
	$bank_name = $_POST['bank_name'];
	$branch_address = $_POST['branch_address'];
	$ifsc = $_POST['ifsc'];
	$micr = $_POST['micr'];
	$bank_id = $_POST['bank_id'];
	$sql = "UPDATE `user_bank_details` SET `name_of_bank`='$bank_name',`branch_address`='$branch_address',`ifsc`='$ifsc',`micr`='$micr' WHERE `user_bank_id` = '$bank_id'";
	if ($result=$connection->query($sql)) {
		header("location:../retailer_bank_detail_show.php?msg=4");
	}else{
		header("location:../retailer_bank_detail_show.php?msg=5");
	}
}else{
		header("location:../retailer_bank_detail_show.php?msg=5");
	}
?>
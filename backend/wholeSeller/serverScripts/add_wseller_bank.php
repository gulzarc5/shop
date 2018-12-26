<?php
//Database Connection included
	session_start();
	include_once "..\..\admin\databaseConnection\connection.php";

	if ($_POST['add_retailer_bank'] && !empty($_POST['add_retailer_bank'])){
		$bank_name = $_POST['bank_name'];
		$branch_address = $_POST['branch_address'];
		$ifsc = $_POST['ifsc'];
		$micr = $_POST['micr'];
		$user_id = $_SESSION['user_id'];
		$sql = "INSERT INTO `user_bank_details`(`user_bank_id`, `user_id`, `name_of_bank`, `branch_address`, `ifsc`, `micr`) VALUES (null,'$user_id','$bank_name','$branch_address','$ifsc' ,'$micr')";
		if ($result=$connection->query($sql)){
			header("location:../wseller_bank_detail_show.php?msg=2");
		}else{
			header("location:../wseller_bank_detail_show.php?msg=3");
		}
		
	}else{
		header("location:../wseller_bank_detail_show.php?msg=1");
	}

?>
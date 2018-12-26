<?php
	session_start();
	include_once "..\..\admin\databaseConnection\connection.php";
	if ($_POST['retailor_profile_update'] && !empty($_POST['retailor_profile_update'])){
		$user_id = $_SESSION['user_id'];
		// $first_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['first_name']));
		// $middle_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['middle_name']));
		// $last_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['last_name']));
		// $designation = $connection->real_escape_string(mysql_entities_fix_string($_POST['designation']));
		// $state = $connection->real_escape_string(mysql_entities_fix_string($_POST['state']));
		// $city = $connection->real_escape_string(mysql_entities_fix_string($_POST['city']));
		$locality = $connection->real_escape_string(mysql_entities_fix_string($_POST['locality']));
		$mobile_number = $connection->real_escape_string(mysql_entities_fix_string($_POST['mobile_number']));
		$mobile_number_alternate = $connection->real_escape_string(mysql_entities_fix_string($_POST['mobile_number_alternate']));
		$email = $connection->real_escape_string(mysql_entities_fix_string($_POST['email']));
		$email_alternate = $connection->real_escape_string(mysql_entities_fix_string($_POST['email_alternate']));
		// $organization = $connection->real_escape_string(mysql_entities_fix_string($_POST['organization']));
		$trade_licence_number = $connection->real_escape_string(mysql_entities_fix_string($_POST['trade_licence_number']));
		$licence_issuing_authority = $connection->real_escape_string(mysql_entities_fix_string($_POST['licence_issuing_authority']));
		$pan = $connection->real_escape_string(mysql_entities_fix_string($_POST['pan']));
		$gstin = $connection->real_escape_string(mysql_entities_fix_string($_POST['gstin']));
		$gstin_category = $connection->real_escape_string(mysql_entities_fix_string($_POST['gstin_category']));
		$iec = $connection->real_escape_string(mysql_entities_fix_string($_POST['iec']));
		$membership = $connection->real_escape_string(mysql_entities_fix_string($_POST['membership']));

		$membership_number = $connection->real_escape_string(mysql_entities_fix_string($_POST['membership_number']));
		$membership_location = $connection->real_escape_string(mysql_entities_fix_string($_POST['membership_location']));
		$address_id = $connection->real_escape_string(mysql_entities_fix_string($_POST['address_id']));


		$sql_address = "UPDATE `address` SET `street`='$locality' WHERE `address_id`='$address_id'";
		if ($result_address = $connection->query($sql_address)){
			true;
		}else{
			false;
		}


		$sql_retailor_update ="UPDATE `users` SET `organization`='$organization',`mobile_no`='$mobile_number ',`email_id`='$email',`trade_licence_number`='$trade_licence_number',`trade_licence_using_authority`='$licence_issuing_authority',`pan`='$pan',`GSTIN`='$gstin',`GSTIN_category_id`='$gstin_category',`membership_id`='$membership',`membership_number`='$membership_number',`membership_location`='$membership_location',`IEC_code`='$iec' WHERE `user_id`='$user_id'";
		if ($result_retailor_update = $connection->query($sql_retailor_update)){
			header("location:../wseller_profile_edit_form.php?msg=2");
		}else{
			header("location:../wseller_profile_edit_form.php?msg=1");
		}
	}else{
		header("location:../wseller_profile_edit_form.php?msg=1");
	}
	



	//fUNCTION fOR PREVENTING SQL INJECTION THROUGH INPUT
	function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
	function mysql_fix_string($string){
	    if (get_magic_quotes_gpc()) 
	        $string = stripslashes($string);
	    return $string;
	}
?>
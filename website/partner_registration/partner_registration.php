<?php
include_once "..\databaseConnection\connection.php";


if (!empty($_POST['add_partner']) && $_POST['add_partner'] == 'add_partner') {
	
	if (!empty($_POST['organization']) && !empty($_POST['first_name'])  && !empty($_POST['city'])) {
		$organization = $connection->real_escape_string(mysql_entities_fix_string($_POST['organization']));
		$first_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['first_name']));
		$city = $connection->real_escape_string(mysql_entities_fix_string($_POST['city']));

		$businessCode = strtoupper(generateBusinessCode($organization,$first_name,$city,$connection));
		// echo $businessCode;
	}else{
		header("location:../login.php?msg=3");
	}

	$middle_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['middle_name']));
	$last_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['last_name']));
	$designation = $connection->real_escape_string(mysql_entities_fix_string($_POST['designation']));
	$state = $connection->real_escape_string(mysql_entities_fix_string($_POST['state']));
	$locality = $connection->real_escape_string(mysql_entities_fix_string($_POST['locality']));
	$mobile_number = $connection->real_escape_string(mysql_entities_fix_string($_POST['mobile_number']));
	$mobile_number_alternate = $connection->real_escape_string(mysql_entities_fix_string($_POST['mobile_number_alternate']));
	$email = $connection->real_escape_string(mysql_entities_fix_string($_POST['email']));
	$email_alternate = $connection->real_escape_string(mysql_entities_fix_string($_POST['email_alternate']));
	$confirm_password = $connection->real_escape_string(mysql_entities_fix_string($_POST['confirm_password']));

	$trade_licence_number = $connection->real_escape_string(mysql_entities_fix_string($_POST['trade_licence_number']));
	$licence_issuing_authority = $connection->real_escape_string(mysql_entities_fix_string($_POST['licence_issuing_authority']));
	$pan = $connection->real_escape_string(mysql_entities_fix_string($_POST['pan']));
	$gstin = $connection->real_escape_string(mysql_entities_fix_string($_POST['gstin']));
	$gstin_category = $connection->real_escape_string(mysql_entities_fix_string($_POST['gstin_category']));
	$iec = $connection->real_escape_string(mysql_entities_fix_string($_POST['iec']));
	$membership = $connection->real_escape_string(mysql_entities_fix_string($_POST['membership']));

	$membership_number = $connection->real_escape_string(mysql_entities_fix_string($_POST['membership_number']));
	$membership_location = $connection->real_escape_string(mysql_entities_fix_string($_POST['membership_location']));
	$password = password_hash($confirm_password, PASSWORD_BCRYPT);

	$bank_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['bank_name']));
	$branch_address = $connection->real_escape_string(mysql_entities_fix_string($_POST['branch_address']));
	$ifsc = $connection->real_escape_string(mysql_entities_fix_string($_POST['ifsc_code']));
	$micr = $connection->real_escape_string(mysql_entities_fix_string($_POST['micr_code']));

	$sql_user_type_id = "SELECT `user_type_id` FROM `user_type` WHERE `name` = 'Retailor'";
	if ($result_user_type_id = $connection->query($sql_user_type_id)) {
		if ($row_user_type_id=$result_user_type_id->fetch_assoc()) {
			$user_type_id = $row_user_type_id['user_type_id'];
		}else{
			$user_type_id = 3;
		}		
	}else{
		$user_type_id = 3;
	}

	$sql_address = "INSERT INTO `address`(`address_id`, `state_id`, `city_id`, `street`) VALUES (null,'$state','$city','$locality')";
	if ($result_address = $connection->query($sql_address)){
		$address_id = $connection->insert_id;

		$sql_retailor_registration = "INSERT INTO `users`(`user_id`, `organization`, `first_name`, `middle_name`, `last_name`, `designation_id`, `address_id`, `business_code`, `mobile_no`, `email_id`, `trade_licence_number`, `trade_licence_using_authority`, `pan`, `GSTIN`, `GSTIN_category_id`, `membership_id`, `membership_number`, `membership_location`, `IEC_code`, `user_type_id`, `created_at`, `password`) VALUES (null,'$organization','$first_name','$middle_name','$last_name','$designation','$address_id','$businessCode','$mobile_number','$email','$trade_licence_number','$licence_issuing_authority','$pan','$gstin','$gstin_category','$membership','$membership_number','$membership_location','$iec','$user_type_id',null,'$password')";
		if ($result_retailor_registration = $connection->query($sql_retailor_registration)) {

			if (!empty($branch_address) || !empty($_POST['branch_address']) || !empty($_POST['ifsc_code']) || !empty($_POST['micr_code'])) {
				$user_id = $connection->insert_id;
				$sql_user_bank_details = "INSERT INTO `user_bank_details`(`user_bank_id`, `user_id`, `name_of_bank`, `branch_address`, `ifsc`, `micr`) VALUES (null,'$user_id','$bank_name','$branch_address','$ifsc','$micr')";
				if ($result_user_bank_details = $connection->query($sql_user_bank_details)){
					header("location:../login.php?msg=1");
				}else{
					header("location:../login.php?msg=1");
				}
			}
		}else{
			header("location:../login.php?msg=2");
		}

	}else{
		header("location:../login.php?msg=3");
	}



	

	

	// echo "<br>".$password;

	// $sql = "";

}







//Function to generate business code
function generateBusinessCode($organization,$first_name,$city,$connection){
	$businessCode = null;
	$organizationArray = explode(" ",$organization);
	if (count($organizationArray)>1 && strlen($organization)>1) {
		$businessCode = $businessCode.substr($organizationArray[0], 0, 1).substr($organizationArray[1], 0, 1);
		// print $organizationArray[1]."<br>";
	}else{
		$businessCode = $businessCode.substr($organizationArray[0], 0, 2);
	}
	$businessCode = $businessCode.substr($first_name, 0, 1);


	$sql_city ="SELECT `name` FROM `city` WHERE `city_id` = '$city'";
	if ($result_city=$connection->query($sql_city)){
		$row_city=$result_city->fetch_assoc();
		$city_name = $row_city['name'];
		$businessCode = $businessCode.substr($city_name, 0, 1);
	}else{
		header("location:../login.php?msg=3");
	}
	
	return $businessCode;
}

//fUNCTION fOR PREVENTING SQL INJECTION THROUGH INPUT
function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}
?>

